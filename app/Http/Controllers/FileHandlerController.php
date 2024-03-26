<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buckets;
use App\Models\Transactions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class FileHandlerController extends Controller
{
    public function handleFileUpload(Request $request)
    {
        if ($request->has('action')) {
            $action = $request->input('action');

            if ($action == 'InsertSample' || $action == 'InsertFile') {
                if ($action == 'InsertSample') {
                    $csvFilePath = "2023 02.csv"; // Assuming the sample CSV file path
                } else {
                    // Validate the uploaded file
                    $request->validate([
                        'csv_file' => 'required|file|mimes:csv,txt|max:2048', // Adjust max file size as needed
                    ]);

                    // Store the uploaded file and get its path
                    $csvFilePath = $request->file('csv_file')->storeAs('files', $request->file('csv_file')->getClientOriginalName());
                }

                // Temporarily disable foreign key constraints
                DB::statement('PRAGMA foreign_keys=off;');

                // Process the CSV file and insert data into the database
                try {
                    // Your code for file handling and data insertion
                    if (($handle = fopen(storage_path('app/' . $csvFilePath), "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            // Logic to determine TransactionType from Buckets
                            $companyName = strtok($data[1], ' '); // Get the first word from TransactionName
                            $bucket = Buckets::whereRaw("substr(Company, 1, instr(Company || ' ', ' ') - 1) = ?", [$companyName])->first();
                            $transactionType = $bucket ? $bucket->TransactionType : 'Undetermined';

                            // Insert data into the Transactions table
                            Transactions::create([
                                'Date' => $data[0],
                                'TransactionName' => $data[1],
                                'TransactionType' => $transactionType,
                                'Expense' => $data[2],
                                'Revenue' => $data[3],
                                'NetTotal' => $data[4]
                            ]);
                        }
                        fclose($handle);
                    }
                } catch (\Exception $e) {
                    // Rollback the transaction if an exception occurs
                    return response()->json(['error' => $e->getMessage()], 500);
                } finally {
                    // Re-enable foreign key constraints
                    DB::statement('PRAGMA foreign_keys=on;');
                }

                // Redirect back with success message
                $message = "Data insertion successful";
                return redirect()->back()->with('success', $message);
            } else if ($action == 'Delete') {
                // Handle delete action if needed
                // Example: Transaction::truncate(); // Delete all records from the transactions table
                $message = "Table Transactions dropped";

                // Redirect back with success message
                return redirect()->back()->with('success', $message);
            }
        }

        // Handle invalid or missing action
        $message = "Invalid action";
        return redirect()->back()->with('error', $message);
    }
}
