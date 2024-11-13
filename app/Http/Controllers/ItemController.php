<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\TypeofItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('type')->get();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data jenis barang untuk dropdown
        $types = TypeofItem::all();

        return view('item.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'item_name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'type_of_item_id' => 'required|exists:type_of_items,id',
        ]);

        // Buat item baru
        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        // Ambil data jenis barang untuk dropdown
        $types = TypeOfItem::all();

        return view('item.edit', compact('item', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Validasi input
        $request->validate([
            'item_name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'type_of_item_id' => 'required|exists:type_of_items,id',
        ]);

        // Update data item
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }
}
