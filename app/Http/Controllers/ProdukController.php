<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', [
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'       => 'required|min:5',
            'deskripsi'  => 'required|min:10',
            'harga'      => 'required',
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048', 
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/produks', $gambar->hashName());

        Produk::create([
            'nama'       => $request->nama,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'gambar'     => $gambar->hashName()
            
        ]);

        return redirect(route('daftarProduk'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'       => 'required|min:5',
            'deskripsi'  => 'required|min:10',
            'harga'      => 'required',
            'gambar'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048', 
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/produks', $gambar->hashName()); 

            if ($produk->gambar) { 
                Storage::delete('public/produks/' . $produk->gambar);
            }

            $produk->update([
                'nama'        => $request->nama,
                'deskripsi'   => $request->deskripsi,
                'harga'       => $request->harga,
                'gambar'      => $gambar->hashName()
            ]);

        } else {
            
            $produk->update([
                'nama'        => $request->nama,
                'deskripsi'   => $request->deskripsi,
                'harga'       => $request->harga
            ]);
        }

        return redirect(route('daftarProduk'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect(route('daftarProduk'))->with('success', 'Data Berhasil Dihapus');
    }
}
