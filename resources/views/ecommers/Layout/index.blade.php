<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Superindo | {{ $title }}</title>

</head>

<body>
    <main id="blur">
        <nav>
            <div class="navigation">
                <div class="logo"><a href="#">Logo Toko</a></div>
                <div class="links">
                    <ul>
                        <li>
                            <a class="{{ Request::path() === '/' ? 'active' : '' }}" href="/">Beranda</a>
                        </li>
                        <li>
                            <a class="{{ Request::path() === 'galery' ? 'active' : '' }}" href="/galery">Galery</a>
                        </li>
                        <li>
                            <a class="{{ Request::path() === 'kontak_kami' ? 'active' : '' }}"
                                href="/kontak_kami">Kontak kami</a>
                        </li>
                        <li>
                            <a class="{{ Request::path() === 'karir' ? 'active' : '' }}" href="/karir">Karir</a>
                        </li>
                    </ul>
                </div>
                <div class="btn-mamber">
                    @auth
                        {{-- <li class="dropdown"><a href="#">{{ auth()->user()->name }}</a>
                            <ul class="isi-dropdown">
                                <li><a href="/logout">Keluar</a></li>
                            </ul>
                        </li> --}}
                        <div class="select" tabindex="0" role="button">
                            <div class="text-links">
                                <p tabindex="0">{{ auth()->user()->name }}</p>
                                <p style="font-size: 10px" tabindex="0">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="links-login" id="links-login">
                                <a href="/kartuMamber" role="button" tabindex="0">Kartu Mamber</a>
                                <a href="/logout" role="button" tabindex="0">Keluar</a>
                            </div>
                        </div>
                    @else
                        <button class="btn-login" id="btnLogin" onclick="loginBtn()">Daftar/Masuk Mamber</button>
                    @endauth
                </div>
            </div>
        </nav>
        <section>
            @if (session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="content">
                @yield('content')
            </div>
        </section>
        <footer>
            <div class="about-footer">
                <div class="about">
                    <div class="title">
                        PT. Punya Saya
                    </div>
                    <div class="desc">
                        Berbekal dedikasi dan inovasi,
                        mengukuhkan statusnya sebagai
                        perusahaan waralaba minimarket
                        pertama dan terbesar di Indonesia
                    </div>
                </div>
                <div class="address">
                    <div class="title">
                        Kantor kami :
                    </div>
                    <div class="desc">
                        Jl. Pantai Indah Kapuk Boulevard, No 1,
                        Pantai Indah Kapuk, Jakarta Utara, 14470
                        Telp. (021) 5089 7400 (Hunting)
                        (021) 5089 7411 (Hunting)
                    </div>
                </div>
                <div class="medsos">
                    <div class="title">
                        Media Sosial
                    </div>
                    <div class="icon">
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-whatsapp"></i>
                        <i class="fab fa-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="copyright">Copyright &copy ;
                <script>
                    document.write(new Date().getFullYear())
                </script> Punya saya. All right reserved
            </div>
        </footer>
    </main>

    {{-- Modal view --}}
    @include('ecommers.Modal.login')
    @include('ecommers.Modal.daftar')


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/jqueryMigrate-1.2.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="{{asset('js/ajax.js')}}"></script>


</html>
