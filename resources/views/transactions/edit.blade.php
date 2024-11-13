@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Transaksi</h1>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="item_id">Nama Barang</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ $transaction->item_id == $item->id ? 'selected' : '' }}>
                            {{ $item->item_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity_sold">Jumlah Terjual</label>
                <input type="number" name="quantity_sold" id="quantity_sold" class="form-control"
                    value="{{ $transaction->quantity_sold }}" required>
            </div>

            <div class="form-group">
                <label for="transaction_date">Tanggal Transaksi</label>
                <input type="date" name="transaction_date" id="transaction_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Transaksi</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
