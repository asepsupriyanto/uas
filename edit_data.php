<?php
    error_reporting(0);
    include "koneksi.php";

    $id_barang = $_GET['id'];
    $proses_edit = $_GET['proses'];
    
    $proses_ambil = mysqli_query($koneksi, "SELECT * FROM sepatu WHERE id = '".$id_barang."'")
                    or die(mysqli_error($koneksi));
    
                    if($proses_edit == 1){
                        $nm_barang = $_POST['nama_barang'];
                        $ukuran = $_POST['ukuran'];
                        $harga = $_POST['harga'];
                        $merk = $_POST['merk'];
                        $jenis = $_POST['jenis'];

                        $proses_edit = mysqli_query($koneksi, "UPDATE sepatu SET nama_sepatu = '$nm_barang', ukuran = '$ukuran', 
                        harga = '$harga', merk = '$merk', jenis = '$jenis' WHERE id = '$id_barang'")
                        or die(mysqli_error($koneksi));

                        if($proses_edit){
                            echo "<script>
                                    alert('Data Berhasil Diupdate');
                                    window.location.href='index.php';
                            </script>";  
                
                        }else echo "<script>
                                        alert('Data Gagal Diupdate');
                                        window.location.href='index.php';
                                        </script>";
                
                    }
?>

