<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Akun</title>
    <link rel="icon" href="{{ asset('img/logo-pm.png') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    @include('templates.navbar')
    <div class="date-wrapper">
        <label class="date float-end">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 3rem">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-12 title-form mt-3 mb-1" id="title-form">
                        <h1 class="text-center">TAMBAH ADMIN</h1>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ route('manage-users.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <a class="btn btn-back mb-3 shadow-sm" href="/manage-users">Kembali</a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="name" class="col-form-label"> Nama Admin</label>
                                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded"
                                        id="name" name="name" placeholder="Masukkan Nama Admin"
                                        onkeypress="return hanyaHurufDanSpasi(event)" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="username"
                                        name="username" placeholder="Masukkan Username" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control shadow-sm bg-body-tertiary rounded"
                                        id="email" name="email" placeholder="Masukkan Email" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input class="form-control shadow-sm bg-body-tertiary rounded" id="password"
                                        name="password" placeholder="Masukkan Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-add mt-3 ">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @extends('templates.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
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
        padding: 2rem 0 0 0;
        flex-grow: 1;
        min-height: calc(100vh - 100px);
    }

    .wrapper {
        max-width: 960px;
        margin: 0 auto;
    }

    form {
        margin-bottom: 2rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.3rem;
    }

    .btn-add {
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
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
</style>
