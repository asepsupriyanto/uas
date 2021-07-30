<?php
    function pembayaran($data){
        global $koneksi;
        // echo json_encode($data) ; die;
    //mengambil data inputan
    $nama_sepatu = $data['nama_barang'];
    $ukuran_sepatu = $data['ukuran'];
    $harga = $data['harga'];
    $jumlah = $data['jumlah'];
    $merk = $data['merk'];
    $jenis = $data['jenis'];
    $sub_total = $data['sub_total'];

    mysqli_query($koneksi,"INSERT INTO transaksi (nama_sepatu, ukuran, harga, jumlah, sub_total, merk, jenis) VALUES ('$nama_sepatu', '$ukuran_sepatu', '$harga', '$jumlah', '$sub_total', '$merk', '$jenis')")
    or die (mysqli_error($koneksi));

    return 1;



    }


?>