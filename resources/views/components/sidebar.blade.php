<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion fw-bold" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-bed"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Merlyn Villa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 text-light">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider text-light">

    <!-- Heading -->
    <div class="sidebar-heading">
        Accounting
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Transaction</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Financial Report</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider text-light">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Management
    </div>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-wa fa-users-cog"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-list"></i>
            <span>Activity Log</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block text-light">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>