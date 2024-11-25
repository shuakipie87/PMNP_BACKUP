
<!-- Nav Item - Dashboard -->

<!-- Heading -->
<!-- <div class="sidebar-heading pt-3">
    Dashboard
</div> -->

<!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li> -->

<!-- Nav Item - Pages Collapse Menu -->
@include('admin.template.navmenu.dashboard')

<!-- Divider -->
<hr class="sidebar-divider">

@include('admin.template.navmenu.hcsc-tool')

<hr class="sidebar-divider">

@include('admin.template.navmenu.task-management')

<hr class="sidebar-divider">

@include('admin.template.navmenu.import-export')

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Users
</div> -->

<!-- Nav Item - Dashboard -->
<!-- <li class="nav-item">
    <a class="nav-link pb-0" href="{{ route('admin.users') }}">
        <i class="fas fa-fw fa-list" aria-hidden="true"></i>
        <span>Users</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users') }}">
        <i class="fas fa-fw fa-list" aria-hidden="true"></i>
        <span>Rules</span>
    </a>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Sectors
</div>
<li class="nav-item">
    <a class="nav-link pb-0" href="{{ route('admin.sectors.regions') }}">
        <i class="fas fa-fw fa-list" aria-hidden="true"></i>
        <span>Regions</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.sectors.regions') }}">
        <i class="fas fa-fw fa-list" aria-hidden="true"></i>
        <span>Organizationals</span>
    </a>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Interface
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Utilities Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Addons
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item active">
    <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link pb-0" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
    </a>
</li> -->

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span>
    </a>
</li> -->

<div class="profile-bottom">
    @php
        var_dump(session()->all());
    @endphp
</div>