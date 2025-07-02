@extends('adminlte.layouts.app')

@section('addCss')
    {{-- Include DataTables Bootstrap 4 CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
    {{-- Include jQuery DataTables JS --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    {{-- Include DataTables Bootstrap 4 JS --}}
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#data-table").DataTable();
        })
    </script>

    {{-- Include SweetAlert library --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        
        confirmDelete = function(button) {
            var url = $(button).data('url');

            swal({
                title: 'Konfirmasi Hapus', 
                text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?', 
                dangerMode: true, 
                buttons: true 
            }).then(function(value) { 
                if (value) {
                    window.location = url;
                }
            });
        }
    </script>
@endsection
@php
    use Illuminate\Support\Facades\Auth;
@endphp
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Produk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Produk</li>
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
                    <div class="card-header text-right">
                        @if (Auth::user() && Auth::user()->role === 'admin')
                            <a href="{{ route('createProduk') }}" class="btn btn-primary" role="button">Tambah Produk</a>
                        @endif
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0" id="data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($produks as $produk)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{!! $produk->deskripsi !!}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/produks/' . $produk->gambar) }}" class="rounded" style="width: 50px">
                                        </td>
                                        <td class="text-center">
                                            @if (Auth::user() && Auth::user()->role === 'admin')
                                                <a href="{{ route('editProduk', ['id' => $produk->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <a onclick="confirmDelete(this)" data-url="{{ route('deleteProduk', ['id' => $produk->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada produk</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
