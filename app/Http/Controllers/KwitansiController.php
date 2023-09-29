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

    public function index(Request $request)
{
    $search = $request->input('search');

    // Filter Kwitansi berdasarkan pencarian
    $kwitansis = Kwitansi::where(function ($query) use ($search) {
        $query
            ->where('nomor_kwitansi', 'LIKE', '%' . $search . '%')
            ->orWhere('nama_lengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('alamat', 'LIKE', '%' . $search . '%')
            ->orWhere('no_hp', 'LIKE', '%' . $search . '%') 
            ->orWhere('terbilang', 'LIKE', '%' . $search . '%')
            ->orWhere('pembayaran', 'LIKE', '%' . $search . '%') 
            ->orWhere('keterangan', 'LIKE', '%' . $search . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $search . '%')
            ->orWhere('no_kavling', 'LIKE', '%' . $search . '%')
            ->orWhere('type', 'LIKE', '%' . $search . '%')
            ->orWhere('jumlah', 'LIKE', '%' . $search . '%');
    })->get();

    if ($kwitansis->count() == 0) {
        session()->flash('error', 'Kwitansi tidak ditemukan');
        return redirect('/kwitansi');
    }

    return view('kwitansi.index', [
        'kwitansis' => $kwitansis,
    ]);
}

    public function create()
    {
        // $this->authorize('super admin');
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
                'terbilang' => 'required',
                'lokasi' => 'required',
                'no_kavling' => 'required',
                'type' => 'required',
                'jumlah' => 'required',
            ]);

            // Mengubah pilihan checkbox menjadi string yang dipisahkan oleh koma
            $pembayaran = implode(', ', $request->input('pembayaran'));

            if ($request->has('keterangan') && !empty($request->input('keterangan'))) {
                // Ambil data input "keterangan" dan tambahkan ke dalam kolom "keterangan" dalam database
                $keterangan = $request->input('keterangan');
                $validatedData['keterangan'] = $keterangan;
            }

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['nomor_kwitansi'] = $serialNumber;
            $validatedData['pembayaran'] = $pembayaran; // Menyimpan pilihan checkbox ke dalam kolom 'pembayaran'

            // dd($validatedData);
            Kwitansi::create($validatedData);

            return redirect('/kwitansi');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function detail($id)
    {
        $kwitansi = $this->kwitansis->find($id);

        if (!$kwitansi) {
            session()->flash('error', 'Kwitansi tidak ditemukan');

            return redirect('/kwitansi');
        }

        return view('kwitansi.detail', compact('kwitansi'));
    }
    public function print($id)
    {
        $kwitansi = $this->kwitansis->find($id);

        if (!$kwitansi) {
            session()->flash('error', 'Kwitansi tidak ditemukan');

            return redirect('/kwitansi');
        }

        return view('kwitansi.cetak', compact('kwitansi'));
    }

    public function edit(Kwitansi $kwitansi)
    {
        return view('kwitansi.edit', compact('kwitansi'));
    }

    public function update(Request $request, Kwitansi $kwitansi)
    {
        try {
            $rules = [
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'terbilang' => 'required',
                'lokasi' => 'required',
                'no_kavling' => 'required',
                'type' => 'required',
                'jumlah' => 'required',
            ];

            // Tambahkan validasi untuk "keterangan" hanya jika ada nilai yang diberikan
            if ($request->has('keterangan')) {
                $rules['keterangan'] = 'nullable'; // Ubah "required" menjadi "nullable"
            }

            $validatedData = $request->validate($rules);

            // Mengubah pilihan checkbox menjadi string yang dipisahkan oleh koma
            $pembayaran = implode(', ', $request->input('pembayaran'));

            $validatedData['pembayaran'] = $pembayaran; // Menyimpan pilihan checkbox ke dalam kolom 'pembayaran'
            $validatedData['user_id'] = auth()->user()->id;

            // Periksa apakah input "keterangan" diisi atau tidak
            if ($request->has('keterangan') && !empty($request->input('keterangan'))) {
                // Ambil data input "keterangan" dan tambahkan ke dalam kolom "keterangan" dalam database
                $keterangan = $request->input('keterangan');
                $validatedData['keterangan'] = $keterangan;
            }

            // Update data kwitansi
            $kwitansi->update($validatedData);

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
        return Excel::Download(new ExportKwitansi(), 'Kwitansi.xlsx');
    }
}
