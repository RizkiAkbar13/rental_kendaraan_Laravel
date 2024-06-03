@extends('template')
@section('title', 'Dashboard')
@section('content')
    <header>
        <img src="{{ asset('images/logo.png') }}" alt="Logo Rental Mobil" style="width: 100px;">
        <div class="home-content">
            <h1>Selamat Datang di Raptor Motors</h1>
            <h4>
                <p id="harijam"></p>
            </h4>
            <p>Sewa mobil impian Anda dengan mudah dan cepat yang pasti murah dari pada yang lain</p>
            <p>Buruan Sewa Sekarang! Promo terbatas ...!!!</p>
        </div>
    </header>
    <div class="container">
        <h2>Pilihan Mobil</h2>
        <div class="pilihan-mobil">
            <div class="mobil">
                <a href="#" id="cityCarLink">
                    <img src="{{ asset('images/1.jpg') }}" alt="Mobil City Car">
                    <h4>City Car</h4>
                    <p>Mulai dari Rp. 400.000/hari</p>
                    <p>Tahun: 2022</p>
                    <p>Kapasitas Penumpang: 4</p>
                </a>
            </div>
            <div class="mobil">
                <a href="#" id="suvLink">
                    <img src="{{ asset('images/2.jpg') }}" alt="Mobil SUV">
                    <h4>SUV</h4>
                    <p>Mulai dari Rp. 700.000/hari</p>
                    <p>Tahun: 2023</p>
                    <p>Kapasitas Penumpang: 5</p>
                </a>
            </div>
            <div class="mobil">
                <a href="#" id="mpvLink">
                    <img src="{{ asset('images/3.jpg') }}" alt="Mobil MPV">
                    <h4>MPV</h4>
                    <p>Mulai dari Rp. 1.250.000/hari</p>
                    <p>Tahun: 2021</p>
                    <p>Kapasitas Penumpang: 7</p>
                </a>
            </div>
        </div>
    </div>
@endsection
