<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/DashboardTemplate/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/DashboardTemplate/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/DashboardTemplate/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/DashboardTemplate/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/DashboardTemplate/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/DashboardTemplate/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/DashboardTemplate/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/DashboardTemplate/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/DashboardTemplate/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    {{-- toy aumentando este enlace --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" title="main">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/DashboardTemplate/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('/DashboardTemplate/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Area Personal</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="buscar.." title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('/DashboardTemplate/assets/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle">
                        <span
                            class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->usuario->u_nom }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->usuario->u_nom }}</h6>
                            <span>{{ auth()->user()->a_tipo }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('usuario.verPerfil', auth()->user()->usuario->u_id) }}">
                                <i class="bi bi-person"></i>
                                <span>Ver Perfil</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('usuario.verPerfil', auth()->user()->usuario->u_id) }}">
                                <i class="bi bi-gear"></i>
                                <span>Configurar la cuenta</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <form action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="dropdown-item">
                                        Cerrar Sesion
                                    </button>
                                </form>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                @if (auth()->user()->a_tipo == 'administrador')
                    <a class="nav-link " href="{{ route('reporte.administrador') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                @endif

                @if (auth()->user()->a_tipo == 'entrenador')
                    <a class="nav-link " href="{{ route('reporte.entrenador') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                @endif

                @if (auth()->user()->a_tipo == 'cliente')
                    <a class="nav-link " href="{{ route('reporte.cliente') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                @endif
            </li><!-- End Dashboard Nav -->
            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Gestionar Usuarios</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{ route('usuario.registrar') }}">
                                <i class="bi bi-circle"></i><span>Registrar Usuario</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('usuario.listar') }}">
                                <i class="bi bi-circle"></i><span>Listar Usuario</span>
                            </a>
                        </li>

                        @if (auth()->user()->a_tipo == 'administrador')
                            <li>
                                <a href="{{ route('acceso.listar') }}">
                                    <i class="bi bi-circle"></i><span>Listar Accesos</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li><!-- End Components Nav -->
            @endif


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Gestionar Productos</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                        <li>
                            <a href="{{ route('producto.registrar') }}">
                                <i class="bi bi-circle"></i><span>Registrar Productos</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('producto.listar') }}">
                            <i class="bi bi-circle"></i><span>Listar productos</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Gestionar Mensualidad</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('mensualidad.listar') }}">
                            <i class="bi bi-circle"></i><span>Listar</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Gestionar Ventas</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                        <li>
                            <a href="{{ route('ventas.listar') }}">
                                <i class="bi bi-circle"></i><span>Listar todas las ventas</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('ventas.registrar') }}">
                                <i class="bi bi-circle"></i><span>Registrar</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('ventas.usuario.listar') }}">
                            <i class="bi bi-circle"></i><span>Listar Tus Ventas</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Gestionar Rutinas y Ejercicios</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                        <li>
                            <a href="{{ route('rutina.registrar') }}">
                                <i class="bi bi-circle"></i><span>Registrar Rutina</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('rutina.listar') }}">
                            <i class="bi bi-circle"></i><span>Listar Rutinas</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#asis-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Gestionar Asistencia</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="asis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if (auth()->user()->a_tipo == 'cliente')
                        <li>
                            <a href="{{ route('asistencia.listar', auth()->user()->a_id) }}">
                                <i class="bi bi-circle"></i><span>Listar asistencias</span>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                        <li>
                            <a href="{{ route('asistencia.usuario.listar') }}">
                                <i class="bi bi-circle"></i><span>Listar Usuarios</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#hor-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Gestionar Horario</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="hor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if (auth()->user()->a_tipo == 'cliente')
                        <li>
                            <a href="{{ route('horario.listar', auth()->user()->usuario->u_id) }}">
                                <i class="bi bi-circle"></i><span>Listar horarios</span>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                        <li>
                            <a href="{{ route('horario.usuario.listar') }}">
                                <i class="bi bi-circle"></i><span>Listar Usuarios</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </li><!-- End Tables Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#themes-nav" data-bs-toggle="collapse" href="#">
                    <span>Temas</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="themes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="cosmo">
                            <i class="bi bi-circle"></i><span>Modo dia</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="cyborg">
                            <i class="bi bi-circle"></i><span>Modo noche</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="lux">
                            <i class="bi bi-circle"></i><span>Adultos</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="simplex">
                            <i class="bi bi-circle"></i><span>Jovenes</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="sketchy">
                            <i class="bi bi-circle"></i><span>Niño</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->



        </ul>

    </aside><!-- End Sidebar-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>

    <script>
        function supports_html5_storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }

        var supports_storage = supports_html5_storage();

        function set_theme(theme) {
            $('link[title="main"]').attr('href', theme);
            if (supports_storage) {
                localStorage.theme = theme;
            }
        }
        jQuery(function($) {
            $('body').on('click', '.change-style-menu-item', function() {
                var theme_name = $(this).attr('rel');
                var theme = "//cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/" + theme_name +
                    "/bootstrap.min.css";
                set_theme(theme);
            });
        });

        if (supports_storage) {
            var theme = localStorage.theme;
            if (theme) {
                set_theme(theme);
            }
        } else {
            /* Don't annoy user with options that don't persist */
            $('#theme-dropdown').hide();
        }
    </script>

    <main id="main" class="main">

        @yield('content')


        <section class="section dashboard">




            {{-- scrpt --}}


        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Contador de pagina: <strong><span>{{ $contador->count }}</span></strong>.
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/DashboardTemplate/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/DashboardTemplate/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/DashboardTemplate/assets/js/main.js') }}"></script>

</body>

</html>
