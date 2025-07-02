<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'total_harga',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
