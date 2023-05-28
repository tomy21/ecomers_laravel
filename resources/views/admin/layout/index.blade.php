<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin || {{ $title }}</title>
    <link href="{{ asset('css/app-3ea8b221.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/dasboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css"
        rel="stylesheet" />

</head>

<body>
    <main>

        <div class="sidebar p-4" id="sidebar">
            <h4 class="mb-3 text-white text-center">PT. Jaya itu</h4>
            <hr class="text-white m-0 p-0">
            <li class="links {{ Request::path() === 'admin/dashboard' ? 'active' : '' }}">
                <a class="text-white" href="dashboard">
                    <i class="fas fa-th-large pr-4"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="links">
                <a class="text-white" href="#dataBarang" data-bs-toggle="collapse">
                    <i class="fas fa-table"></i>
                    <div class="d-flex justify-content-between flex-lg-row gap-4 align-items-center">
                        <span>Mater Data</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </a>
                <ul class="nav ms-1 {{ Request::path() === 'admin/dataBarang' ? 'active' : 'collapse' }}"
                    id="dataBarang">
                    <li class="nav-item my-1 d-flex flex-lg-row w-100">
                        <a href="dataBarang" class="nav-link text-white" aria-current="page">
                            <i class="far fa-circle text-white"></i>
                            <span>Data Barang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="links">
                <a class="text-white" href="#laporanBarang" data-bs-toggle="collapse">
                    <i class="fas fa-file"></i>
                    <div class="d-flex justify-content-between flex-lg-row gap-4 align-items-center">
                        <span>Laporan</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </a>
                <ul class="nav ms-1 {{ Request::path() === 'admin/laporanBarang' ? 'active' : 'collapse' }}"
                    id="laporanBarang">
                    <li class="nav-item my-1 d-flex flex-lg-row w-100">
                        <a href="laporanBarang" class="nav-link text-white" aria-current="page">
                            <i class="far fa-circle text-white"></i>
                            <span>Pelanggan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="links {{ Request::path() === 'admin/user' ? 'active' : '' }}">
                <a class="text-white" href="user">
                    <i class="fas fa-user"></i>
                    <span>User Managent</span>
                </a>
            </li>

            <li class="links {{ Request::path() === 'admin/galery' ? 'active' : '' }}">
                <a class="text-white" href="galery">
                    <i class="fas fa-images"></i>
                    <span>Galery dan Loker</span>
                </a>
            </li>

            <li class="position-absolute" style="width: 75%;">
                <hr class="text-white">
                <a class="text-white" href="#menuDown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                    <span>Menu</span>

                </a>
                <ul class="dropdown-menu p-2" id="menuDown">
                    <li class="nav-item my-1 d-flex flex-lg-column">
                        <a href="#" class="nav-link pb-3" aria-current="page">
                            <i class="fas fa-users"></i>
                            <span>Profil</span>
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link" aria-current="page">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </div>
    </main>
    <section class="p-3 sidebarM" id="main-content">
        <div class="d-flex justify-content-between">
            <button class="btn btn-secondary" id="button-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="d-flex align-items-center  gap-3 p-0 justify-content-center">
                <img src="{{ url('assets/images/user/'. auth()->user()->images) }}" style="width:50px;border-radius:50%;"
                    alt="foto profil">
                <div class="d-flex flex-column p-0">
                    <h6 style="margin:0;">{{ auth()->user()->name }}</h6>
                    <p style="margin:0;padding:0px;font-size:12px;">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        @yield('content')
    </section>
</body>
</body>
<script src="{{ asset('js/app-d4b42df8.js') }}"></script>
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/jqueryMigrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js">
</script>
@stack('scripts')
<script>
    $('#button-toggle').click(function(e) {
        e.preventDefault();
        var $linksLogin = $("#sidebar");
        var $mainContent = $('#main-content')
        if ($linksLogin.hasClass("active-sidebar") && $mainContent.hasClass("active-main-content")) {
            $linksLogin.removeClass("active-sidebar");
            $mainContent.removeClass("active-main-content");
            $mainContent.addClass("sidebarM");
        } else {
            $linksLogin.addClass("active-sidebar");
            $mainContent.addClass('active-main-content')
            $mainContent.removeClass('sidebarM')
        }

    });
</script>

</html>
