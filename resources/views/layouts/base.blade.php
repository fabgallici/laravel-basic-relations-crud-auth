<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Post</title>
</head>
<body>
    
    <div class="container">
        <div class="row header-login">
          <div class="col-6 d-flex justify-content-around">
            <header>
              @auth
                <h2>{{ Auth::user() -> name }}</h2>  
              @else 
                <h2>GUEST</h2>
              @endauth
            </header>
          </div>
          <div class="col-6 d-flex justify-content-around">
            @auth
              <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-light">Logout</button>
                
              </form>
            @else
              <a href="{{ route('login') }}" type="submit" class="btn btn-light">Login</a>
             
            @endauth
          </div>
        </div>
        @yield('content')

    </div>

</body>
</html>