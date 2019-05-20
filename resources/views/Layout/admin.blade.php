<?php
session_start();
if(isset($_SESSION['nombre']) && isset($_SESSION['apepat']) && isset($_SESSION['apemat']) && isset($_SESSION['perfil'])){
 $nombre = $_SESSION['nombre'] . ' ' . $_SESSION['apepat'] . ' ' . $_SESSION['apemat'];
 $perfil = $_SESSION['perfil'];
}else{
 $nombre = "vacio";
}
?>
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="/assets/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Generated: 2019-04-04 16:57:42 +0200 -->
    <title> </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="/assets/css/dashboard.css" rel="stylesheet" />
    <script src="/assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="/assets/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="/assets/plugins/datatables/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="#">
                <img src="/assets/logo_seplan.png" class="header-brand-img">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                  
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(/assets/demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $nombre; ?></span>
                      <small class="text-muted d-block mt-1"><?php echo $perfil; ?></small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{ Route('login.borrar') }}">
                      <i class="dropdown-icon fe fe-log-out"></i> Cerrar sesión
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
         @yield('menubar')        
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                
              </h1>
            </div>
            @yield('contenido')
          </div>           
          <script>
            require(['jquery'], function () {
            	$(document).ready(function () {
            
            		function setCookie(name,value,days) {
            			var expires = "";
            			if (days) {
            				var date = new Date();
            				date.setTime(date.getTime() + (days*24*60*60*1000));
            				expires = "; expires=" + date.toUTCString();
            			}
            			document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            		}
            
            		function getCookie(name) {
            			var nameEQ = name + "=";
            			var ca = document.cookie.split(';');
            			for(var i=0;i < ca.length;i++) {
            				var c = ca[i];
            				while (c.charAt(0)==' ') c = c.substring(1,c.length);
            				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            			}
            			return null;
            		}
            
            		if (!getCookie('bottombar-hidden')) {
            			$('.js-bottombar').show();
            		}
            
            		$('.js-bottombar-close').on('click', function (e) {
            			$('.js-bottombar').hide();
            			setCookie('bottombar-hidden', 1, 7);
            
            			e.preventDefault();
            			return false;
            		});
            	});
            });
          </script>
        </div>
      </div>
      
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">

                  </ul>
                </div>
                <div class="col-auto">
                  
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Elaborado por la <a href="" target="_blank">SECRETARIA TECNICA DE PLANEACION Y EVALUACION</a> en colaboración con la <a href="" target="_blank">UNIVERSIDAD TECNOLOGICA METREPOLITANA</a>.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>