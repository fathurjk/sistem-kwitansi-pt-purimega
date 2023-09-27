<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    @include('templates.sidebar')
    <nav class="navbar shadow-sm" style="background-color: #8ba8d9; display: flex; align-items: center; justify-content: center;">
        <div class="container-fluid" style="display: flex; align-items: center; justify-content: center;">
            <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <img src="{{ asset('icon/menu.svg') }}" alt="">
            </button>
            <img class="logo-img" src="{{ asset('img/logoremove.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" style="margin-right: 10px;">
            <a class="navbar-brand" href="{{ route('kwitansi') }}" style="margin-top: 0;">
                PT SATRIYO MEGA SARANA
            </a>
            
            <span class="profile" style="margin-left: auto;">
                Hello, Fathurrochman Jati Kusuma
                
                <img class="profile-img" src="{{ asset('img/download.jpg') }}" alt="">
            </span>
        </div>
    </nav>
    
</body>

</html>
<style>
    .container-fluid {
        margin: 0 12px 0 24px;
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
