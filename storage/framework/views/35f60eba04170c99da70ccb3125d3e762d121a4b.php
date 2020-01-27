<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title> Siaga Merapi </title> <!--<?php echo e(config('app.name', 'FullCash')); ?>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <?php echo $__env->yieldContent('css'); ?>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .bg{
             background-image: url('https://dhallywoodworld.files.wordpress.com/2014/12/background-light-web-opera-blue-simple.jpg');
          }
        .footer{
            background-color: #fff;
        }
    </style>
            <link rel="stylesheet"  href="<?php echo e(asset('css/bootstrap.min.css')); ?>" >
        <link rel="stylesheet"  href="<?php echo e(asset('css/plugins.css')); ?>" >
        <link rel="stylesheet"  href="<?php echo e(asset('css/main.css')); ?>" >
        <link rel="stylesheet"  href="<?php echo e(asset('css/select2.min.css')); ?>" >
        <link rel="stylesheet"  href="<?php echo e(asset('css/themes.css')); ?>" >
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/sweetalert.css')); ?>">
        <script src="<?php echo e(asset('dist/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/vendor/modernizr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/Chart.bundle.min.js')); ?>" ></script>
        <script src="<?php echo e(asset('js/utils.js')); ?>" ></script>
        <script src="<?php echo e(asset('js/FileSaver.min.js')); ?>" ></script>
        <script src="<?php echo e(asset('js/canvas-toBlob.js')); ?>" ></script>
</head>
<body class="bg">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                       <font size="5" color="blue">Siaga Merapi</font><!-- <?php echo e(config('app.name', 'FullCash')); ?> -->
                    </a>
                   
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>                                            <!-- Register -->        <!--  <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->
                        <?php else: ?>

                    <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">Home |</a>
                    <a class="navbar-brand" href="<?php echo e(url('/user')); ?>">Admin |</a>
                    <a class="navbar-brand" href="<?php echo e(url('/record')); ?>">Rekaman </a>     

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

<!--<div class="container" >
  <div class="row">
  <hr>
    <div class="col-lg-12">
      <div class="col-md-8">
        <a href="#">Terms of Service</a> | <a href="#">Privacy</a>    
      </div>
      <div class="col-md-4">
        <p class="muted pull-right">© 2017 itb. All rights reserved</p>
      </div>
    </div>
  </div>
</div> -->

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>;
    <script src="<?php echo e(asset('js/vendor/jquery.min.js')); ?>" ></script>
<script src="<?php echo e(asset('js/vendor/bootstrap.min.js')); ?>" ></script>
<script src="<?php echo e(asset('js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>" ></script>
<script type="text/javascript">
$('.select2-multi').select2();
</script>
</body>
</html>
