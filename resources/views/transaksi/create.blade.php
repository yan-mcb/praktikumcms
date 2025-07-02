@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Transaksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container mt-5">
                {{-- main content here --}}
                <div class="card">
                    <div class="card-body p-0">
                        <form action="{{ route('storeTransaksi') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">Nama User</label>

                                @if (Auth::user()->role === 'admin')
                                    <select class="form-control" name="user_id" id="user_id" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="produk_id">Nama Produk</label>
                                <select class="form-control" name="produk_id" id="produk_id" required="required">
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan Jumlah">

                                <!-- error message untuk title -->
                                @error('jumlah')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" class="form-control" name="total_harga" id="total_harga" readonly>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('daftarTransaksi') }}" class="btn btn-secondary">Kembali</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
