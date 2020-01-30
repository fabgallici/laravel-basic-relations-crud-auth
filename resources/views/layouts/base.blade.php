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
          <div class="col-4 d-flex justify-content-center">
            @auth
              <h2>{{ Auth::user() -> name }}</h2>  
            @else 
              <h2>GUEST</h2>
            @endauth
          </div>
          <div class="col-4 d-flex justify-content-center">
            @auth
              <form action="{{ route('user.image.set') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="file" name="image"><br>
                <input type="submit" name="" value="SAVE IMAGE">
              </form>

            @endauth      
          </div>
          <div class="col-4 d-flex justify-content-center">
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
        <div class="row">
          <div class="col-4">
            @auth
              @if(Auth::user() -> image)
                <img class="picture_profile" src="{{ asset('images/' . Auth::user() -> image) }}">
              @endif
            @endauth
          </div>
        </div>
        @yield('content')

    </div>

</body>
</html>