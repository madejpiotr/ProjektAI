<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoodSearch</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            <h1 class="h1">Koszyk</h1>
        </div>
    </section>

    <div id="cennik" class="container mt-5 mb-5">
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Restauracja</th>
                    <th scope="col">Ilość</th>
                    <th scope="col">Cena</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php
                $id = 0;
                @endphp
                @foreach($informations as $info)
                    @php
                    $id++;
                    @endphp
                    <tr>
                        <td>{{ $id }}</td>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->restaurant }}</td>
                        <td>{{ $info->count }}</td>
                        <td>{{ $info->getTotalPrice()."zł" }}</td>
                        <td><a class="btn btn-sm btn-danger" href="{{route('order.destroy', ['order' => $info->id])}}">Usuń</a>
                    </tr>
                @endforeach
                <tr> 
                    <th>Suma: {{$total}}zł</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></tr>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clear-order') }}" method="POST">
            @csrf
            <div class="mt-2 mb-3">
                <label for="first_name">Imię</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Imię">
            </div>
            <div class="mt-2 mb-3">
                <label for="last_name">Nazwisko</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Nazwisko">
            </div>
            <div class="mt-2 mb-3">
                <label for="email">Adres email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
            </div>
            <div class="mt-2 mb-3">
                <label for="address">Adres dostawy</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Adres">
            </div>
            <div class="mb-3">
                <label for="payment_method">Rodzaj płatności</label>
                <select class="form-select" id="payment_method" name="payment_method">
                    <option value="online">Płatność online</option>
                    <option value="cash">Gotówką/kartą przy odbiorze</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="comment">Komentarz</label>
                <textarea class="form-control" id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Zapłać</button>
            </div>
        </form>
    </div>

</main>

</body>

</html>
