<?php

namespace App\Exports;

use App\Models\Kwitansi;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportKwitansiWithDate implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = Carbon::parse($startDate, 'Asia/Jakarta')
            ->startOfDay()
            ->format('Y-m-d H:i:s');
        $this->endDate = Carbon::parse($endDate, 'Asia/Jakarta')
            ->endOfDay()
            ->format('Y-m-d H:i:s');
    }

    public function view(): View
    {
        $startDate = Carbon::parse($this->startDate)->startOfDay();
        $endDate = Carbon::parse($this->endDate)->endOfDay();

        $data = Kwitansi::select('nomor_kwitansi', 'nama_lengkap', 'alamat', 'no_hp', 'terbilang', 'pembayaran', 'keterangan', 'lokasi', 'no_kavling', 'type', 'jumlah')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('nomor_kwitansi', 'asc')
            ->get();

        return view('kwitansi.table', ['kwitansis' => $data]);
    }
}
