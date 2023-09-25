<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Kwitansi</title>
</head>

<body>
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-12 title-form mt-3 mb-1" id="title-form">
                        <h1>TAMBAH KWITANSI</h1>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ route('kwitansi.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <a class="btn btn-primary mb-3" href="/kwitansi">Kembali</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nomor">
                                        <label for="nomor_kwitansi">No :</label>
                                        <input class="form-first" type="text" id="nomor_kwitansi" name="nomor_kwitansi"
                                            value="{{ $serialNumber }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Masukkan Nama Lengkap" onkeypress="return hanyaHurufDanSpasi(event)" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lokasi" class="col-form-label">Nama Perumahan</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                        placeholder="Masukkan Lokasi Perumahan" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="alamat" class="col-form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat Lengkap" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="no_kavling" class="col-form-label">No. Kavling</label>
                                    <input class="form-control" id="no_kavling" name="no_kavling"
                                        placeholder="Masukkan Nomor Kavling" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="no_hp" class="col-form-label"> No. HP </label>
                                    <input id="no_hp" class="form-control" type="text" id="no_hp"
                                        name="no_hp" placeholder="Masukkan Nomor HP" onkeypress="return hanyaAngka(event)"
                                        required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="type" class="col-form-label">Type</label>
                                    <input class="form-control" id="type" name="type"
                                        placeholder="Masukkan Nama Type" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="terbilang" class="col-form-label">Terbilang</label>
                                    <input class="form-control" id="terbilang" name="terbilang"
                                        placeholder="Masukkan Terbilang" onkeypress="return hanyaHurufDanSpasi(event)" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="luas" class="col-form-label">Luas</label>
                                    <input class="form-control" id="luas" name="luas"
                                        placeholder="Masukkan Luas" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="pembayaran" class="col-form-label">Pembayaran</label>
                                    <input type="text" class="form-control" id="pembayaran"
                                        name="pembayaran" placeholder="Masukkan Pembayaran" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="jumlah" class="col-form-label">Jumlah</label>
                                    <input class="form-control" id="jumlah" name="jumlah"
                                        placeholder="Masukkan Jumlah" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Tambah</button>
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
            else if (angka == 48)
                return true;
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
</body>
<footer class="text-center text-lg-start" style="background-color: #8ba8d9">
            <!-- Copyright -->
            <div class="text-center p-3" style="text-align:center">
                © 2023 Copyright:
                <a class="text-dark text-decoration-none" href="https://tamananggrekgroup.co.id/">Taman Anggrek
                    Group</a>
            </div>
            <!-- Copyright -->
        </footer>
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

    /* Custom */

    .title-form {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }

    .nomor {
        text-align: right;
    }

    .nomor mb-5 {
        margin-bottom: 5rem;
    }
</style>

</html>
