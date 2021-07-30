<?php
    include "koneksi.php";

    //mengambil data inputan
    $nama_sepatu = $_POST['nama_barang'];
    $ukuran_sepatu = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];

    //untuk menyimpan ke dalam db
    $proses = mysqli_query($koneksi,"INSERT INTO sepatu (nama_sepatu, ukuran, harga, jumlah, merk, jenis) VALUES ('$nama_sepatu', '$ukuran_sepatu', '$harga', '$jumlah', '$merk', '$jenis')")
    or die (mysqli_error($koneksi));

    if($proses){
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='index.php';
        </script>";  

    }else echo "<script>
                    alert('Data Gagal Disimpan');
                    window.location.href='index.php';
                 </script>";
?>