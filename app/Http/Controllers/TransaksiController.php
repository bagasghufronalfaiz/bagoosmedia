<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\User;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('transaksi.index', compact('user'));
    }

    public function create()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('transaksi.create', compact('user'));
    }

    public function store(Request $request)
    {
        $barang = Barang::where('kode_barang', $request->barang)->first();

        switch ($request->keterangan) {
            case 'Masuk':
                $fakturCode = 'M';
                $stok = $barang->stok + $request->jumlah;
                break;

            case 'Keluar':
                $fakturCode = 'K';
                $stok = $barang->stok - $request->jumlah;
                break;
        }

        $month = date("m", strtotime($request->tanggal));
        $year = date("Y", strtotime($request->tanggal));
        $faktur = $fakturCode . $year . $request->barang . $month;

        Transaksi::create([
            'no_faktur'     => $faktur,
            'tanggal'       => $request->tanggal,
            'keterangan'    => $request->keterangan,
            'jumlah'        => $request->jumlah,
            'stok'          => $stok,
            'barang_id'     => $barang->id,
            'user_id'       => Auth::id(),
        ]);
        $barang->stok = $stok;
        $barang->save();

        return redirect()->route('index.transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if (!is_null($transaksi)) {
            if ($transaksi->userisOwner()) {
                $user = User::findOrFail(Auth::user()->id);
                return view('transaksi.edit', compact('transaksi', 'user'));
            } else {
                abort(403);
            }
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        // return $transaksi;
        $barang = Barang::findOrFail($transaksi->barang_id);

        if ($transaksi->userisOwner()) {
            if ($request->keterangan == $transaksi->keterangan) {
                switch ($request->keterangan) {
                    case 'Masuk':
                        $stokBarang = $barang->stok - $transaksi->jumlah + $request->jumlah;
                        $stokTransaksi = $transaksi->stok - $transaksi->jumlah + $request->jumlah;
                        $fakturCode = 'M';
                        // return "sama dan masuk";
                        break;

                    case 'Keluar':
                        $stokBarang = $barang->stok + $transaksi->jumlah - $request->jumlah;
                        $stokTransaksi = $transaksi->stok + $transaksi->jumlah - $request->jumlah;
                        $fakturCode = 'K';
                        // return "sama dan keluar";
                        break;
                }
            } elseif ($request->keterangan !== $transaksi->keterangan) {
                switch ($request->keterangan) {
                    case 'Masuk':
                        $stokBarang = $barang->stok + $transaksi->jumlah + $request->jumlah;
                        $stokTransaksi = $transaksi->stok + $transaksi->jumlah + $request->jumlah;
                        $fakturCode = 'M';
                        // return "tidak sama kemudian masuk";
                        break;

                    case 'Keluar':
                        $stokBarang = $barang->stok - $transaksi->jumlah - $request->jumlah;
                        $stokTransaksi = $transaksi->stok - $transaksi->jumlah - $request->jumlah;
                        $fakturCode = 'K';
                        // return "tidak sama kemudian keluar";
                        break;
                }
            }
            $barang->stok = $stokBarang;
            $barang->save();
            $month = date("m", strtotime($request->tanggal));
            $year = date("Y", strtotime($request->tanggal));
            $faktur = $fakturCode . $year . $request->barang . $month;
            $transaksi->update([
                'no_faktur'     => $faktur,
                'tanggal'       => $request->tanggal,
                'keterangan'    => $request->keterangan,
                'jumlah'        => $request->jumlah,
                'stok'          => $stokTransaksi,
                // 'barang_id'     => $barang->id,
            ]);

            return redirect()->route('index.transaksi');
        } else {
            abort(403);
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::findOrFail($transaksi->barang_id);
        if (!is_null($transaksi)) {
            if ($transaksi->userisOwner()) {
                if ($transaksi->keterangan == "Masuk") {
                    $stokBarang = $barang->stok - $transaksi->jumlah;
                } elseif ($transaksi->keterangan == "Keluar") {
                    $stokBarang = $barang->stok + $transaksi->jumlah;
                }
                $barang->stok = $stokBarang;
                $barang->save();
                $transaksi->delete();
                return redirect()->route('index.transaksi');
            } else {
                abort(403);
            }
        } else {
            abort(404);
        }
    }
}
