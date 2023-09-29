<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Admin</title>
    <link rel="icon" href="{{ asset('img/logoremove.png') }}">
</head>

<body>
    <div class="content-wrapper">
        <section class="wrapper" style="padding-bottom: 10rem; max-width: 1200px; margin: 0 auto;">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="title-form mt-3 mb-4" id="title-form">
                            <h1 class="h2">Edit Admin</h1>
                        </div>
                        <form method="POST" action="{{ route('manage-users.update', $user->id) }}" class="mb-3">
                            @method('put')
                            @csrf
                            <a class="btn btn-back mb-3" href="/manage-users">Kembali</a>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name">Nama Admin</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('name') is-invalid @enderror"
                                        id="name" name="name"
                                        onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('username') is-invalid @enderror"
                                        id="username" name="username" onkeypress="return hanyaHurufDanSpasi(event)"
                                        value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text"
                                        class="form-control shadow-sm bg-body-tertiary rounded @error('password') is-invalid @enderror"
                                        id="password" name="password"
                                        value="{{ old('password', $user->password) }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                    <button type="submit"
                                        class="btn btn-add shadow-sm bg-body-tertiary rounded">Simpan
                                        Perubahan</button>
                                </div>
                            </div>
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
