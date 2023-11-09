<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title d-none d-sm-block" style="font-weight: 700" id="offcanvas">Menu</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            @can('super admin')
                <li class="nav-item {{ str_contains(Request::url(), 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link text-truncate">
                        <img class="home" src="{{ asset('icon/homehover.svg') }}" alt=""> Dashboard
                    </a>
                </li>
            @endcan
            <li class="nav-item {{ str_contains(Request::url(), 'kwitansi') ? 'active' : '' }}">
                <a href="{{ route('kwitansi') }}" class="nav-link text-truncate">
                    <img class="kwitansi" src="{{ asset('icon/article-hover.svg') }}" alt="">
                    List Kwitansi
                </a>
            </li>            
            @can('super admin')
                <li class="nav-item {{ str_contains(Request::url(), 'manage-users') ? 'active' : '' }}">
                    <a href="{{ route('manage.users') }}" class="nav-link text-truncate">
                        <img class="user" src="{{ asset('icon/userhover.svg') }}" alt="">
                        Manage Admin
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
<nav class="navbar shadow-sm"
    style="background-color: #8ba8d9; display: flex; align-items: center; justify-content: center;">
    <div class="container-fluid" style="display: flex; align-items: center; justify-content: center;">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
            aria-controls="offcanvasWithBothOptions">
            <img src="{{ asset('icon/menu.svg') }}" alt="">
        </button>
        <img class="logo-img" src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="24"
            class="d-inline-block align-text-top" style="margin-right: 10px;">
        <a class="navbar-brand" href="{{ route('dashboard') }}" style="margin-top: 0;">
            PT SATRIYO MEGA SARANA
        </a>

        <div class="profile d-flex align-items-center" style="margin-left: auto; margin-right: 20px">
            <div class="dropdown">
                <a class="dropdown-toggle " style="text-decoration: none; color: #fff;" href="#" role="button"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @can('super admin')
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#changePasswordModal">
                                Change Password
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
        </div>
    </div>
</nav>
@can('super admin')
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('change-password') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword" name="old_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcan
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

    .offcanvas-body #menu li.nav-item {
        width: 92%;
        margin: 0 16px 10px 16px;
        display: flex;
        align-items: center;
        font-size: 20px;
        vertical-align: middle;
        transition: all 0.3s ease;
    }

    .offcanvas-body #menu li.nav-item img {
        margin-right: 10px;
        height: 24px;
        width: 24px;
        transition: all 0.3s ease;
    }

    .offcanvas-body #menu li.nav-item:hover img.home,
    .offcanvas-body #menu li.nav-item.active img.home {
        transform: scale(1.2);
        /* content: url('icon/homehover.svg'); */
        height: 28px;
        width: 28px;
    }

    .offcanvas-body #menu li.nav-item:hover img.kwitansi,
    .offcanvas-body #menu li.nav-item.active img.kwitansi {
        transform: scale(1.2);
        height: 28px;
        width: 28px;
    }


    .offcanvas-body #menu li.nav-item:hover img.user,
    .offcanvas-body #menu li.nav-item.active img.user {
        transform: scale(1.2);
        height: 28px;
        width: 28px;
    }

    .offcanvas-body #menu li.nav-item a.nav-link {
        color: #0A58CA;
        width: 100%;
        display: flex;
        align-items: center;
        padding-left: 8px;
        transition: all 0.3s ease;
        height: 55px;
    }

    .offcanvas-body #menu li.nav-item a.nav-link:hover,
    .offcanvas-body #menu li.nav-item.active a.nav-link {
        background-color: #EDD9EB;
        color: #0A58CA;
        transition: all 0.3s ease;
    }
</style>
