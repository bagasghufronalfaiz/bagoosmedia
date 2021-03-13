<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangExport implements ShouldAutoSize, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = User::findOrFail(Auth::user()->id);

        return $user->barangs;
    }

    public function view(): View
    {
        return view('exports.barang', [
            'user' => User::findOrFail(Auth::user()->id),
        ]);
    }
}
