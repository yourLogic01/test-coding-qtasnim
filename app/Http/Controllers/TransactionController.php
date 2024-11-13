<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data transaksi dengan item terkait
        $transactions = Transaction::with('item')->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data item untuk dropdown
        $items = Item::all();

        return view('transactions.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity_sold' => 'required|integer|min:1',
            'transaction_date' => 'required|date',
        ]);

        // Dapatkan item yang terkait
        $item = Item::findOrFail($request->item_id);

        // Cek apakah stok cukup untuk transaksi ini
        if ($item->stock < $request->quantity_sold) {
            return redirect()->back()->withErrors('Stok tidak mencukupi untuk transaksi ini.');
        }

        // Kurangi stok item
        $item->stock -= $request->quantity_sold;
        $item->save();

        // Simpan transaksi baru
        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan dan stok telah diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        // Ambil data item untuk dropdown
        $items = Item::all();

        return view('transactions.edit', compact('transaction', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validasi input
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity_sold' => 'required|integer|min:1',
            'transaction_date' => 'required|date',
        ]);

        // Dapatkan item terkait
        $item = $transaction->item;

        // Tambahkan kembali stok yang sebelumnya dikurangi oleh transaksi ini
        $item->stock += $transaction->quantity_sold;

        // Cek apakah stok cukup untuk transaksi yang diperbarui
        if ($item->stock < $request->quantity_sold) {
            return redirect()->back()->withErrors('Stok tidak mencukupi untuk transaksi ini.');
        }

        // Kurangi stok berdasarkan nilai baru dari quantity_sold
        $item->stock -= $request->quantity_sold;
        $item->save();

        // Update transaksi dengan data baru
        $transaction->update([
            'item_id' => $request->item_id,
            'quantity_sold' => $request->quantity_sold,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui dan stok telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // Tambahkan kembali stok item sebelum menghapus transaksi
        $item = $transaction->item;
        $item->stock += $transaction->quantity_sold;
        $item->save();

        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus dan stok telah diperbarui.');
    }
}
