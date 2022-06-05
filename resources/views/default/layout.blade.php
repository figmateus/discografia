<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discografia</title>
    <link rel="stylesheet" href="{{asset('web/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('web/style.css')}}">
  </head>
  <body>
  
    <section id="main" class="d-flex justify-content-center">
      <div id="container" class="container">
        <div id="head" class="d-flex justify-content-between align-items-center">
          <div class="logo"><a href="/discografia"><img src="{{asset('images/logo.png')}}" alt="logo"></a></div>
          <h1>Discografia</h1>
        </div>
        <div id="cont" class="container" >
          @yield('content')
        
        </div>
      </div>
    </section>
    <footer>

    </footer>
    
  </body>
  <script src="{{asset('web/jquery.js')}}"></script>
  <script src="{{asset('web/jquery.mask.min.js')}}">
  <script src="{{asset('web/bootstrap.js')}}"></script>
</html>
