<!doctype html>
<html>
    <head>
        @include('admin.includes.head')
    </head>
    <body id="page-top">

        <header>
            @include('admin.template.header')
        </header>

        <div id="main">

            <!-- Page Wrapper -->
            <div id="wrapper">

                <!-- Sidebar - sidebar-light / sidebar-dark -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-light accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                        <div class="sidebar-brand-icon">
                            <img src="{{ asset('assets/img/pmnp-logo-dashboard.png') }}" alt="logo" />
                        </div>
                        <!-- <div class="sidebar-brand-text mx-3">PMNP <sup> DOH</sup></div> -->
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    @include('admin.template.sidebar')

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Search -->
                            @include('admin.template.search')

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                @include('admin.template.dropdown')

                                <!-- Nav Item - Alerts -->
                                @include('admin.includes.alerts')

                                <!-- Nav Item - Messages -->
                                @include('admin.includes.message')

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">

                                    @include('admin.template.profile')

                                </li>

                            </ul>

                        </nav>
                        <!-- End of Topbar -->

                        @yield('content')

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    @include('admin.template.copyright')
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

        </div>

        <footer>
            @include('admin.template.footer')
        </footer>

    </body>
</html>