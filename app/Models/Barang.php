<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'kode_barang', 'nama_barang', 'satuan', 'harga_beli', 'harga_jual', 'pemasok', 'stok', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function userisOwner()
    {
        return Auth::id() == $this->user->id;
    }

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
