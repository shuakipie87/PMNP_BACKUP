<!doctype html>
<html>
    <head>
        @include('admin.includes.head')
    </head>
    <body class="bg-gradient-primary">
        <div class="xl-container">

            <header>
                @include('admin.template.header-login')
            </header>

            <div id="main">
                @yield('content')
            </div>

            <footer>
                @include('admin.template.footer-login')
            </footer>

        </div>
    </body>
</html>