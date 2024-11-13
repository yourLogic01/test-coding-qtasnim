@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="mb-4">Bandingkan Transaksi</h1>

        <!-- Form Pilih Jenis Perbandingan dan Rentang Waktu -->
        <form method="GET" action="{{ route('compare.index') }}" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="comparison" class="form-label">Pilih Jenis Perbandingan:</label>
                </div>
                <div class="col-md-6">
                    <select name="comparison" id="comparison" class="form-select">
                        <option value="highest" {{ $comparison == 'highest' ? 'selected' : '' }}>Penjualan Terbanyak
                        </option>
                        <option value="lowest" {{ $comparison == 'lowest' ? 'selected' : '' }}>Penjualan Terkecil</option>
                    </select>
                </div>

                <!-- Input Rentang Tanggal -->
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Rentang Waktu:</label>
                    <div class="d-flex">
                        <input type="date" name="start_date" id="start_date" class="form-control"
                            value="{{ old('start_date', $startDate) }}">
                        <span class="mx-2">-</span>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                            value="{{ old('end_date', $endDate) }}">
                        <button type="submit" class="btn btn-primary w-100 px-2 mx-2">Bandingkan</button>
                    </div>
                </div>

            </div>
        </form>

        <!-- Tampilkan Hasil Perbandingan -->
        @if (isset($typeSales) && $typeSales->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Jenis Barang</th>
                            <th>Total Jumlah Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeSales as $sale)
                            <tr>
                                <td>{{ $sale->type_name }}</td>
                                <td>{{ $sale->total_sold }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif (isset($typeSales) && $typeSales->isEmpty())
            <div class="alert alert-warning">Tidak ada data untuk perbandingan ini.</div>
        @endif
    </div>
@endsection
