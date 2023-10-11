<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kwitansis = Kwitansi::all();

        $kwitansis = Kwitansi::latest()->get();

        return view('dashboard.index', compact('kwitansis'));
    }
}
