<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailKwitansiController extends Controller
{
    public function index()
    {
        // Lakukan operasi lain yang Anda perlukan di sini
        return view('detailKwitansi');
    }
}
