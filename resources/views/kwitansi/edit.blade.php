<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Kwitansi</title>
</head>

<body>
    <div class="content-wrapper">
        <section class="wrapper">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-1 position-relative order-lg-2"
                        data-cue="zoomIn">
                        <div class="shape bg-dot orange rellax w-17 h-19" data-rellax-speed="1"
                            style="top: -1.7rem; left: -1.5rem;"></div>
                        <div class="shape rounded bg-soft-orange rellax d-md-block" data-rellax-speed="0"
                            style="bottom: -1.8rem; right: -0.8rem; width: 85%; height: 90%;"></div>
                    </div>

                    <div class="title-form mt-3 mb-1" id="title-form" style="text-align: center">
                        <h1 class="h2">Edit Kwitansi</h1>
                    </div>

                    <form method="POST" action="{{ route('kwitansi.update', $kwitansi->id) }}" class="mb-3">
                        @method('put')
                        @csrf
                        <a class="btn btn-primary mb-3" href="/kwitansi">Kembali</a>
                        <div style="text-align: right">
                            <div class="nomor mb-5">
                                <label for="nomor_kwitansi">No :</label>
                                <input type="text" class="form-first  @error('nomor_kwitansi') is-invalid @enderror"
                                    id="nomor_kwitansi" name="nomor_kwitansi" readonly
                                    value="{{ old('nomor_kwitansi', $kwitansi->nomor_kwitansi) }}">
                                @error('nomor_kwitansi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('nama_lengkap') is-invalid @enderror"
                                    id="nama_lengkap" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $kwitansi->nama_lengkap) }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('lokasi') is-invalid @enderror"
                                    id="lokasi" name="lokasi" value="{{ old('lokasi', $kwitansi->lokasi) }}">
                                @error('lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{ old('alamat', $kwitansi->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="no_kavling" class="col-sm-2 col-form-label">No. Kavling</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('no_kavling') is-invalid @enderror"
                                    id="no_kavling" name="no_kavling"
                                    value="{{ old('no_kavling', $kwitansi->no_kavling) }}">
                                @error('no_kavling')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('no_hp') is-invalid @enderror"
                                    id="no_hp" onkeypress="return hanyaAngka(event)" name="no_hp"
                                    value="{{ old('no_hp', $kwitansi->no_hp) }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('type') is-invalid @enderror"
                                    id="type" name="type" value="{{ old('type', $kwitansi->type) }}">
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="terbilang" class="col-sm-2 col-form-label">Terbilang</label>
                            <div class="col">
                                <input type="text" class="row-sm-3 @error('terbilang') is-invalid @enderror"
                                    id="terbilang" name="terbilang"
                                    value="{{ old('terbilang', $kwitansi->terbilang) }}">
                                @error('terbilang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="luas" class="col-sm-2 col-form-label">Luas</label>
                            <div class="col">
                                <input type="text" class="row-sm-2 @error('luas') is-invalid @enderror"
                                    id="luas" name="luas" value="{{ old('luas', $kwitansi->luas) }}">
                                @error('luas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
                            <div class="col">
                                <input type="text" class="row-sm-2 @error('pembayaran') is-invalid @enderror"
                                    id="pembayaran" name="pembayaran"
                                    value="{{ old('pembayaran', $kwitansi->pembayaran) }}">
                                @error('pembayaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col">
                                <input type="text" class="row-sm-2 @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah', $kwitansi->jumlah) }}">
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </form>
                </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
            // Fungsi untuk memformat input jumlah dengan titik dan "RP"
            function formatCurrency(input) {
                // Hapus semua karakter selain angka
                var value = input.value.replace(/[^0-9]/g, '');

                // Jika value adalah string kosong, set nilai input menjadi kosong juga
                if (value === '') {
                    input.value = '';
                } else {
                    // Ubah nilai menjadi format uang dengan titik sebagai pemisah ribuan
                    value = parseInt(value, 10).toLocaleString('id-ID');

                    // Tambahkan "RP" di depan nilai yang sudah diformat
                    input.value = 'Rp ' + value;
                }
            }
            // Dapatkan elemen input jumlah berdasarkan ID
            var jumlahInput = document.getElementById('jumlah');

            // Tambahkan event listener untuk memanggil fungsi formatCurrency saat nilai berubah
            jumlahInput.addEventListener('input', function() {
                formatCurrency(this);
            });
        </script>

        <script>
            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>

</body>

</html>

@extends('templates.footer')
