<!-- Section: Design Block -->
<!doctype html>
<html lang="en">

{{-- data-bs-theme="dark" --}}

<head>
    <title>Lon In</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <style>
        .image_login {
            width: ;
            height: 600px;
        }
    </style>

</head>

<body>

    <section class=" text-center text-lg-start">
        <style>
            .rounded-t-5 {
                border-top-left-radius: 0.5rem;
                border-top-right-radius: 0.5rem;
            }

            @media (min-width: 992px) {
                a .rounded-tr-lg-0 {
                    border-top-right-radius: 0;
                }

                .rounded-bl-lg-5 {
                    border-bottom-left-radius: 0.5rem;
                }
            }
        </style>

        <div class="container my-2">
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <center class="alert alert-danger">{{ $error }}</center>
                    @endforeach
                </div>
            @endif
            @if (session()->has('error'))
                <center class="alert alert-danger">{{ session('error') }}</center>
            @endif
            @if (session()->has('success'))
                <center class="alert alert-success">{{ session('success') }}</center>
            @endif
        </div>
        @if ($isLogin ?? '')
            @if ($errors->has('register'))
                <strong class="text-danger ">{{ $errors->first('register') }}</strong>
            @endif
            <div class="card mb-3">

                <div class="row g-0 d-flex align-items-center">
                    <div class="col-lg-4 d-none d-lg-flex">
                        <img src="{{ url('/images/login_page.jpg') }}"
                            class="image_login rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                    </div>

                    <div class="col-lg-8">
                        <h1><b>Welcome To KIRC Institute Of Management</b></h1>
                        <div class="card-body py-5 px-md-5">
                            <legend>Log In </legend>
                            <form action="{{ route('login.post') }}" method="post">
                                @csrf
                                <!-- Email input -->
                                @if ($errors->has('email'))
                                    <strong class="text-danger ">{{ $errors->first('email') }}</strong>
                                @endif
                                <div class="form-outline mb-4 col-7">
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email') }}" />
                                    <label class="form-label" for="form2Example1">Email ID</label>


                                </div>

                                <!-- Password input -->
                                @if ($errors->has('password'))
                                    <strong class="text-danger ">{{ $errors->first('password') }}</strong>
                                @endif
                                <div class="form-outline mb-4 col-7">
                                    <input type="password" name="password" class="form-control" id="password" />

                                    <label class="form-label">Password</label><br>
                                    <input type="checkbox" onclick="showPassword()"> Show Password

                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">


                                    <div class="col">
                                        <!-- Simple link -->
                                        <a href="{{ route('forgotpassword') }}">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                                <button type="button" class="btn btn-primary btn-block mb-4"><a class="text-white"
                                        href="{{ route('register') }}">Registration</a> </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card mb-3">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col-lg-4 d-none d-lg-flex">
                        <img src="{{ url('/images/login_page.jpg') }}"
                            class="image_login rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                    </div>
                    <div class="col-lg-8">
                        <h1><b>Welcome To KIRC Institute Of Management</b></h1>
                        <div class="card-body py-5 px-md-5">
                            <legend>Registation </legend>
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf

                                <div class="form-outline mb-4 col-9">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name') }}" required />
                                    <label class="form-label" for="form2Example1">User Name</label>
                                </div>
                                <!-- Email input -->
                                @if ($errors->has('email'))
                                    <strong class="text-danger ">{{ $errors->first('email') }}</strong>
                                @endif
                                <div class="form-outline mb-4 col-9">
                                    <input type="email" name="email"
                                        class="form-control {{ $errors ?? ('')->has('email') ? 'has-error' : '' }}"
                                        value="{{ old('email') }}" />
                                    <label class="form-label" for="form2Example1">Email address</label>
                                </div>

                                <!-- Password input -->
                                @if ($errors->has('password'))
                                    <strong class="text-danger ">{{ $errors->first('password') }}</strong>
                                @endif
                                <div class="form-outline mb-4 col-9">
                                    <input type="password" name="password" class="form-control" id="password"
                                        required />
                                    <label class="form-label" for="password">Password</label><br>

                                    <input type="checkbox" onclick="showPassword()"> Show Password

                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                                <button type="button" class="btn btn-primary btn-block mb-4"><a class="text-white"
                                        href="{{ route('login') }}">Sign in</a> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <script>
            function showPassword() {
                var passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }
        </script>

    </section>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
