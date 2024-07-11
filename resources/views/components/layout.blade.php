<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>{{$title}}</title>
</head>

<body>
    <div class="container">
    <div class="navegacao">
    <p>nome:{{Auth::user()->name}}</p>
    <p>id:{{Auth::user()->id}}</p>
    </div>
        <div class="navegacao">

        <x-sair>

        </x-sair>
        </div>
        <h1>{{$title}}</h1>
        {{$slot}}
    </div>
<script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>