<?php
    $hostname = "localhost";
    $userDataBase = "root";
    $passwordUser = "";
    $databaseName = "uas";
    
    $koneksi = mysqli_connect($hostname,$userDataBase,$passwordUser,$databaseName) or die (mysqli_error($koneksi));


    
    ?>