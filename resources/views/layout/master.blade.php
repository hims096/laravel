<!doctype html>
<html lang="en">

{{-- data-bs-theme="dark" --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<style>
    .navbarclass {
        height: 100px;
        font-size: 20;
    }
</style>

<body>
    <header>
        <nav class="navbarclass navbar navbar-expand-sm navbar-light">

            <div class="container">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">

                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/student/welcome') }}" aria-current="page"> Home
                                <span class="visually-hidden">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.course') }}">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="/student/view">Student Data</a>
                                <a class="dropdown-item" href="/product/product">Product</a>
                                <a class="dropdown-item" href="/student/attendance">Attedance</a>

                            </div>
                        </li>
                    </ul>

                </div>
                <div class=" me-4 dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true" title="Logout">
                        <b>{{ $User->name ?? 'Username' }}</b></a>
                    <li class="dropdown-menu">
                        <a class=" dropdown-item " onclick="return confirm  ('Are You sure Want To Logout..?')"
                            href="{{ route('logout') }}">Logout</a>
                    </li>

                </div>
            </div>
        </nav>
    </header>
    @yield('welcomepage')
    @yield('stdform')
    @yield('stdview')
    @yield('product')
    @yield('scriptproduct')
    @yield('about')
    @yield('course')
    @yield('aboutstudent')
    @yield('details_student')
    @yield('addblog')
    @yield('blogshow')


    <div>
        <footer class="border border-white border-2 bg-dark text-center text-lg-start text-light">
            <!-- Grid container -->
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="container p-4 pb-0">
                <form action="{{ route('subscribe.post') }}" method="post">
                    @csrf
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-auto mb- mb-md-0">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12 mb-4 mb-md-0">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form5Example25" class="form-control"
                                    placeholder="Enter Your Email ID" />

                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto mb-4 mb-md-0">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->     
                </form>
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(227, 217, 217, 0.2);">
                © {{ date('Y') }} Copyright:
                <a class="text-light" href="{{ url('/student/welcome') }}">www.kircinstumanga.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>
