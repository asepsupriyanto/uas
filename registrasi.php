<?php
    require 'proses_registrasi.php';
    require 'koneksi.php';

    //untuk pengaturan kondisi klik pada register
    if( isset($_POST["register"])){
        if ( registrasi($_POST) > 0 ){
            echo "<script>
                    alert('user baru berhasil ditambahkan!');
                    </script>";
        } else {
            echo mysqli_error($koneksi);
        }
    }

    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman registrasi</title>
    <!-- Bootstrap -->
    <link href="liblary/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="liblary/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="liblary/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="liblary/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Silakan registrasi</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username" id="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password" id="password">
        <input type="password" class="input-block-level" placeholder="Konfirmasi password" name="password2" id="password2">
        <button class="btn btn-success btn-large" type="submit" name="register">Register!</button>
        
        <div class="text-left forget">
            <h5>Back To <a href="login_uas.php">Login</a></h5>
        </div>
      </form>
      

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>