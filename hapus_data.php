<?php
    include "koneksi.php";

    //parameter untuk menerima hapus dari index
    $id_barang = $_GET['id'];
    
    //menghapus data dari db sepatu
    $proses = mysqli_query($koneksi, "DELETE FROM sepatu WHERE id = $id_barang") 
                    or die(mysqli_error($koneksi));
        
            if($proses){
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='index.php';
            </script>";  

        }else echo "<script>
                        alert('Data Gagal Dihapus');
                        window.location.href='index.php';
                        </script>";

?>