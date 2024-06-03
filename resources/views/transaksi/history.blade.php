@extends('template')
@section('title', 'Transaction History')
@section('content')
    <header>
        <h1>Transaction History</h1>
    </header>
    <div class="container" style="margin-left: 250px;">
        <div class="transaction-history" id="transactionDetails">
            @if (session('transaksiData'))
                @php
                    $transaksiData = session('transaksiData');
                @endphp
                <table>
                    <thead>
                        <tr>
                            <th>Tipe Mobil</th>
                            <th>Tahun Mobil</th>
                            <th>Merek Mobil</th>
                            <th>Tanggal Mulai</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $transaksiData['carType'] }}</td>
                            <td>{{ $transaksiData['carYear'] }}</td>
                            <td>{{ $transaksiData['carBrand'] }}</td>
                            <td>{{ $transaksiData['startDate'] }}</td>
                            <td>{{ $transaksiData['duration'] }} hari</td>
                            <td>Rp {{ $transaksiData['totalHargaFormatted'] }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p>Tidak ada data transaksi yang tersedia</p>
            @endif
        </div>
        <form action="{{ url('payment') }}" method="get">
            <button type="submit" class="pay-now-btn">Bayar Sekarang</button>
        </form>
    </div>
@endsection
