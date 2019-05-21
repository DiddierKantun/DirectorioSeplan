<html lang="en" dir="ltr"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
    <!-- Generated: 2019-04-04 16:57:42 +0200 -->
    <title>Login - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet">
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet">
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet">
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="./assets/plugins/datatables/plugin.js"></script>
  <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="jquery" src="./assets/js/vendors/jquery-3.2.1.min.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="bootstrap" src="./assets/js/vendors/bootstrap.bundle.min.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="core" src="./assets/js/core.js"></script></head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="/assets/demo/brand/tabler.svg" class="h-6" alt="">
              </div>
              <form class="card" action="{{ route('login.index') }}" method="POST">
              {{ csrf_field() }}
                <div class="card-body p-6">

                  @if(Session::has('message'))
                  <div class="alert alert-danger">{{ Session::get('message') }}</div>
                  @endif

                  <div class="card-title">Directorio Web Seplan</div>
                  <div class="form-group">
                    <label class="form-label">Correo electronico</label>
                    <input name="correo" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar correo electronico">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Contraseña
                      
                    </label>
                    <input name="contra" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresar contraseña">
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input">
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</body></html>