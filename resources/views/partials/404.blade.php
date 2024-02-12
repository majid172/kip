<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel project | 404 Page not found</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <section class="content">
        <div class="error-page mt-5">
            <h2 class="headline text-danger"> 404</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>
                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may try using the search
                    form.
                </p>
                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-danger"><i
                                    class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="error-page">
            <a href="" class="btn btn-success">Return admin dashboard</a>
            <a href="" class="btn btn-success">Return user dashboard</a>
            <a href="{{ route('home') }}" class="btn btn-success">Return site</a>
        </div>
    </section>
</div>
<script src="{{ asset('public/backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/adminlte.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/demo.js') }}"></script>
</body>
</html>
