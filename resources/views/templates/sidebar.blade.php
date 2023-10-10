<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title d-none d-sm-block" style="font-weight: 700" id="offcanvas">Menu</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            @can('super admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-truncate">
                        <img class="home" src="{{ asset('icon/home.svg') }}" alt=""> Dashboard
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('kwitansi') }}" class="nav-link text-truncate">
                    <img class="article" src="{{ asset('icon/article.svg') }}" alt="">
                    List Kwitansi</a>
            </li>
            @can('super admin')
                <li class="nav-item">
                    <a href="{{ route('manage.users') }}" class="nav-link text-truncate">
                        <img class="user" src="{{ asset('icon/user.svg') }}" alt="">
                        Manage Admin</a>
                </li>
            @endcan

        </ul>
    </div>
</div>
<style>
    
    .offcanvas-body #menu li.nav-item {
        width: 92%;
        margin: 0 16px 10px 16px;
        display: flex;
        align-items: center;
        font-size: 20px;
        vertical-align: middle;
    }

    .offcanvas-body #menu li.nav-item img {
        margin-right: 10px;
        height: 24px;
        width: 24px;
    }

    .offcanvas-body #menu li.nav-item:hover img.home {
        content: url('icon/homehover.svg');
    }
    .offcanvas-body #menu li.nav-item:hover img.article {
        content: url('icon/articlehover.svg');
    }
    .offcanvas-body #menu li.nav-item:hover img.user {
        content: url('icon/userhover.svg');
    }

    .offcanvas-body #menu li.nav-item a.nav-link:hover {
        background-color: #EDD9EB;
        color: #0A58CA
    }

    .offcanvas-body #menu li.nav-item a.nav-link {
        color: #8ba8d9;
        width: 100%;
        display: flex;
        align-items: center;
        padding-left: 6px;
    }
</style>
