<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;

class BarangController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('barang.index', compact('user'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        // Cek apakah barang sudah ada
        $barang = Barang::where('kode_barang', $request->KodeBarang)->get();

        if ($barang->isEmpty()) {
            $stok = 0;
            Barang::create([
                'kode_barang'   => $request->KodeBarang,
                'nama_barang'   => $request->NamaBarang,
                'satuan'        => $request->Satuan,
                'harga_beli'    => $request->HargaBeli,
                'harga_jual'    => $request->HargaJual,
                'pemasok'       => $request->Pemasok,
                'stok'          => $stok,
                'user_id'       => Auth::id(),
            ]);
            return redirect()->route('index.barang');
        } elseif (!$barang->isEmpty()) {
            return 'false';
        }
    }

    public function edit($id)
    {
        $barang = Barang::where('kode_barang', $id)->first();
        if (!is_null($barang)) {
            if ($barang->userisOwner()) {
                return view('barang.edit', compact('barang'));
            } else {
                abort(403);
            }
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::where('kode_barang', $id)->first();

        if ($barang->userisOwner()) {
            Barang::where('kode_barang', $id)
                ->update([
                    'kode_barang'   => $request->KodeBarang,
                    'nama_barang'   => $request->NamaBarang,
                    'satuan'        => $request->Satuan,
                    'harga_beli'    => $request->HargaBeli,
                    'harga_jual'    => $request->HargaJual,
                    'pemasok'       => $request->Pemasok,
                ]);

            return redirect()->route('index.barang');
        } else {
            abort(403);
        }
    }

    public function destroy($id)
    {
        $barang = Barang::where('kode_barang', $id)->first();
        if (!is_null($barang)) {
            if ($barang->userisOwner()) {
                Barang::where('kode_barang', $id)->delete();
            } else {
                abort(403);
            }
        } else {
            abort(404);
        }

        return redirect()->route('index.barang');
    }
}
