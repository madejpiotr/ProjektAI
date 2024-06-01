<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
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
            <div class="d-flex ml-auto align-items-center">
                <ul id="navbar-user" class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się... </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                        </li>
                    @endif
                </ul>
                <a class="btn-sm mt-1" href="{{route('basket')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="h1">Utwórz restauracje</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <form method="POST" action="{{ route('restaurant.store') }}" class="needs-validation" novalidate>
                @csrf
                <div class="mt-2 mb-3 mr-5 ml-5">
                    <label for="exampleFormControlInput1">Nazwa</label>
                    <input id="name" name="name" type="text" class="form-control @if ($errors->first('name')) is-invalid @endif"
                     value="{{ old('name') }}" 
                        placeholder="Nazwa">
                    <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                </div>
                <div class="mt-2 mb-3 mr-5 ml-5">
                    <label for="exampleFormControlInput1">Adres</label>
                    <input id="address" name="address" type="text" class="form-control @if ($errors->first('address')) is-invalid @endif"
                     value="{{ old('address') }}" 
                        placeholder="Adres">
                    <div class="invalid-feedback">Nieprawidłowy adres!</div>
                </div>
                <div class="mt-2 mb-3 mr-5 ml-5">
                    <label for="exampleFormControlInput1">Ocena</label>
                    <input id="stars" name="stars" type="number" class="form-control @if ($errors->first('stars')) is-invalid @endif"
                     value="{{ old('stars') }}" 
                        placeholder="Ocena">
                    <div class="invalid-feedback">Nieprawidłowa ocena!</div>
                </div>
                <div class="mt-2 mb-3 mr-5 ml-5">
                    <label for="exampleFormControlInput1">Srednia cena</label>
                    <input id="price" name="price" type="number" class="form-control @if ($errors->first('price')) is-invalid @endif"
                     value="{{ old('price') }}" 
                        placeholder="Srednia cena">
                    <div class="invalid-feedback">Nieprawidłowa cena!</div>
                </div>  
                <div class="mt-2 mb-3 mr-5 ml-5">
                    <label for="exampleFormControlInput1">Sciezka obrazu</label>
                    <input id="img" name="img" type="text" class="form-control @if ($errors->first('img')) is-invalid @endif"
                     value="{{ old('img') }}" 
                        placeholder="Sciezka">
                    <div class="invalid-feedback">Nieprawidłowa ścieżka!</div>
                </div>      
                <div class="mt-2 mb-3 mr-5 ml-5">
                    <label for="exampleFormControlTextarea1">Opis</label>
                    <textarea id="description" name="description" class="form-control @if ($errors->first('description')) is-invalid @endif"
                     value="{{ old('description') }}" rows="3"></textarea>
                    <div class="invalid-feedback">Nieprawidłowy opis!</div>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <input type="submit"class="btn btn-primary" value="Zapisz">
                </div>
             </form>
          </div>
        </div>

    </main>

</body>

</html>