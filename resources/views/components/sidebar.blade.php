<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion fw-bold" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo merlyn mansion" class="img-fluid">
        </div>
        <div class="sidebar-brand-text mx-2">Merlyn Mansion</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 text-light">

    @if (auth()->user()->can('dashboard'))
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ strpos(Request::path(), '/') !== false ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif

    @if (
        auth()->user()->can('readTransaction') || 
        auth()->user()->can('readReport')
        )
        <!-- Divider -->
        <hr class="sidebar-divider text-light">

        <!-- Heading -->
        <div class="sidebar-heading">
            Accounting
        </div>
    @endif

    @if (
        auth()->user()->can('readTransaction') || 
        auth()->user()->can('createTransaction') ||
        auth()->user()->can('deleteTransaction')
        )
        <li class="nav-item {{ strpos(Request::path(), 'transaction') !== false ? 'active' : '' }}" >
            <a class="nav-link" href="{{ route('transaction.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Transaction</span></a>
        </li>
    @endif

    @if (auth()->user()->can('readReport'))
        <li class="nav-item {{ strpos(Request::path(), 'financial-report') !== false ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('financialReport.index') }}">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Financial Report</span></a>
        </li>
    @endif

    @if (
        auth()->user()->can('readUser') || 
        auth()->user()->can('createLog')
        )
        <!-- Divider -->
        <hr class="sidebar-divider text-light">

        <!-- Heading -->
        <div class="sidebar-heading">
            User Management
        </div>
    @endif

    @if (
        auth()->user()->can('readUser') || 
        auth()->user()->can('createUser') ||
        auth()->user()->can('editRoleUser') ||
        auth()->user()->can('deleteUser')
        )
        <li class="nav-item {{ strpos(Request::path(), 'users') !== false ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-wa fa-users-cog"></i>
                <span>Users</span></a>
        </li>
    @endif

    @if (auth()->user()->can('readLog'))
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ strpos(Request::path(), 'activity-log') !== false ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('log.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Activity Log</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block text-light">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>