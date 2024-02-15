<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo_cn-removebg-preview.png') }}">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <br>
            <div class="text-center">
                <img src="{{ asset('image/logo_cn-removebg-preview.png') }}" alt="Logo" height="90"
                    width="105">

            </div>
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="h1"><b>PRESENSI</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login</p>

                <form action="{{ route('login-proses') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>

                    <div class="input-group">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>

                    <div class="row">
                        <div class="container">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Good job!',
                text: '{{ $message }}',
            })
        </script>
    @endif

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            })
        </script>
    @endif

</body>

</html>
