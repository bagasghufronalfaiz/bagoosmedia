<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function exportBarang()
    {
        return Excel::download(new BarangExport, 'Barang.xlsx');
    }

    public function exportTransaksi()
    {
        return Excel::download(new TransaksiExport, 'Transaksi.xlsx');
    }
}
