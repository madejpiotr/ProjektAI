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
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="{{route('foodsearch')}}" class="navbar-brand d-flex align-items-center">
                    <strong>FoodSearch</strong>
                </a>
            </div>
            <div class="d-flex flex-row-reverse col-xl">
                    <a class="btn-sm mt-1" href="{{route('basket')}}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                        class="bi bi-basket" viewBox="0 0 16 16">
                        <path
                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
                    </svg></a>
                <ul id="navbar-user" class="navbar-nav mb-2 mb-lg-0 mr-4">
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się... </a>
                </li>
                @else
                <li class="nav-item " list-style-type="none">
                    <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                </li>
                @endif
                </ul>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="h1">Menu</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
            @can('is-admin')
            <a href="{{route('meal.create', ['restaurant' => $restaurant])}}"><button type="button"
                        class="btn btn-sm btn-outline-secondary bg-success">Dodaj danie</button></a>
            @endcan
                <div class="row">
                @forelse ($meal as $m)
                    <div class="col-md-4 mt-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                style="height: 225px; width: 100%; display: block;"
                                src="{{ asset('img/'.$m->img)}}"
                                data-holder-rendered="true">
                            <div class="card-body">
                                <h6 class="card-text">{{ $m->name }}</h6>
                                <p class="card-text">{{ $m->price }}.zł</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <a href="{{route('order.store', ['meal' => $m])}}" class="btn btn-outline-secondary">Dodaj do koszyka</a>
                                    @can('is-admin')
                                    <a href="{{route('meal.edit', ['meal' => $m->id])}}" class="btn  btn-outline-secondary">Edytuj</a>
                                        <a class="btn btn-danger" href="{{route('meal.destroy', ['meal' => $m])}}">Usuń</a>
                                    @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-4 mt-5">
                        <p>Brak dań.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </main>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery-3.2.1.slim.min.js.js')}}"></script>
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