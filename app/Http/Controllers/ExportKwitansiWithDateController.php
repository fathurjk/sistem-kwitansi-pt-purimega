<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use App\Models\Kwitansi;

class ExportKwitansiWithDate extends Controller
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        $startDate = Carbon::parse($this->startDate)->startOfDay();
        $endDate = Carbon::parse($this->endDate)->endOfDay();

        $data = Kwitansi::whereBetween('created_at', [$startDate, $endDate])->orderBy('nomor_kwitansi', 'asc')->get();
        return view('kwitansi.table', ['kwitansis' => $data]);
    }
}
