<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ActivityLog;

class TransactionController extends Controller
{
    public function index()
    {              
        return view('transaction.index', [
            'transactions' => Transaction::latest('transaction_date')->get(),
            'startDate' => '',
            'endDate' => '',
        ]);
    }

    public function search($startDate, $endDate)
    {       
        $data = Transaction::whereBetween('transaction_date', [
            $startDate,
            $endDate
        ])->get(); 

        return view('transaction.index', [
            'transactions' => $data,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([  
            'transaction_date' => 'required|date',
            'description' => 'required|max:500',
            'status' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $transaction = Transaction::create([
            'transaction_date' => $request->transaction_date,
            'description' => $request->description,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'user_id' => auth()->user()->id,
        ]);

        ActivityLog::create([
            'name' => auth()->user()->name,
            'description' => 'Mencatat transaksi ' . '(' . $transaction->description . ')',
        ]);

        return redirect()->route('transaction.index')->with('success', 'Data transaksi berhasil dicatat');
    }

    public function destroy(Transaction $transaction)
    {
        Transaction::find($transaction->id)->delete();

        ActivityLog::create([
            'name' => auth()->user()->name,
            'description' => 'Menghapus transaksi ' .'('. $transaction->transaction_date . ' | '. $transaction->description . ' | ' . $transaction->quantity . ')',
        ]);
        
        return redirect()->route('transaction.index')->with('success', 'Data transaksi berhasil dihapus');
    }
}
