<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('images/logo_green.png')}}" type="image/x-icon">
</head>
<body>

    <div class="logins d-flex justify-content-end px-3">
    @if (Route::has('login'))
        <div class="top-right links">
            
            @auth
                <a href="{{ route('admin.users.index') }}">Home</a>
            @else
                <span>Sei un ristoratore?</span>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif
    </div>

    <div id="app">
        
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>