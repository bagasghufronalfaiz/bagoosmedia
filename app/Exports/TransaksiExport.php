<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements ShouldAutoSize, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = User::findOrFail(Auth::user()->id);

        return $user->transaksis;
    }

    public function view(): View
    {
        return view('exports.transaksi', [
            'user' => User::findOrFail(Auth::user()->id),
        ]);
    }
}
