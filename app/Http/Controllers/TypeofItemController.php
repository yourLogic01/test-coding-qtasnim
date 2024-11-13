<?php

namespace App\Http\Controllers;

use App\Models\TypeofItem;
use Illuminate\Http\Request;

class TypeofItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeOfItem::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        TypeOfItem::create($request->all());

        return redirect()->route('types.index')->with('success', 'Jenis Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeofItem $typeofItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeofItem $type)
    {
        $typeofItem = $type;
        return view('types.edit', compact('typeofItem'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeofItem $type)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $type->update($request->all());

        return redirect()->route('types.index')->with('success', 'Jenis Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeofItem $type)
    {
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Jenis Barang berhasil dihapus');
    }
}
