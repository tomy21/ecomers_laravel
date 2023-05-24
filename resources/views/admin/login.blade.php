<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('build/assets/app-3ea8b221.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/dasboard.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    <div class="container m-auto">
        <h2 class="text-center m-4">{{ $name }}</h2>

        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="card p-4 m-auto" style="width:30vw">
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="pass">
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Login</button>
            </div>
        </form>
    </div>
</body>

<script src="{{ asset('build/assets/app-d4b42df8.js') }}"></script>
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/jqueryMigrate-1.2.1.min.js') }}"></script>

</html>
