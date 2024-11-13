@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Transaksi</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success d-flex justify-content-between align-items-center">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tombol Tambah Transaksi -->
        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

        <!-- Form Pencarian dan Filter -->
        <form method="GET" action="{{ route('transactions.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by item name"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="sort_by" class="form-select">
                        <option value="transaction_date" {{ request('sort_by') == 'transaction_date' ? 'selected' : '' }}>
                            Transaction Date</option>
                        <option value="quantity_sold" {{ request('sort_by') == 'quantity_sold' ? 'selected' : '' }}>Quantity
                            Sold</option>
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

        <!-- Tabel Daftar Transaksi -->
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Terjual</th>
                    <th>Tanggal Transaksi</th>
                    <th>Stok Lama</th>
                    <th>Stok Baru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->item->item_name }}</td>
                        <td>{{ $transaction->quantity_sold }}</td>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>{{ $transaction->item->stock + $transaction->quantity_sold }}</td> <!-- Stok Lama -->
                        <td>{{ $transaction->item->stock }}</td> <!-- Stok Baru -->
                        <td>
                            <a href="{{ route('transactions.edit', $transaction) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
