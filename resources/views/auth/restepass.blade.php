<!-- Section: Design Block -->
<!doctype html>
<html lang="en">

<head>
    <title>Lon In</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
        <div class="card mb-3">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-lg-4 d-none d-lg-flex">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                        class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                </div>
                <div class="col-lg-8">
                    <div class="card-body py-5 px-md-5">
                        <legend>Log In </legend>
                        <form action="{{ route('resetpassword.post') }}" method="post">
                            @csrf
                            <!-- Password input -->
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-outline mb-4 col-5">
                                <input type="email" name="email" class="form-control" required />
                                <label class="form-label" for="form2Example1">Email ID</label>
                            </div>
                            <div class="form-outline mb-4 col-9">
                                <input type="password" name="password" class="form-control" required />
                                <label class="form-label" for="form2Example2">Enter New Password</label>
                            </div>
                            <div class="form-outline mb-4 col-9">
                                <input type="password" name="password_confirmation" class="form-control" required />
                                <label class="form-label" for="form2Example2">Confirm Password</label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
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
