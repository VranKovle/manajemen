<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itempembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'namabarang', // Tambahkan field 'namabarang' ke dalam $fillable
        'harga',
        'gambarbukti',
    ];

    // Jika Anda memiliki field yang menggunakan tipe data yang berbeda, tambahkan $casts di sini
    protected $casts = [
        // 'field_tipe_data' => 'tipe_casting',
    ];
}
