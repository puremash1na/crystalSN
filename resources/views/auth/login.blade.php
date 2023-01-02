<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/public/vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/public/vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/public/vendor/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/public/vendor/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/public/vendor/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/public/vendor/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="shortcut icon" href="/public/images/logo-crystal.svg"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Авторизация - Crystal</title>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Авторизация</h3>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Логин или E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Пароль</label>
                                <input id="password" type="password"
                                       class="form-control @error('email') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>Запомнить</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Авторизация</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script src="/public/vendor/js/vendor.bundle.base.js"></script>
<script src="/public/vendor/chart.js/Chart.min.js"></script>
<script src="/public/vendor/progressbar.js/progressbar.min.js"></script>
<script src="/public/vendor/jvectormap/jquery-jvectormap.min.js"></script>
<script src="/public/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/public/vendor/owl-carousel-2/owl.carousel.min.js"></script>
<script src="/public/js/off-canvas.js"></script>
<script src="/public/js/hoverable-collapse.js"></script>
<script src="/public/js/misc.js"></script>
<script src="/public/js/settings.js}"></script>
<script src="/public/js/todolist.js"></script>
<script src="/public/js/dashboard.js"></script>
</body>
</html>
