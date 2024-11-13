@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Barang</h1>

        <!-- Form Edit Barang -->
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="item_name">Nama Barang</label>
                <input type="text" name="item_name" id="item_name" class="form-control" value="{{ $item->item_name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" name="stock" id="stock" class="form-control" min="0"
                    value="{{ $item->stock }}" required>
            </div>
            <div class="form-group">
                <label for="type_of_item_id">Jenis Barang</label>
                <select name="type_of_item_id" id="type_of_item_id" class="form-control" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $item->type_of_item_id == $type->id ? 'selected' : '' }}>
                            {{ ucfirst($type->type_name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
