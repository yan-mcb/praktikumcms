<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', [
            'transaksis' => $transaksis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $produks = Produk::all();

        return view('transaksi.create', compact('users', 'produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'produk_id' => 'required|exists:produk,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Ambil data produk untuk dapatkan harga
        $produk = \App\Models\Produk::findOrFail($request->produk_id);

        // Hitung total harga
        $total_harga = $produk->harga * $request->jumlah;

        // Simpan transaksi
        \App\Models\Transaksi::create([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('daftarTransaksi')->with('success', 'Transaksi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $users = User::all();
        $produks = Produk::all();

        return view('transaksi.edit', compact('transaksi', 'users', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'produk_id' => 'required|exists:produk,id',
            'jumlah' => 'required|numeric|min:1'
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $total_harga = $produk->harga * $request->jumlah;

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga
        ]);

        return redirect()->route('daftarTransaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('daftarTransaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
}
