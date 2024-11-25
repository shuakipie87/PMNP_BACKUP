
<!doctype html>
<html>
    <head>
        @include('admin.includes.head')
    </head>

    <style>
        html {
            background: #fff;
            overflow: hidden;
        }
        .gradient-custom-1 {
            background: #fff;
        }
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #FCA716;
        }
    </style>

    <body class="form-container">
        <div class="xl-container">

            <header>
                @include('admin.template.header-login')
            </header>

            <div id="main">

                <div class="row justify-content-center form-wrapper"> <!-- Outer Row -->
                    <section class="h-100 gradient-form">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-xl-12">
                                <div class="rounded-3 text-black">
                                    <div class="row g-0">
                                        <div class="col-lg-6 gradient-custom-1">
                                            <div class="form-inner card-body mx-md-4">

                                                @yield('content')

                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex no-padding">
                                            <div class="text-white form-image">
                                                <div class="form-image-overlay"></div>
                                                <img src="{{ asset('assets/img/logo-image.png') }}" alt="logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> <!-- Outer Row - END -->

            </div>

            <footer>
                @include('admin.template.footer-login')
            </footer>

        </div>
    </body>
</html>