<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            @can('super admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-truncate">
                        <i class="fs-5"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
            @endcan
            <li>
                <a href="{{ route('kwitansi') }}" class="nav-link text-truncate">
                    <i class="fs-5"></i><span class="ms-1 d-none d-sm-inline">List Kwitansi</span></a>
            </li>
            @can('super admin')
                <li>
                    <a href="{{ route('manage.users') }}" class="nav-link text-truncate">
                        <i class="fs-5"></i><span class="ms-1 d-none d-sm-inline">Manage Admin</span></a>
                </li>
            @endcan

        </ul>
    </div>
</div>
<style>
    h2{
        font-weight: 700
    }
    li{
        font-size: 18px
    }
</style>