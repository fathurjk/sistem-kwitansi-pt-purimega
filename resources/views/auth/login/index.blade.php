<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('img/logo-pm.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="sheet wrapper"
        style="position: relative; display: flex; padding: 4rem 0 0 0; flex-direction: column; justify-content: flex-start; align-items: center; height: 100vh;">
        <div class="header text-center mb-5">
            <img class="login-logo" class="mb-4" src="{{ asset('img/logo-pm.png') }}" alt="" width="80px"
                height="80px" style="margin-right: 8px">
            <label class="login-tittle" style="font-size: 42px; font-weight: 600" for="">PT PURIMEGA SARANALAND</label>
        </div>
        <div class="col-md-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('errorMessage'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errorMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="username" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="Input your username" required value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mt-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
<style>
    .header {
        max-height: 7rem;
        display: grid;
        flex-grow: 1;
        vertical-align: middle;
        justify-items: center
    }
</style>
