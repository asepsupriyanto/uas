<?php
    include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
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
                            <div class="muted pull-left">Striped Table</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table border="1" class="table table-striped">
                                <thead>
                                 <tr>
                                    
                                        <th>No</th>
                                        <th>ID Transaksi</th>
                                        <th>ID Sepatu</th>
                                        <th>Nama Sepatu</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                        $no = 1;
                                        $proses = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                        while($data = mysqli_fetch_assoc($proses)){
                                            $subtotal = $data['harga'] * $data['jumlah'];

                                            
                                        
                                   ?>
                                   <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $data['id'] ?></td>
                                          <td><?php echo $data['jenis'] ?></td>
                                          <td><?php echo $data['nama_sepatu'] ?></td>
                                          <td>Rp.<?php echo $data['harga'] ?></td>
                                          <td><?php echo $data['jumlah'] ?></td>
                                          <td>Rp.<?php echo $subtotal ?>-,</td>
                                          <td><?php echo $data['merk'] ?></td>
                                          
                                   </tr>
                                   <?php
                                        }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /block -->
            </div>
        </div>
        <script>
            window.print();
        </script>
</body>
</html>