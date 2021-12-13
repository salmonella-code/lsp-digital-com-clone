<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Lembaga Sertifikasi Profesi</title>

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="wrapper container-fluid overflow-hidden p-0">
        <!-- navbar -->
        <nav id="sidebar" class="c-border-right shadow">
            <div class="logo">
                <img src="{{ asset('admin/images/logo-lsp.png') }}" alt="logo lsp">
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('home') }}" class="a-link"><i class="fas fa-fw fa-home"></i>Beranda</a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}" class="a-link"><i class="fas fa-fw fa-users"></i>Data User</a>
                </li>
                <li class="label">
                    <span>Data Halaman</span>
                </li>
                <li>
                    <a class="a-link" href="#homeSubMenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-fw fa-home"></i>
                                <span>Home</span>
                            </div>
                            <i class="fas fa-fw fa-caret-down"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubMenu">
                        <li>
                            <a class="a-link" href="{{ route('banner.index') }}">Banner</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('profile.index') }}" class="a-link"><i class="fas fa-fw fa-user"></i>Profil</a>
                </li>
                <li>
                    <a class="a-link" href="#skemaSubMenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-fw fa-tasks"></i>
                                <span>Sertifikasi</span>
                            </div>
                            <i class="fas fa-fw fa-caret-down"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled" id="skemaSubMenu">
                        <li>
                            <a class="a-link" href="{{ route('skema.index') }}">Skema Sertifikasi</a>
                        </li>
                        <li>
                            <a class="a-link" href="{{ route('place.index') }}">Tempat Uji Kompetensi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('media.index') }}" class="a-link"><i class="fas fa-fw fa-share"></i>Media</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda yakin ingin logout ?');" class="a-link"><i class="fas fa-fw fa-sign-out-alt"></i>Log Out</a>
                </li>
            </ul>
        </nav>
        <!-- end navbar -->

        <!-- Page Content Holder -->
        <div id="content" class="d-flex flex-column min-vh-100">
            <div>
                <div class="d-flex align-items-center mb-5">
                    <div class="align-items-center c-border bg-white p-3 mr-3 shadow">
                        <button type="button" id="sidebarCollapse" class="btn bg-transparent p-0">
                            <i class="fas fa-bars h2 mb-0 text-secondary"></i>
                        </button>
                    </div>
                    <div class="w-100 c-border bg-white p-3 shadow">
                        <h3 class="mb-0 font-weight-bold text-capitalize">Hello, {{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h3 class="text-capitalize">@yield('pageTitle')</h3>
                @yield('content')
            </div>
            <footer class="mt-auto card border-0 shadow">
                <div class="card-body">
                    <span class="text-secondary">Powered By &copy;JWD - Mohamad Salman Farizi - 2021</span>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @stack('script')
</body>

</html>