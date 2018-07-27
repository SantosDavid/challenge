<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <br>
    
    <div class="row">
        <div class="col-6 offset-3">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>