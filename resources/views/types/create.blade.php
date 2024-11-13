@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Tambah Jenis Barang</h1>
        <form action="{{ route('types.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="type_name">Nama Jenis</label>
                <input type="text" name="type_name" id="type_name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="{{ route('types.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
@endsection
