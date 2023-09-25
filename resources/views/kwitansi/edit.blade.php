<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Kwitansi</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            color: #8ba8d9;
        }

        /* Content */

        .content-wrapper {
            padding: 2rem;
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

        .btn-primary {
            background-color: #8ba8d9;
            color: #fff;
            border: 1px solid #8ba8d9;
            border-radius: 0.25rem;
        }

        .btn-primary:hover {
            background-color: #fff;
            color: #8ba8d9;
            border: 1px solid #8ba8d9;
        }

        /* Footer */

        footer {
            padding: 1rem;
            background-color: #8ba8d9;
            color: #fff;
            text-align: center;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            color: #ccc;
        }

        /* Custom */

        .title-form {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem; max-width: 1200px; margin: 0 auto;">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="title-form mt-3 mb-4" id="title-form">
                            <h1 class="h2">Edit Kwitansi</h1>
                        </div>
                        <form method="POST" action="{{ route('kwitansi.update', $kwitansi->id) }}" class="mb-3">
                            @method('put')
                            @csrf
                            <a class="btn btn-primary mb-3" href="/kwitansi">Kembali</a>

                            <div class="mb-3">
                                <label for="nomor_kwitansi">No. Kwitansi :</label>
                                <input type="text" class="form-control @error('nomor_kwitansi') is-invalid @enderror"
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
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        id="nama_lengkap" name="nama_lengkap" onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('nama_lengkap', $kwitansi->nama_lengkap) }}">
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi">Nama Perumahan</label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                        id="lokasi" name="lokasi" onkeypress="return hanyaHurufDanSpasi(event)" value="{{ old('lokasi', $kwitansi->lokasi) }}">
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
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" value="{{ old('alamat', $kwitansi->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="no_kavling">No. Kavling</label>
                                    <input type="text" class="form-control @error('no_kavling') is-invalid @enderror"
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
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
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
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="30/60" {{ old('type', $kwitansi->type) == '30/60' ? 'selected' : '' }}>30/60</option>
                                        <option value="30/66" {{ old('type', $kwitansi->type) == '30/66' ? 'selected' : '' }}>30/66</option>
                                        <option value="45/72" {{ old('type', $kwitansi->type) == '45/72' ? 'selected' : '' }}>45/72</option>
                                        <option value="45/102" {{ old('type', $kwitansi->type) == '45/102' ? 'selected' : '' }}>45/102</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="terbilang">Terbilang</label>
                                    <input type="text" class="form-control @error('terbilang') is-invalid @enderror"
                                        id="terbilang" name="terbilang" onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('terbilang', $kwitansi->terbilang) }}">
                                    @error('terbilang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="pembayaran">Pembayaran</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="booking" name="pembayaran[]" value="Booking"
                                        {{ in_array('Booking', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="booking">Booking</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dp" name="pembayaran[]" value="DP"
                                        {{ in_array('DP', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dp">DP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cbth" name="pembayaran[]" value="CBTH"
                                        {{ in_array('CBTH', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cbth">CBTH</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="angsuran" name="pembayaran[]" value="Angsuran ke"
                                        {{ in_array('Angsuran', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="angsuran">Angsuran ke</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ket" name="pembayaran[]" value="KET"
                                        {{ in_array('KET', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ket">KET</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lainlain" name="pembayaran[]" value="Lain-lain"
                                        {{ in_array('Lain-lain', old('pembayaran', explode(',', $kwitansi->pembayaran))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lainlain">Lain-lain</label>
                                </div>
                            </div>
                            <div class="mb-3" id="keteranganRow" style="display: none;">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    id="keterangan" name="keterangan" value="{{ old('keterangan', $kwitansi->keterangan) }}">
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah', $kwitansi->jumlah) }}">
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        // Dapatkan elemen checkbox "Lain-lain" berdasarkan ID
        var lainlainCheckbox = document.getElementById('lainlain');

        // Dapatkan elemen row "keterangan" berdasarkan ID
        var keteranganRow = document.getElementById('keteranganRow');

        // Tambahkan event listener ke checkbox "Lain-lain"
        lainlainCheckbox.addEventListener('change', function() {
            // Jika checkbox "Lain-lain" dicentang, tampilkan input "keterangan"
            if (this.checked) {
                keteranganRow.style.display = 'block';
            } else {
                // Jika checkbox "Lain-lain" tidak dicentang, sembunyikan input "keterangan" dan hapus isinya
                keteranganRow.style.display = 'none';
                document.getElementById('keterangan').value = '';
            }
        });
    </script>
    <script>
        var angsuranCheckbox = document.getElementById('angsuran');

        var keteranganRow = document.getElementById('keteranganRow');

        angsuranCheckbox.addEventListener('change', function() {
            if (this.checked) {
                keteranganRow.style.display = 'block';
            } else {
                keteranganRow.style.display = 'none';
                document.getElementById('keterangan').value = '';
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
        jumlahInput.addEventListener('input', function () {
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
    <footer>
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2023 Copyright:
            <a class="text-dark text-decoration-none" href="https://tamananggrekgroup.co.id/">Taman Anggrek
                Group</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
