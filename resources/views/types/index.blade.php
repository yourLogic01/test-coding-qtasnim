@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Daftar Jenis Barang</h1>
        <a href="{{ route('types.create') }}" class="btn btn-primary mb-3">Tambah Jenis Barang</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $type->type_name }}</td>
                        <td>
                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus jenis barang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
