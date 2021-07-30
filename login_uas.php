<?php
session_start();

if( isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}

require 'koneksi.php';
  //kondisi ketika tombol login di klik
    if( isset($_POST["login"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
        
        //cek username
        if( mysqli_num_rows($result) === 1 ) {

            //cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                
                //set session
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
   
   
    }


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman log in</title>
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
    <?php if( isset($error) ) : ?>
      <!-- <div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						<strong>Username/Password anda salah</strong> 
			</div> -->
      <div class="alert alert-error alert-block">
										<a class="close" data-dismiss="alert" href="#">&times;</a>
										<h4 class="alert-heading">Error!</h4>
      Username/Password anda salah!
                  </div>
    <?php endif; ?>

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Silakan log in</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username" id="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password" id="password">
        <button class="btn btn-large btn-primary" type="submit" name="login">Log in</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>