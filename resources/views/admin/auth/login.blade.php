<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User registration page</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- <link rel="stylesheet" href="{{ asset('public/dist/css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/public/dist/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/app.css') }}">

</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <div class="h1 text-success"><b>Regnum</b>KPI</div>
        </div>
        <div class="card-body">
            @include('partials.notification')
            <h3 class="login-box-msg text-danger">{{ $title ?? 'Admin login panel' }}</h3>
            <form action="{{ route('admin.check') }}" method="POST">
                {{ csrf_field() }}
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
                    <div class="col-4 text-right">
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.card -->
</div>
{{-- <script src="{{ asset('public/dist/js/app.js') }}"></script>--}}
{{-- <script src="{{ mix('public/dist/js/app.js') }}"></script>--}}
</body>

</html>
