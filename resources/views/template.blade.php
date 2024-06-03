<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href = "{{ asset('images/logo.png') }}"alt="">
    <title>@yield('title', 'Raptor Motors')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> <!-- Menambahkan tautan ke file CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">

<body>
    <div class="sidebar" id="sidebar">
        <a href="{{ url('dashboard') }}" class="dashboard">Dashboard</a>
        <a href="#">Profile</a>
        <a href="{{ url('order') }}">Order</a> <!-- Tautan ke halaman Categories -->
        <a href="{{ url('pre-order') }}">Pre-Order</a>
        <a href="{{ route('transaksi.history') }}">Transaction History</a>
        <a href="{{ url('logout') }}" style="color: red;">Logout</a>
    </div>

    <button class="openbtn" id="openbtn">☰</button>

    @yield('content')


    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/popup_box.js') }}"></script>

    <script>
        const hariJamElement = document.getElementById('harijam');

        function updateHariJam() {
            const currentDate = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            };
            const currentHariJam = currentDate.toLocaleString('en-US', options);
            hariJamElement.textContent = currentHariJam;
        }

        updateHariJam(); // Panggil sekali agar hari dan jam ditampilkan
        setInterval(updateHariJam, 1000);
    </script>

    @stack('scriptPayment')
</body>


</html>
