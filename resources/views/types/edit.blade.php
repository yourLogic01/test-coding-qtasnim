@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Jenis Barang</h1>
        <form action="{{ route('types.update', ['type' => $typeofItem->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="type_name">Nama Jenis</label>
                <input type="text" name="type_name" id="type_name" class="form-control" value="{{ $typeofItem->type_name }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('types.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
@endsection
