<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Kwitansi {{ $kwitansi->nama_lengkap }}</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="date-wrapper">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem; max-width: 1200px; margin: 0 auto;">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="title-form mt-3 mb-4" id="title-form">
                            <h1>EDIT KWITANSI</h1>
                        </div>
                        <form method="POST" action="{{ route('kwitansi.update', $kwitansi->id) }}" class="mb-3">
                            @method('put')
                            @csrf
                            <a class="btn btn-back mb-3" onclick="goBack()">Kembali</a>
                            <script>
                                // Fungsi untuk kembali ke halaman sebelumnya
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                            <div class="mb-3">
                                <label for="nomor_kwitansi">No. Kwitansi :</label>
                                <input type="text"
                                    class="form-control shadow-sm bg-body-tertiary rounded @error('nomor_kwitansi') is-invalid @enderror"
                                    id="nomor_kwitansi" name="nomor_kwitansi" readonly
                                    value="{{ old('nomor_kwitansi', $kwitansi->nomor_kwitansi) }}">
                                @error('nomor_kwitansi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('nama_lengkap') is-invalid @enderror"
                                        id="nama_lengkap" name="nama_lengkap"
                                        onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('nama_lengkap', $kwitansi->nama_lengkap) }}">
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi">Nama Perumahan</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('lokasi') is-invalid @enderror"
                                        id="lokasi" name="lokasi" onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('lokasi', $kwitansi->lokasi) }}">
                                    @error('lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" value="{{ old('alamat', $kwitansi->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="no_kavling">No. Kavling</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('no_kavling') is-invalid @enderror"
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
                                <div class="col-md-6">
                                    <label for="no_hp">No. HP</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('no_hp') is-invalid @enderror"
                                        id="no_hp" onkeypress="return hanyaAngka(event)" name="no_hp"
                                        value="{{ old('no_hp', $kwitansi->no_hp) }}">
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="type">Type</label>
                                    <select
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('type') is-invalid @enderror"
                                        id="type" name="type" required>
                                        <option value="30/60"
                                            {{ old('type', $kwitansi->type) == '30/60' ? 'selected' : '' }}>30/60
                                        </option>
                                        <option value="30/66"
                                            {{ old('type', $kwitansi->type) == '30/66' ? 'selected' : '' }}>30/66
                                        </option>
                                        <option value="45/72"
                                            {{ old('type', $kwitansi->type) == '45/72' ? 'selected' : '' }}>45/72
                                        </option>
                                        <option value="45/102"
                                            {{ old('type', $kwitansi->type) == '45/102' ? 'selected' : '' }}>45/102
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="pembayaran" class="col-form-label">Pembayaran</label>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="booking"
                                                    name="pembayaran[]" value="Booking"
                                                    {{ in_array('Booking', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="booking">Booking</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="dp"
                                                    name="pembayaran[]" value="DP"
                                                    {{ in_array('DP', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="dp">DP</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="cbth"
                                                    name="pembayaran[]" value="CBTH"
                                                    {{ in_array('CBTH', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="cbth">CBTH</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="angsuran"
                                                    name="pembayaran[]" value="Angsuran ke"
                                                    {{ in_array('Angsuran', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="angsuran">Angsuran ke</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="ket"
                                                    name="pembayaran[]" value="KET"
                                                    {{ in_array('KET', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ket">KET</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="lainlain"
                                                    name="pembayaran[]" value="Lain-lain"
                                                    {{ in_array('Lain-lain', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lainlain">Lain-lain</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3 mt-3" id="keteranganRow" style="display: none;">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    id="keterangan" name="keterangan"
                                    value="{{ old('keterangan', $kwitansi->keterangan) }}">
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col mb-3 mt-3">
                                <div class="col-md-12">
                                    <label for="terbilang">Terbilang</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('terbilang') is-invalid @enderror"
                                        id="terbilang" name="terbilang" onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('terbilang', $kwitansi->terbilang) }}">
                                    @error('terbilang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="text"
                                    class="form-control shadow-sm bg-body-tertiary rounded @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah', $kwitansi->jumlah) }}">
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-add shadow-sm">Simpan
                                Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        var angsuranCheckbox = document.getElementById('angsuran');
        var lainlainCheckbox = document.getElementById('lainlain');
        var keteranganRow = document.getElementById('keteranganRow');

        // Periksa status checkbox saat halaman dimuat
        handleCheckboxChange();

        // Fungsi untuk menangani perubahan pada checkbox "Lain-lain" dan "Angsuran ke"
        function handleCheckboxChange() {
            // Jika salah satu checkbox dipilih, tampilkan form keterangan
            if (angsuranCheckbox.checked || lainlainCheckbox.checked) {
                keteranganRow.style.display = 'block';
            } else {
                // Jika tidak ada checkbox yang dipilih, sembunyikan form keterangan
                keteranganRow.style.display = 'none';
                document.getElementById('keterangan').value = '';
            }
        }

        // Tambahkan event listener ke kedua checkbox
        lainlainCheckbox.addEventListener('change', function() {
            // Saat checkbox "Lain-lain" berubah, pastikan form keterangan tetap terbuka
            handleCheckboxChange();
            // Jika checkbox "Lain-lain" dicentang, pastikan checkbox "Angsuran ke" tidak dicentang
            if (lainlainCheckbox.checked) {
                angsuranCheckbox.checked = false;
            }
        });

        angsuranCheckbox.addEventListener('change', function() {
            // Saat checkbox "Angsuran ke" berubah, pastikan form keterangan tetap terbuka
            handleCheckboxChange();
            // Jika checkbox "Angsuran ke" dicentang, pastikan checkbox "Lain-lain" tidak dicentang
            if (angsuranCheckbox.checked) {
                lainlainCheckbox.checked = false;
            }
        });
    </script>

    <script>
        // Dapatkan semua elemen checkbox
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

        // Tambahkan event listener untuk setiap checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Jika checkbox yang sedang diubah adalah checkbox yang telah dicentang, nonaktifkan yang lainnya
                if (this.checked) {
                    checkboxes.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.disabled = true;
                        }
                    });
                } else {
                    // Jika checkbox yang sedang diubah tidak dicentang, aktifkan yang lainnya
                    checkboxes.forEach(function(otherCheckbox) {
                        otherCheckbox.disabled = false;
                    });
                }
            });
        });
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

    <script>
        function hanyaHurufDanSpasi(event) {
            var charCode = event.which || event.keyCode;

            // Mengecek apakah karakter yang dimasukkan adalah huruf atau spasi
            if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode === 32) {
                return true;
            } else {
                event.preventDefault();
                return false;
            }
        }
    </script>
    @extends('templates.footer')
</body>

</html>
<style>
    .date-wrapper {
        margin: 20px 32px 0 0;
    }

    .date {
        font-weight: 500;
        font-size: 14pt
    }

    .content-wrapper {
        padding: 3rem 2rem 2rem 2rem;
    }

    .wrapper {
        max-width: 960px;
        margin: 0 auto;
    }

    /* Form */

    form {
        margin-bottom: 2rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
    }

    .btn-add {
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        margin-top: 1rem
    }

    .btn-add:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761
    }

    .btn-back {
        background-color: #82bcde;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-back:hover {
        background-color: #5a8db6;
        color: #ffffff;
        border: 1px solid #82bcde;
    }


    .title-form {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }
</style>
