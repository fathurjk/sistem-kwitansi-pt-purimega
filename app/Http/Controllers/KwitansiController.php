<?php

namespace App\Http\Controllers;

use App\Exports\ExportKwitansi;
use App\Models\Kwitansi;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $lastSerialNumber = Kwitansi::latest('nomor_kwitansi')->first();

        if ($lastSerialNumber) {
            $lastNumber = (int) substr($lastSerialNumber->nomor_kwitansi, 4);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $serialNumber = 'SMS-' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return view('kwitansi.create', compact('serialNumber'));
    }

    public function store(Request $request)
    {
        try {
            $lastSerialNumber = Kwitansi::latest('nomor_kwitansi')->first();

            if ($lastSerialNumber) {
                $lastNumber = (int) substr($lastSerialNumber->nomor_kwitansi, 4);
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 1;
            }

            $serialNumber = 'SMS-' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

            $validatedData = $request->validate([
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

            $validatedData['nomor_kwitansi'] = $serialNumber;

            Kwitansi::create($validatedData);

            return redirect('/kwitansi');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function show($id)
    {
        $kwitansi = $this->kwitansis->find($id);

        if (!$kwitansi) {
            session()->flash('error', 'Kwitansi tidak ditemukan');

            return redirect('/kwitansi');
        }

        return view('kwitansi.show', compact('kwitansi'));
    }

    public function edit(Kwitansi $kwitansi)
    {
        return view('kwitansi.edit', compact('kwitansi'));
    }

    public function update(Request $request, Kwitansi $kwitansi)
    {
        try {
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
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function destroy(Kwitansi $kwitansi)
    {
        Kwitansi::destroy($kwitansi->id);

        return redirect('/kwitansi');
    }

    function export_excel()
    {
        return Excel::Download(new ExportKwitansi, "Kwitansi.xlsx");
    }
}
