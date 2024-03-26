<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Buckets;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;  //debug package

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::latest()->paginate(10);
        return view("client.index", compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::statement('PRAGMA foreign_keys=off;');
        try {
            // Validate incoming request data
            $validatedData = $request->validate([
                'TName' => 'required|string',
                'Revenue' => 'required|numeric',
                'Expense' => 'required|numeric'
            ]);

            $companyName = strtok($validatedData['TName'], ' '); // Get the first word from TransactionName

            $bucket = Buckets::whereRaw("substr(Company, 1, instr(Company || ' ', ' ') - 1) = ?", [$companyName])->first();
            $transactionType = $bucket ? $bucket->TransactionType : 'Undetermined';

            // Calculate new net value
            $lastNetValue = Transactions::max('NetTotal');


            $newNetValue = $lastNetValue + $validatedData['Revenue'] - $validatedData['Expense'];


            $date = date('m/d/Y', time());



            // Create new transaction
            Transactions::create([
                'Date' => $date,
                'TransactionName' => $validatedData['TName'],
                'TransactionType' => $transactionType,
                'NetTotal' => $newNetValue,
                // Assign the value to either "Expense" or "Revenue" based on the transaction type
                'Revenue' => $validatedData['Revenue'], // Assign the value for "Revenue"
                'Expense' => $validatedData['Expense'], // Assign the value for "Expense"
            ]);
            DB::statement('PRAGMA foreign_keys=on;');
            // Redirect with success message
            return redirect()->route('client.index')->with('success', 'Transaction created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the transaction with the given ID
        $transaction = Transactions::findOrFail($id);

        // Return the view to display the transaction details
        return view('client.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Retrieve the transaction with the given ID
        $transaction = Transactions::findOrFail($id);

        // Return the view to edit the transaction
        return view('client.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::statement('PRAGMA foreign_keys=off;');
        try {
            // Validate incoming request data
            $validatedData = $request->validate([
                'TName' => 'required|string|max:100',
                'Expense' => 'required|numeric',
                'Revenue' => 'required|numeric'
            ]);

            $companyName = strtok($validatedData['TName'], ' '); // Get the first word from TransactionName

            $bucket = Buckets::whereRaw("substr(Company, 1, instr(Company || ' ', ' ') - 1) = ?", [$companyName])->first();
            $validatedData['TransactionType'] = $bucket ? $bucket->TransactionType : 'Undetermined';

            // Calculate new net value
            $lastNetValue = Transactions::max('NetTotal');


            $validatedData['NetTotal'] = $lastNetValue + $validatedData['Revenue'] - $validatedData['Expense'];

            // Retrieve the transaction with the given ID
            $transaction = Transactions::findOrFail($id);

            // Update the transaction with validated data
            $transaction->update([
                'TransactionName' => $validatedData['TName'],
                'Revenue' => $validatedData['Revenue'],
                'Expense' => $validatedData['Expense'],
                'TransactionType' => $validatedData['TransactionType'],
                'NetTotal' => $validatedData['NetTotal'],
            ]);

            DB::statement('PRAGMA foreign_keys=on;');

            // Redirect the user after updating the transaction
            return redirect()->route('client.show', $transaction->id)->with('success', 'Transaction updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement('PRAGMA foreign_keys=off;');
        // find the student
        $transaction = Transactions::find($id);
        // delete the student
        $transaction->delete();
        DB::statement('PRAGMA foreign_keys=on;');

        // redirect to students list page
        return redirect()->route('client.index')
            ->with('success', 'Transaction deleted successfully');
    }
}
