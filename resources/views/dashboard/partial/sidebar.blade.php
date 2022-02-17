<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" hrefaria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/submissions*') ? 'active' : '' }}" href="/dashboard/submissions">
                    <span data-feather="archive"></span>
                    Submissions
                </a>
            </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Admin Room</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" hrefaria-current="page" href="/dashboard/categories">
                    <span data-feather="file-text"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/items*') ? 'active' : '' }}" hrefaria-current="page" href="/dashboard/items">
                    <span data-feather="file-text"></span>
                    Items
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>
