<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FoodSearch</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</head>

<body>

<header>
    <div class="bg-dark collapse" id="navbarHeader" style=""></div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{route('foodsearch')}}" class="navbar-brand">
                <strong>FoodSearch</strong>
            </a>
        </div>
    </div>
</header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="h1">Zaloguj się</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
            <form method="POST" action="{{ route('login.authenticate') }}" class="needs-validation" novalidate>
            @csrf
            <div class="mt-2 mb-3 mr-5 ml-5">
                <label for="exampleFormControlInput1">Email</label>
                <input id="email" name="email" type="email" class="form-control @if ($errors->first('email')) is-invalid @endif"
                 value="{{ old('email') }}" 
                    placeholder="Email">
                <div class="invalid-feedback">Nieprawidłowy email!</div>
            </div>
            <div class="mt-2 mb-3 mr-5 ml-5">
                <label for="exampleFormControlInput1">Hasło</label>
                <input id="password" name="password" type="password" class="form-control @if ($errors->first('password')) is-invalid @endif" 
                    placeholder="Hasło">
                <div class="invalid-feedback">Nieprawidłowe hasło!</div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Zaloguj się">
            </div>
          </form>
          </div>
        </div>
    </main>
</body>

</html>
