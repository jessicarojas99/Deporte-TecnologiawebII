<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css"/>
    <script src="/js/app.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>@yield('title','Deporte')</title>
</head>

    <body>
        <div class="d-flex flex-column h-screen justify-content-between" style="height: 100vh">
            <header>
                @include('nav')
                {{--  //mostrar el mensaje de sesion    --}}
                @include('estado') 
            </header>
            <main>
                @yield('content')
            </main>   
              <footer class="bg-dark text-center shadow ">
                @include('footer')
              </footer>
        </div>
    </body>
 
</html>