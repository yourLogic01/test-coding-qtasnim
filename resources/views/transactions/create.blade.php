@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Tambah Transaksi</h1>

        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="item_id">Nama Barang</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    <option value="">Pilih Barang</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity_sold">Jumlah Terjual</label>
                <input type="number" name="quantity_sold" id="quantity_sold" min="1" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="transaction_date">Tanggal Transaksi</label>
                <input type="date" name="transaction_date" id="transaction_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
