<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Admin</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-12 title-form mt-3 mb-1" id="title-form">
                        <h1>TAMBAH ADMIN</h1>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ route('manage-users.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <a class="btn btn-back mb-3 shadow-sm bg-body-tertiary rounded" href="/manage-users">Kembali</a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="name" class="col-form-label"> Nama Admin</label>
                                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="name" name="name"
                                        placeholder="Masukkan Nama Admin"
                                        onkeypress="return hanyaHurufDanSpasi(event)" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="username" name="username"
                                        placeholder="Masukkan Username" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded" id="email" name="email"
                                        placeholder="Masukkan Email" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="password" name="password"
                                        placeholder="Masukkan Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-add mt-3 shadow-sm bg-body-tertiary rounded">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
        border-radius: 0.3rem;
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

    .btn-add{
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
    }

    .btn-add:hover{
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761
    }

    .title-form {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
    }
</style>

</html>
