
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('cars.index') }}">
                                Rental Mobil Berkah
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="avatar avatar-xl me-3">
                        <img src="{{ asset('assets/images/faces/daffa.jpeg') }}" alt="" srcset="">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="javascript:void(0)">
                        {{ auth()->user()->name }}
                    </a>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        {{-- <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : ''}}">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li> --}}

                        <li class="sidebar-item {{ request()->routeIs('cars.*') ? 'active' : ''}}">
                            <a href="{{ route('cars.index') }}" class='sidebar-link'>
                                <i class="fas fa-car"></i>
                                <span>Daftar Mobil</span>
                            </a>
                        </li>




                        @if( auth()->user()->role == 0 )
                        <li class="sidebar-item {{ request()->routeIs('riwayat-pesanan.*') ? 'active' : ''}}">
                            <a href="{{ route('riwayat-pesanan.index') }}" class='sidebar-link'>
                                <i class="fas fa-hand-holding-usd"></i>
                                <span>Riwayat Pesanan</span>
                            </a>
                        </li>
                        @endif

                        @if ( auth()->user()->role == 1 )
                        <li class="sidebar-item {{ request()->routeIs('booking.*') ? 'active' : ''}}">
                            <a href="{{ route('booking.index') }}" class='sidebar-link'>
                                <i class="fas fa-hand-holding-usd"></i>
                                <span>Penyewaan</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('proses-pinjam.*') ? 'active' : ''}}">
                            <a href="{{ route('proses-pinjam.index') }}" class='sidebar-link'>
                                <i class="fas fa-truck-moving"></i>
                                <span>Proses Pinjam</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('user.*') ? 'active' : ''}}">
                            <a href="{{ route('user.index') }}" class='sidebar-link'>
                                <i class="fas fa-users"></i>
                                <span>User</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->routeIs('selesai.*') ? 'active' : ''}}">
                            <a href="{{ route('selesai.index') }}" class='sidebar-link'>
                                <i class="fas fa-check-circle"></i>
                                <span>Selesai</span>
                            </a>
                        </li>
                        @endif

                        <li class="sidebar-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='sidebar-link'>
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p></p>
                    </div>
                    <div class="float-end">
                        <p> <span class="text-danger"><i class="bi bi-heart"></i></span>  <a
                                href="">Rental Berkah</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    @if (session()->has('success'))
        <script>
            Swal.fire('Berhasil', '{{ session()->get('success') }}', 'success')
        </script>
    @endif

    @stack('after-script')

</body>

</html>
