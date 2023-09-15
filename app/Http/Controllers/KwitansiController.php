<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Exception;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    protected $kwitansis;

    public function __construct()
    {
        $this->kwitansis = Kwitansi::all();
    }

    public function index()
    {
    $kwitansis = $this->kwitansis;
        return view('kwitansi.index', [
            'kwitansis' => $kwitansis,
        ]);
    }
    public function create()
    {
        return view('kwitansi.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nomor_kwitansi' => 'required|max:255',
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'uang_sebanyak' => 'required',
                'pembayaran' => 'required',
                'lokasi' => 'required',
                'no_kavling' => 'required',
                'type' => 'required',
                'luas' => 'required',
                'discount' => 'required',
                'jumlah' => 'required',
            ]);
            Kwitansi::create($validatedData);

            return redirect('/kwitansi');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        $kwitansi = $this->kwitansis->find($id);

        return view('kwitansi.show', compact('kwitansi'));
    }

    public function edit(Kwitansi $kwitansi)
    {
        return view('kwitansi.edit',[
            'kwitansi' => $kwitansi,
        ]);
    }

    public function update(Request $request, Kwitansi $kwitansi)
    {
        try {
            if (!$kwitansi) {
                return redirect('/kwitansi')->with('error', 'Kwitansi tidak ditemukan');
            }
    
            $rules = [
                'nomor_kwitansi' => 'required',
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'uang_sebanyak' => 'required',
                'pembayaran' => 'required',
                'lokasi' => 'required',
                'no_kavling' => 'required',
                'type' => 'required',
                'luas' => 'required',
                'discount' => 'required',
                'jumlah' => 'required',
            ];
    
            $validatedData = $request->validate($rules);
        
            Kwitansi::where('id', $kwitansi->id)->update($validatedData);
    
            return redirect('/kwitansi')->with('success', 'Kwitansi berhasil diperbarui');
        } catch (Exception  $e) {
            dd($e);
        }
    }


    public function destroy(Kwitansi $kwitansi)
    {
        Kwitansi::destroy($kwitansi->id);

        return redirect('/kwitansi');
    }
}