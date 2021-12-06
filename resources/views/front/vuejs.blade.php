<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue.js API</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <button class="ciccio">

                <a href="{{ route('admin.users.index') }}">Home</a>

            </button>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div id="app">
        
    </div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>