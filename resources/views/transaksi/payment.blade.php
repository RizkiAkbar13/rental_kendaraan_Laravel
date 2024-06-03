@extends('template')
@section('title', 'Payment')
@section('content')
    <header class="header-transaksi">
        <h1>Payment</h1>
    </header>
    <div class="container" style="margin-left: 250px;">
        <div class="transaction-history" id="transactionDetails">
            <h2>Konfirmasi Pembayaran</h2>

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
    </div>
    <div class="container-transaksi">
        <h2>Konfirmasi Pembayaran</h2>
        <form method="post" action="{{ route('payment.proses') }}">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required>

            <label for="bank">Bank:</label>
            <select id="bank" name="bank" required>
                <option value="bri">BRI</option>
                <option value="bca">BCA</option>
                <option value="mandiri">Mandiri</option>
                <option value="bni">BNI</option>
            </select>

            <label for="no_rekening">Nomor Rekening:</label>
            <input type="text" id="no_rekening" name="no_rekening" required>

            <label for="jumlah_uang">Jumlah Uang:</label>
            <input type="text" id="jumlah_uang" name="jumlah_uang" required>

            <label for="pin_atm">PIN ATM:</label>
            <input type="password" id="pin_atm" name="pin_atm" required>

            <button type="submit"
                style="background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 10px;
            margin-top: 10px;
            transition: background-color 0.3s ease;">Submit</button>
        </form>
    </div>
    @push('scriptPayment')
        <script>
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            function formatNoRekening(input) {
                var value = input.value.replace(/\D/g, '').substring(0, 12);
                var formatted = value.match(/.{1,4}/g);
                if (formatted) {
                    input.value = formatted.join('-');
                } else {
                    input.value = value;
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                var jumlahUangInput = document.getElementById('jumlah_uang');
                var noRekeningInput = document.getElementById('no_rekening');
                var form = document.querySelector('form');
                var notification = document.querySelector('.notification');

                jumlahUangInput.addEventListener('input', function(e) {
                    jumlahUangInput.value = formatRupiah(this.value, 'Rp. ');
                });

                noRekeningInput.addEventListener('input', function(e) {
                    formatNoRekening(this);
                });
            });
        </script>
    @endpush
@endsection
