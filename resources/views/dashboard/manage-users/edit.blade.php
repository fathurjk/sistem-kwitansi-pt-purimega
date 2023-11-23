<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit Akun</title>
    <link rel="icon" href="{{ asset('img/logo-pm.png') }}">
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

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3 d-flex justify-content-center align-items-center w-100"
                        role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="title-form mt-3 mb-4" style="padding-top: 0.2rem" id="title-form">
                            <h1 style="">EDIT AKUN</h1>
                        </div>
                        <form method="POST" action="{{ route('manage-users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <a class="btn btn-back mb-3" href="/manage-users">Kembali</a>
                        
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="old_password">Password Lama:</label>
                                <input type="password" name="old_password" id="old_password" class="form-control">
                            </div>
                        
                            <div class="form-group">
                                <label for="new_password">Password Baru:</label>
                                <input type="password" name="new_password" id="new_password" class="form-control">
                            </div>
                        
                            <button type="submit" class="btn btn-edit mt-3">Simpan Perubahan</button>
                        </form>
                        
                            </div>

                            
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
        margin:20px 32px 0 0;
    }
    .date{
        font-weight: 500; 
        font-size: 14pt
    }
    .content-wrapper {
        padding: 2rem;
    }

    .wrapper {
        max-width: 960px;
        margin: 0 auto;
    }

    /* Form */
    .form-group{
        margin: 1rem 0 0.5rem 0
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
    }

    .btn-edit {
        background-color: #d96652;
        color: #e9ecf1;
    }

    .btn-edit:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d
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

    /* Custom */

    .title-form {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }
</style>
