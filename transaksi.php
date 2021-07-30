<?php
     error_reporting(0);
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login_uas.php");
        exit;
    }

    include "koneksi.php";
    // include "tampilkan_data.php";

    $proses = mysqli_query($koneksi, "SELECT * FROM transaksi") or die (mysqli_error($koneksi));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
        <link href="liblary/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="liblary/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="liblary/assets/styles.css" rel="stylesheet" media="screen">
        <script src="liblary/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Detail Transaksi</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-striped">
						              <thead>
                                      <tr>
						                  <th>ID Transaksi</th>
						                  <th>Nama Sepatu</th>
						                  <th>Ukuran</th>
						                  <th>Harga</th>
                                          <th>Jumlah</th>
                                          <th>Subtotal</th>
                                          <th>Jenis</th>
                                          <th>ID Sepatu</th>
                                          <th>Opsi</th>
						                </tr>
						              </thead>
						              <tbody>
                                            <?php
                                                 $subtotal = 0;
                                                
                                                 while($data = mysqli_fetch_assoc($proses)){
                                                 
                                                 $subtotal = $data['harga'] * $data['jumlah'];

                                                 $total_bayar += $subtotal;
                                            ?>
                                      <tr>
                                          <td><?php echo $data['id'] ?></td>
                                          <td><?php echo $data['nama_sepatu'] ?></td>
                                          <td><?php echo $data['ukuran'] ?></td>
                                          <td>Rp.<?php echo $data['harga'] ?></td>
                                          <td><?php echo $data['jumlah'] ?></td>
                                          <td>Rp.<?php echo $subtotal ?>-,</td>
                                          <td><?php echo $data['merk'] ?></td>
                                          <td><?php echo $data['jenis'] ?></td>
                                          <td>
                                          <a href="hapus_transaksi.php?id=<?php echo $data['id']; ?>">
                                          <button class="btn btn-danger">Hapus</button></a>
                                         
                                          </td>
                                          
                                        </tr>
                                        
                                        <?php
                                                 }
                                                 ?>
                                        
                                                <tr>
                                                <td colspan="8"><b>Total Bayar</b></td>
										        <td><b> <?php echo $total_bayar ?>-,</b></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td colspan="9" style="text-align: center;"> <a href="cetak.php" target="_blank"> <i class="icon-print"></i><b> Cetak Kuitansi</b></a></td>
                                                </tr>
                                                
                                            
                                
                                        
                                       
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
    </div>
</body>
</html>