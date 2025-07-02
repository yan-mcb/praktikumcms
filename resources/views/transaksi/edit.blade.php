@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('updateTransaksi', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="user_id">Nama Pengguna</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $transaksi->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="produk_id">Produk</label>
                                <select class="form-control" name="produk_id" required>
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}" {{ $transaksi->produk_id == $produk->id ? 'selected' : '' }}>
                                            {{ $produk->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" value="{{ $transaksi->jumlah }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('daftarTransaksi') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
