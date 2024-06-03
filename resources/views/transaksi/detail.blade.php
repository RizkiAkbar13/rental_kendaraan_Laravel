@extends('template')
@section('title', 'Transaction')
@section('content')
    <header class="header-transaksi">
        <h1>Transaksi</h1>
    </header>

    <div class="container-transaksi">
        <h2>Detail Transaksi</h2>
        <div class="transaction-details">
            <p><strong>Tipe Mobil:</strong> {{ $carType }}</p>
            <p><strong>Tahun Mobil:</strong> {{ $carYear }}</p>
            <p><strong>Merek Mobil:</strong> {{ $carBrand }}</p>
            <p><strong>Tanggal Mulai:</strong> {{ $startDate }}</p>
            <p><strong>Durasi:</strong> {{ $duration }} hari</p>
            <p><strong>Total Harga:</strong> Rp {{ $totalHargaFormatted }}</p>
        </div>
    </div>

    <form action="{{ route('transaksi.process') }}" method="post" class="transaction-form">
        @csrf
        <input type="hidden" name="carType" value="{{ $carType }}">
        <input type="hidden" name="carYear" value="{{ $carYear }}">
        <input type="hidden" name="carBrand" value="{{ $carBrand }}">
        <input type="hidden" name="startDate" value="{{ $startDate }}">
        <input type="hidden" name="duration" value="{{ $duration }}">
        <input type="hidden" name="total_harga" value="{{ $totalHargaFormatted }}">
        <button type="submit" class="btn-transaksi">OK</button>
    </form>
@endsection
