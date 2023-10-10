<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    @include('templates.sidebar')
    <nav class="navbar shadow-sm"
        style="background-color: #8ba8d9; display: flex; align-items: center; justify-content: center;">
        <div class="container-fluid" style="display: flex; align-items: center; justify-content: center;">
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                <img src="{{ asset('icon/menu.svg') }}" alt="">
            </button>
            <img class="logo-img" src="{{ asset('img/logoremove.png') }}" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top" style="margin-right: 10px;">
            <a class="navbar-brand" href="{{ route('kwitansi') }}" style="margin-top: 0;">
                PT SATRIYO MEGA SARANA
            </a>

            <div class="profile d-flex align-items-center" style="margin-left: auto; margin-right: 20px">
                <div class="dropdown">
                    <a class="dropdown-toggle " style="text-decoration: none; color: #fff;" href="#"
                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Hello, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @can('super admin')
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#changePasswordModal">
                                    Ubah Password
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endcan
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                </span>
            </div>
    </nav>
    @can('super admin')
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('change-password') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="oldPassword" name="old_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="newPassword" name="new_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan


</body>

</html>
<style>
    .container-fluid {
        margin: 0 12px 0 12px;
        padding: 0;
        vertical-align: middle
    }

    .navbar-brand {
        font-size: 32px;
        font-weight: 500;
    }

    .logo-img {
        width: 36px;
        height: 36px;
    }

    .profile {
        font-size: 18px
    }

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%
    }
</style>
