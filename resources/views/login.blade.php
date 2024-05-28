<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>FoodSearch</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/album.css')}}">
</head>

<body>

    <header>
        <div class="bg-dark collapse" id="navbarHeader" style="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album
                            below, the author, or any other background context. Make it a few
                            sentences long so folks can pick up some informative tidbits. Then, link
                            them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="{{route('foodsearch')}}" class="navbar-brand d-flex align-items-center">
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
                <input id="email" name="email" type="email" class="form-control @if ($errors->first('email')) is-invalid @endif" value="{{ old('email') }}" 
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

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/holder.min.js')}}"></script>

    <script src="public/js/app.js" type="text/javascript"></script><svg xmlns="http://www.w3.org/2000/svg" width="348"
        height="225" viewBox="0 0 348 225" preserveAspectRatio="none"
        style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
        <defs>
            <style type="text/css"></style>
        </defs><text x="0" y="17"
            style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
    </svg>
</body>

</html>
