<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User registration page</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('public/backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <div class="h1 text-success"><b>Regnum</b>KPI</div>
        </div>
        <div class="card-body">
            @include('partials.notification')
            <h3 class="login-box-msg text-danger">{{ $title ?? 'Admin Register panel' }}</h3>
            <form action="{{ route('admin.create') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-group mb-1">
                    <input type="text" name="name" class="form-control" placeholder="Full name"
                           value="{{ old('name') }}">
                </div>
                <span class="d-block pb-2 text-red">
                    @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </span>
                <div class="input-group mb-1">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{ old('email') }}">
                </div>
                <span class="d-block pb-2 text-red">
                    @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </span>
                <div class="input-group mb-1">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <span class="d-block pb-2 text-red">
                    @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </span>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('admin.login') }}" class="text-center text-success">Already have an account</a>
        </div>
    </div><!-- /.card -->
</div>
<script src="{{ asset('public/backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/adminlte.min.js') }}"></script>
</body>

</html>
