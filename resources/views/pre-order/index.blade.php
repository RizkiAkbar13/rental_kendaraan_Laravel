@extends('template')
@section('title', 'Pre Order')
@section('content')
    <header>
        <img src="{{ asset('images/logo.png') }}" alt="Logo Rental Mobil" style="width:100px;">
        <h1>Pre-Order Sewa Mobil</h1>
    </header>

    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <h2>Form {{ isset($preOrder) ? 'Edit' : 'Tambah' }} Data Pre-Order</h2>
            <form action="{{ isset($preOrder) ? route('pre-order.update', $preOrder->id) : route('pre-order.store') }}"
                method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $preOrder->id ?? '' }}">
                <div>
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" value="{{ $preOrder->nama ?? '' }}" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $preOrder->email ?? '' }}" required>
                </div>
                <div>
                    <label for="telepon">Telepon:</label>
                    <input type="text" name="telepon" id="telepon" value="{{ $preOrder->telepon ?? '' }}" required>
                </div>
                <div>
                    <label for="jenis_mobil">Jenis Mobil:</label>
                    <input type="text" name="jenis_mobil" id="jenis_mobil" value="{{ $preOrder->jenis_mobil ?? '' }}"
                        required>
                </div>
                <div>
                    <label for="tanggal_pesan">Tanggal Pesan:</label>
                    <input type="date" name="tanggal_pesan" id="tanggal_pesan"
                        value="{{ $preOrder->tanggal_pesan ?? '' }}" required>
                </div>
                <div>
                    <button type="submit"
                        name="{{ isset($preOrder) ? 'update' : 'create' }}">{{ isset($preOrder) ? 'Update' : 'Tambah' }}</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <h2>Data Pre-Order</h2>
            <a href="{{ url('pre-order/export') }}" target="_blank" class="print-button">Cetak</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jenis Mobil</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
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
                            <td>{{ $row->tanggal_pesan }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a class="action-button edit-button" href="{{ route('pre-order.edit', $row->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('pre-order.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button delete-button"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
