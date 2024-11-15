<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Data Selling</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Crud Menu
    </div>

    <!-- Nav Item - Items -->
    <li class="nav-item {{ request()->is('items*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('items.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Items</span>
        </a>
    </li>

    <!-- Nav Item - Transactions -->
    <li class="nav-item {{ request()->is('transactions*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transactions.index') }}">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Transactions</span>
        </a>
    </li>

    <!-- Nav Item - Type of Items -->
    <li class="nav-item {{ request()->is('types*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('types.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Type of Items</span>
        </a>
    </li>

    <!-- Nav Item - Compare -->
    <li class="nav-item {{ request()->is('compare*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('compare.index') }}">
            <i class="fas fa-fw fa-sort-amount-up-alt"></i>
            <span>Compare menu</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
