<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Themart Admin Dashboard</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/core/core.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/demo_1/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.png" />
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">
                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="{{ route('dashboard') }}" class="noble-ui-logo d-block mb-2">The<span>Mart</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                                        <form class="forms-sample" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                                                @error('email')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                                                @error('password')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- core:js -->
    <script src="{{ asset('backend') }}/vendors/core/core.js"></script>
    <script src="{{ asset('backend') }}/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('backend') }}/js/template.js"></script>
</body>
</html>