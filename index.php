<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login_uas.php");
    exit;
}
    include "koneksi.php";
    include "tampilkan_data.php";
    include "edit_data.php";
    include "proses_transaksi.php";

    //variabel untuk mengambil data dari edit_data
    $data_edit = mysqli_fetch_assoc($proses_ambil);

    if( isset($_POST["bayar"])){
        if ( pembayaran($_POST) > 0 ){
            echo "<script>
                    alert('data transaksi baru berhasil ditambahkan!');
                    window.location.href='transaksi.php';

                    </script>";
        } else {
            echo mysqli_error($koneksi);
            
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

        <link href="liblary/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="liblary/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="liblary/assets/styles.css" rel="stylesheet" media="screen">
        <link href="liblary/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">

        <script src="liblary/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>">

</head>
<body>
    
<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Asep Supriyanto<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="#">Tools <i class="icon-arrow-right"></i>

                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li>
                                                <a href="#">Reports</a>
                                            </li>
                                            <li>
                                                <a href="#">Logs</a>
                                            </li>
                                            <li>
                                                <a href="#">Errors</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">SEO Settings</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Link</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Blog</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">News</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Custom Pages</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Calendar</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="#">FAQ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">User List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Search</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Permissions</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>

        
        <div class="container-fluid">
            <div class="row-fluid">
            <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.html"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="calendar.html"><i class="icon-chevron-right"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="stats.html"><i class="icon-chevron-right"></i> Statistics (Charts)</a>
                        </li>
                        <li>
                            <a href="form.html"><i class="icon-chevron-right"></i> Forms</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="icon-chevron-right"></i> Tables</a>
                        </li>
                        <li>
                            <a href="buttons.html"><i class="icon-chevron-right"></i> Buttons & Icons</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            
        </div>
         
    <div class="container">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Input Data</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

                                    <?php
                                    if($_GET['id'] !=""){
                                        //proses edit data
                                    ?>
                                        <form class="form-horizontal" action="edit_data.php?id=<?php echo $data_edit['id'] ?>&proses=1" method="POST">
                                    <?php
                                    }else{
                                    ?>
                                        <form class="form-horizontal" action="proses_simpan.php" method="POST">

                                    <?php
                                    }
                                    ?>
                                    
                                      <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="nama_barang">Nama Sepatu</label>
                                          <div class="controls">
                                          <input type="hidden" class="input-xlarge focused" id="nama_barang" value="<?php if($data_edit['id'] != "") 
                                                echo $data_edit['id']; ?>" name="nama_barang">
                                        
                                                
                                              <input type="text" class="input-xlarge focused" id="nama_barang" value="<?php if($data_edit['nama_sepatu'] != "") 
                                                echo $data_edit['nama_sepatu']; ?>" name="nama_barang" required>
                                          </div>
                                        </div>
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="ukuran">Ukuran</label>
                                          <div class="controls">
                                              <input type="text" class="input-xlarge focused" id="ukuran" value="<?php if($data_edit['ukuran'] != "") 
                                                echo $data_edit['ukuran']; ?>" name="ukuran" required>
                                          </div>
                                        </div>
                                        

                                        <div class="control-group">
                                          <label class="control-label" for="harga">Harga</label>
                                          <div class="controls">
                                              <input type="text" class="input-xlarge focused" id="harga" value="<?php if($data_edit['harga'] != "") 
                                                echo $data_edit['harga']; ?>" name="harga" required>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="jumlah">Jumlah</label>
                                          <div class="controls">
                                              <input type="text" class="input-xlarge focused" id="jumlah" value="<?php if($data_edit['jumlah'] != "") 
                                                echo $data_edit['jumlah']; ?>" name="jumlah" required>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="merk">Merk</label>
                                            <div class="controls">
                                                <select class="input-xlarge focused" name="merk" id="merk" value="<?php if($data_edit['merk'] != "") 
                                                echo $data_edit['merk']; ?>" required>
                                                    <option value="">Pilih...</option>
                                                    <option value="Ortus">Ortuseight</option>
                                                    <option value="Specs">Specs</option>
                                                    <option value="Mizuno">Mizuno</option>
                                                    <option value="Nike">Nike</option>
                                                    <option value="Adidas">Adidas</option>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <div class="control-group">
                                            <label class="control-label" for="jenis">Jenis</label>
                                            <div class="controls">
                                                <select class="input-xlarge focused" name="jenis" id="jenis" value="<?php if($data_edit['jenis'] != "") 
                                                echo $data_edit['jenis']; ?>" required>
                                                    <option value="">Pilih...</option>
                                                    <option value="Running">Running</option>
                                                    <option value="Sepakbola">Sepakbola</option>
                                                    <option value="Futsal">Futsal</option>
                                                    <option value="Voli">Voli</option>
                                                    <option value="Basket">Basket</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Kirim Data</button>
                                          <button type="reset" class="btn btn-danger">Cancel</button>
                                        </div>
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="container">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Tabel</div>
                            </div>
                
                            <div class="block-content collapse in">
                                <div class="span12">
                                <legend align="center">Tabel Sepatu</legend>
  									<table class="table table-bordered table-striped">
						              <thead>
						                <tr>
						                  <th>ID Barang</th>
						                  <th>Nama Sepatu</th>
						                  <!-- <th>Ukuran</th> -->
						                  <!-- <th>Harga</th> -->
                                          <!-- <th>Jumlah</th> -->
                                          <th>Subtotal</th>
                                          <!-- <th>Merk</th> -->
                                          <!-- <th>Jenis</th> -->
                                          <th>Transaksi</th>
                                          
						                </tr>
						              </thead>
						              <tbody>
                                          <?php
                                                $subtotal = 0;

                                                //untuk menampilkan data
                                                while($data = mysqli_fetch_assoc($proses)){
                                                
                                                //perhitungan untuk menghitung subtotal
                                                $subtotal = $data['harga'] * $data['jumlah'];

                                    
                                            ?>
						                <tr>
						                  <td><?php echo $data['id'] ?></td>
                                          <td><?php echo $data['nama_sepatu'] ?></td>
                                          <!-- <td><?php echo $data['ukuran'] ?></td> -->
                                          <!-- <td>Rp.<?php echo $data['harga'] ?></td> -->
                                          <!-- <td><?php echo $data['jumlah'] ?></td> -->
                                          <td>Rp.<?php echo $subtotal ?></td>
                                          <!-- <td><?php echo $data['merk'] ?></td> -->
                                          <!-- <td><?php echo $data['jenis'] ?></td> -->
                                          <td>
        
                                        
                                        <form action="" method="POST">
                                                <button class="btn btn-warning" type="submit" name="bayar">Bayar</button>
                                                    <input type="hidden" class="input-xlarge focused" id="nama_barang" value="<?php if($data['nama_sepatu'] != "") 
                                                        echo $data['nama_sepatu']; ?>" name="nama_barang">   

                                                        <input type="hidden" class="input-xlarge focused" id="ukuran" value="<?php if($data['ukuran'] != "") 
                                                        echo $data['ukuran']; ?>" name="ukuran">  

                                                        <input type="hidden" class="input-xlarge focused" id="harga" value="<?php if($data['harga'] != "") 
                                                         echo $data['harga']; ?>" name="harga">  

                                                        <input type="hidden" class="input-xlarge focused" id="jumlah" value="<?php if($data['jumlah'] != "") 
                                                           echo $data['jumlah']; ?>" name="jumlah">  

                                                        <input type="hidden" class="input-xlarge focused" id="merk" value="<?php if($data['merk'] != "") 
                                                         echo $data['jenis']; ?>" name="merk"> 
                                                                                    
                                                        <input type="hidden" class="input-xlarge focused" id="jenis" value="<?php if($data['jenis'] != "") 
                                                        echo $data['id']; ?>" name="jenis">  

                                                        <input type="hidden" class="input-xlarge focused" id="sub_total" value="<?php if($subtotal != "") 
                                                        echo $subtotal; ?>" name="sub_total" >      
    
                                            </form>
                                        </td>
                                            <td>
                                                <a href="index.php?id=<?php echo $data['id']; ?>">
                                                <button class="btn btn-success">Edit</button></a> 
                                                    <a href="hapus_data.php?id=<?php echo $data['id']; ?>">
                                                        <button class="btn btn-danger">Hapus</button></a>
                                            </td>
                                                
                                         
						                </tr>

                                        <?php
                                                }
                                        ?>
			
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                </div>

                <script src="liblary/vendors/jquery-1.9.1.min.js"></script>
                <script src="liblary/bootstrap/js/bootstrap.min.js"></script>
                <script src="liblary/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
                <script src="liblary/assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
             </body>
        </html>