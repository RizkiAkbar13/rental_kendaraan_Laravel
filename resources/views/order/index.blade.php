@extends('template')
@section('title', 'Order')
@section('content')
    <header class="header-order">
        <h1>Rent Now</h1>
    </header>
    <div class="container-order">
        <form action="{{ route('transaksi.detail') }}" method="get">
            <label for="carType">Car Type:</label>
            <select id="carType" name="carType">
                <option value="city">City Car</option>
                <option value="suv">SUV</option>
                <option value="mpv">MPV</option>
            </select><br>

            <label for="tahun">Year:</label>
            <input type="number" id="tahun" name="tahun" min="1900" max="2025"><br>

            <label for="merek">Car Brand:</label>
            <input type="text" id="merek" name="merek"><br>

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date"><br>

            <label for="duration">Rental Duration (days):</label>
            <input type="number" id="duration" name="duration" min="1"><br>

            <button type="submit"
                style="background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s ease;">Rent
                Now</button>
        </form>
    </div>
@endsection
