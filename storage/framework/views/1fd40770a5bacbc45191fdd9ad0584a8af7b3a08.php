<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Siaga Merapi</title>
<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <!-- Fonts -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('depan/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('depan/css/style.css')); ?>" rel="stylesheet">
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        -->
        <!-- Styles
         html, body {
                background-image: url('https://dhallywoodworld.files.wordpress.com/2014/12/background-light-web-opera-blue-simple.jpg');
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
         -->
      <style>
            html, body {
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            input {
                width: 25%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                border-bottom: 2px solid blue;
}
            .formdaftar{
                size: 40;

            }
            .navbar-brand{
              font-size: 17px;
              font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
            .subjudul{
              font-size: 23px;
              font-color: black;
              font-family: Verdana, Geneva, sans-serif;
            }
            .isi{
              font-size: 17px;
              font-color: black;
              font-family: Verdana, Geneva, sans-serif;
            }
            .status{
               font-size: 21px;
              color: #4e5656;
              font-family: Verdana, Geneva, sans-serif;
            }
            th{
               font-size: 18px;
              font-color: black;
              font-family: Verdana, Geneva, sans-serif;
            }
            td{
              font-size: 17px;
              color:#010065;
              font-family: Verdana, Geneva, sans-serif;
            }
        </style> 


    </head>
    <body id="page-top">
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Siaga Merapi
                </div>
            </div>
        </div>
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#home"><img src="<?php echo e(asset('depan/img/logo2.png')); ?>" width="150" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="navbar-brand" class="nav-link js-scroll-trigger" href="#status">Status</a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" class="nav-link js-scroll-trigger" href="#prevensi">Prevensi</a>
            </li>
            <li class="nav-item">
             <?php if(Route::has('login')): ?>
                
                    <?php if(auth()->guard()->check()): ?>
                        <a  class="navbar-brand"  href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a  class="navbar-brand"  href="<?php echo e(route('login')); ?>">Login</a>
                    <?php endif; ?>
                
            <?php endif; ?>
             <!-- <a class="nav-link js-scroll-trigger" href="#login">Login</a> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="coverpage" id="home">
        <div id="cover" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="fill" src="<?php echo e(asset('depan/img/1.jpg')); ?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="fill" src="<?php echo e(asset('depan/img/2.jpg')); ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="fill" src="<?php echo e(asset('depan/img/3.jpg')); ?>" alt="Third slide">
            </div>
          </div>
        </div>
    </header>

    <section id="status">
      <div class="container">
        <div class="row">
          <div  class="col-md-6 mx-auto" align="center">
            <h2 class="subjudul">Status Saat Ini: </h2>
            <hr>
            <h3 class="status"><?php echo e($data->status); ?></h3>
            <p  class="isi"><i>*Berdasarkan pengamatan pada <?php echo e($data->tgl); ?></i></p>
          </div>
          <div class="col-md-6 mx-auto" align="center">
            <h2 class="subjudul">Rincian Status: </h2>
            <hr>
            <table  class="table table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th>Parameter</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</th>
                  <td>Intensitas Gas </td>
                  <td><?php echo e($data->intensitas_gas); ?> Tons</td>
                </tr>
                <tr>
                  <td>2</th>
                  <td>Suhu</td>
                  <td><?php echo e($data->suhu); ?>&#8451</td>
                </tr>
                <tr>
                  <td>3</th>
                  <td>Intensitas Gempa</td>
                  <td><?php echo e($data->seismik); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <section id="prevensi">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto" align="center">
            <h2 class="subjudul">Tindakan yang Perlu Dilakukan:</h2>
            <hr class="light">
          </div>
        </div>
         <?php if($data->status=="Awas"): ?>
        <div class="row row-centered">
          <div class="col-md-4 col-centered mx-auto" align="center">
            <h3 class="isi">Santai</h3>
          </div>
        <div class="col-md-4 col-centered mx-auto" align="center">
            <h3 class="isi">Santai</h3>
          </div>
        <div class="col-md-4 col-centered mx-auto" align="center">
            <h3 class="isi">OK</h3>
          </div>
        </div> 
        <?php endif; ?>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto" align="center">
            <h2 class="subjudul">Daftarkan Email Anda</h2>
             <hr>
              <div class="isi" id="register" align="right">
                <form>
                  Nama :<input type="text" name="nama" class="form" placeholder="Nama" ><br>
                  Email :<input type="email" name="email" class="form" placeholder="Masukan Email"><br>
                  <input type="submit" class="btn btn-primary" value="Daftar">
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Team 7</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('depan/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('depan/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo e(asset('depan/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="<?php echo e(asset('depan/js/script.js')); ?>"></script>


    </body>
</html>
