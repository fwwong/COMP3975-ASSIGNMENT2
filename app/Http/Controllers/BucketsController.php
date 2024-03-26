<?php

namespace App\Http\Controllers;

use App\Models\Buckets;
use App\Models\Transactions;
use Illuminate\Http\Request;

class BucketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buckets = Buckets::all();
        return view('buckets.index', compact('buckets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buckets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TransactionType' => 'required|string|max:50',
            'Company' => 'required|string|max:50',
        ]);

        $bucket = Buckets::create($request->all());
        // Update transactions with matching company names
        $transactionsToUpdate = Transactions::where('TransactionType', $bucket->Company)->get();
        foreach ($transactionsToUpdate as $transaction) {
            $transaction->update(['TransactionType' => $bucket->TransactionType]);
        }
        return redirect()->route('buckets.index')->with('success', 'Bucket created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bucket = Buckets::findOrFail($id);
        return view('buckets.show', compact('bucket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        // Retrieve the transaction with the given ID
        $bucket = Buckets::findOrFail($id);

        // Return the view to edit the transaction
        return view('buckets.edit', compact('bucket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'TransactionType' => 'required|string|max:50',
            'Company' => 'required|string|max:50',
        ]);

        $bucket = Buckets::findOrFail($id);
        $bucket->update([
            'TransactionType' => $request->TransactionType,
            'Company' => $request->Company,
        ]);
        return redirect()->route('buckets.index')->with('success', 'Bucket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bucket = Buckets::findOrFail($id);
        $bucket->delete();
        return redirect()->route('buckets.index')->with('success', 'Bucket deleted successfully.');
    }
}
