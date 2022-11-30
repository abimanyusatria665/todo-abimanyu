<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="login.css" />
  </head>
  <body class="bg-2">
    <div class="container-fluid">
                @if(Session::get('success'))
              <div class="alert alert-success col-10 offset-1" role="alert">
                 {{ Session::get('success') }}
              </div>    
          @endif
          @if(Session::get('fail'))
              <div class="alert alert-danger col-10 offset-1" role="alert">
                 {{ Session::get('LoginError') }}
              </div>    
          @endif
          @if(Session::has('notAllowed'))
              <div class="alert alert-danger col-10 offset-1">
                {{ Session::get('notAllowed') }}
         <    /div>
          @endif
      @if(Session::has('fail'))
         <div class="alert alert-danger col-10 offset-1">
            {{ Session::get('fail') }}
         </div>
      @endif
      <div class="container">

        <div class="col-10 bg-5 rounded-4 offset-1 _shadow_box _center">

          <div class="d-flex flex-wrap">
            @yield('content')
            </div>
         </div>
        </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.lg-2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>