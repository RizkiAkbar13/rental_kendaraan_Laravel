<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function detailTransaction(Request $request)
    {
        $carType = $request->query('carType');
        $carYear = $request->query('tahun');
        $carBrand = $request->query('merek');
        $startDate = $request->query('start_date');
        $duration = $request->query('duration');

        $hargaSewaPerHari = 0;
        if ($carType === 'city') {
            $hargaSewaPerHari = 400000;
        } elseif ($carType === 'suv') {
            $hargaSewaPerHari = 700000;
        } elseif ($carType === 'mpv') {
            $hargaSewaPerHari = 1250000;
        }

        $totalHarga = $hargaSewaPerHari * $duration;
        $totalHargaFormatted = number_format($totalHarga, 0, ',', '.');

        return view('transaksi.detail', compact('carType', 'carYear', 'carBrand', 'startDate', 'duration', 'totalHargaFormatted'));
    }

    public function processTransaction(Request $request)
    {
        $carType = $request->input('carType');
        $carYear = $request->input('carYear');
        $carBrand = $request->input('carBrand');
        $startDate = $request->input('startDate');
        $duration = $request->input('duration');

        $hargaSewaPerHari = 0;
        if ($carType === 'city') {
            $hargaSewaPerHari = 400000;
        } elseif ($carType === 'suv') {
            $hargaSewaPerHari = 700000;
        } elseif ($carType === 'mpv') {
            $hargaSewaPerHari = 1250000;
        }

        $totalHarga = $hargaSewaPerHari * $duration;
        $totalHargaFormatted = number_format($totalHarga, 0, ',', '.');

        $transaksiData = [
            'carType' => $carType,
            'carYear' => $carYear,
            'carBrand' => $carBrand,
            'startDate' => $startDate,
            'duration' => $duration,
            'totalHarga' => $totalHarga,
            'totalHargaFormatted' => $totalHargaFormatted,
        ];

        $request->session()->put('transaksiData', $transaksiData);

        return redirect()->route('transaksi.history');
    }

    public function transactionHistory(Request $request)
    {
        $transaksiData = $request->session()->get('transaksiData', []);
        if (empty($transaksiData)) {
            return redirect()->route('order')->with('error', 'No transaksi data available');
        }
        return view('transaksi.history', ['transaksiData' => $transaksiData]);
    }

    public function payment(Request $request){
        $transaksiData = $request->session()->get('transaksiData', []);
        if (empty($transaksiData)) {
            return redirect()->route('order')->with('error', 'No transaksi data available');
        }
        return view('transaksi.payment', ['transaksiData' => $transaksiData]);
    }

    public function processPayment(Request $request)
    {
        $transaksiData = $request->session()->get('transaksiData', []);
        if (empty($transaksiData)) {
            return redirect()->route('order')->with('error', 'No transaksi data available');
        }

        $nama = $request->input('nama');
        $nomor_hp = $request->input('nomor_hp');
        $bank = $request->input('bank');
        $no_rekening = $request->input('no_rekening');
        $jumlah_uang = $request->input('jumlah_uang');
        $pin_atm = $request->input('pin_atm');

        $penyewaData = [
            'nama' => $nama,
            'nomor_hp' => $nomor_hp,
            'bank' => $bank,
            'no_rekening' => $no_rekening,
            'jumlah_uang' => $jumlah_uang,
            'pin_atm' => $pin_atm
        ];

        $request->session()->put('penyewaData', $penyewaData);

        return redirect()->route('transaksi.history')->with('success', 'Pembayaran Telah Diterima');
    }
}
