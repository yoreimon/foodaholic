<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'Produk';

    protected $fillable = [
        'nama_produk',
        'harga',
        'rating',
        'stok',
        'detail_produk',
        'batas_ketahanan',
        'foto_produk',
    ];
}