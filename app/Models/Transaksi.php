<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'no_faktur', 'tanggal', 'keterangan', 'jumlah', 'stok', 'barang_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function userisOwner()
    {
        return Auth::id() == $this->user->id;
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }
}
