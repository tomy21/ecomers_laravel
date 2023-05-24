<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DataBarang extends Model
{
    use HasFactory;
    protected $table = 'data_barangs';
    public $timestamp = true;
    protected $fillable = [
        'sku',
        'nama_barang',
        'images',
        'stock_bagus',
        'stock_rusak',
        'qty_keluar',
        'harga_barang',
    ];
    protected $hidden;
}
