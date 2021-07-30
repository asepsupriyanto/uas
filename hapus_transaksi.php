<?php
    include "koneksi.php";

    //parameter untuk menerima hapus dari index
    $id_transaksi = $_GET['id'];
    
    //menghapus data dari db sepatu
    $proses = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id = $id_transaksi") 
                    or die(mysqli_error($koneksi));
        
            if($proses){
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='transaksi.php';
            </script>";  

        }else echo "<script>
                        alert('Data Gagal Dihapus');
                        window.location.href='transaksi.php';
                        </script>";

?>