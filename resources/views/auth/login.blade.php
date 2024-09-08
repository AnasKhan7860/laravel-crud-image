<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Account Login</h5>
                        @session('warning')
                            <div class="text-warning text-center">{{ $value }}</div>
                        @endsession
                        @session('success')
                            <div class="text-success text-center">{{ $value }}</div>
                        @endsession
                        <form action="{{ route('check') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email address" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Login</button>              
                            </div>
                            <div class="text-center">
                              <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
