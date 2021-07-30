<?php
function registrasi($data){
    global $koneksi;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);


    //cek username udah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username FROM user
    WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar');
                </script>";
        return false;
    }


    //cek konfirmasi password
    if ( $password !== $password2 ) { 
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;

        }
        // return 1;

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        //
        mysqli_query($koneksi, "INSERT INTO user(username, password) VALUES('$username', '$password')");

        return mysqli_affected_rows($koneksi);   

        
    
    }      

?>