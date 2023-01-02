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
    <title>Регистрация - Crystal</title>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Регистрация</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
