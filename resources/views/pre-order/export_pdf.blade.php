<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pre-Order</title>
    <style>
        /* Gaya CSS untuk cetak */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ACD793;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Gaya CSS untuk header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        header img {
            width: 100px;
            height: auto;
        }

        header .title {
            flex-grow: 1;
            text-align: center;
        }

        header .date-time {
            text-align: right;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <!-- Header dengan logo -->
    <header>
        <img src="{{ public_path('/images/logo.png') }}" alt="Logo Rental Mobil">
        <div class="title">
            <h1>Data Pre-Order</h1>
        </div>
        <div class="date-time">
            <p>Tanggal Cetak: {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p>
            <p>Waktu Cetak: {{ \Carbon\Carbon::now()->isoFormat('HH:mm') }}</p>
        </div>
    </header>

    <!-- Tabel Data Pre-Order -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jenis Mobil</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->telepon }}</td>
                    <td>{{ $row->jenis_mobil }}</td>
                    <td> {{ \Carbon\Carbon::parse($row->tanggal_pesan)->isoFormat('D MMMM YYYY') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
