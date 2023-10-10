<?php

namespace App\Exports;

use App\Models\Kwitansi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// use Maatwebsite\Excel\Concerns\FromCollection;

class ExportKwitansi implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        {
            $data = Kwitansi::orderBy('nomor_kwitansi', 'asc')->get();
            return view('kwitansi.table', ['kwitansis' => $data]);
        }
    }
}


