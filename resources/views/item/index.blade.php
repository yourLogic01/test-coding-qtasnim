@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Daftar Barang</h1>

        @if (session('success'))
            <div class="alert alert-success d-flex justify-content-between align-items-center">
                {{ session('success') }}
                <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tombol Tambah Barang -->
        <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

        <!-- Form Pencarian dan Filter -->
        <form method="GET" action="{{ route('items.index') }}" class="mb-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by item name"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="sort_by" class="form-select">
                        <option value="item_name" {{ request('sort_by') == 'item_name' ? 'selected' : '' }}>Item Name
                        </option>
                        <option value="stock" {{ request('sort_by') == 'stock' ? 'selected' : '' }}>Stock</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="sort_order" class="form-select">
                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <!-- Tabel Daftar Barang -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Jenis Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ ucfirst($item->type->type_name) }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
