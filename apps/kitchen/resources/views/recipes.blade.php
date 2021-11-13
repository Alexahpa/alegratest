<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alegra Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="padding: 25px 50px 75px 100px;">
        <div class="row justify-content-md-center">
            <div class="col">
                <h2 class="display-2">Alegra Restaurant</h2>
            </div>
        </div>
    </div>

    @include('navbar', ['tab' => 'recipes'])

    <div class="container">

        <div class="row">
            <div class="col">

                <h4>Recetas Disponibles</h4>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">


                        @foreach ($recipes as $recipe)
                            <li class="list-group-item">
                                <label> {{ $recipe->name }}</label>
                                @foreach ($recipe->ingredients as $ingredient)
                                    <ul>
                                        <li> {{ $ingredient->pivot->quantity }}  {{ $ingredient->name }}
                                        </li>
                                    </ul>


                                @endforeach

                            </li>

                        @endforeach


                    </ul>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
