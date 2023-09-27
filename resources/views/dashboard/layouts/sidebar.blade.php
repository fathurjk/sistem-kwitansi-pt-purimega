<div class="offcanvas offcanvas-start w-25" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard/manage-account*') ? 'active' : '' }}">
                        <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kwitansi') }}" class="nav-link {{ Request::is('/kwitansi.index*') ? 'active' : '' }}">
                        <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">List Kwitansi</span></a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard/manage-account*') ? 'active' : '' }}">
                        <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Manage Admin</span></a>
                </li>
            </ul>
        </div>
    </div>

</nav>