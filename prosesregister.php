<?php
include "config/classDB.php";
if(isset($_POST['register'])){
    extract($_POST);
    $pass = password_hash($password,PASSWORD_DEFAULT);
    $ins = $dbo->insert("pelanggan","null,'$nama_pelanggan','$alamat','$no_hp','$username','$pass','1'");
    if($ins){
        ?>
        <script>
            alert('register berhasil!! Silakan login');
            location.href='login.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('register gagal!! Periksa data anda');
            location.href='register.php';
        </script>
        <?php
    }
}
?>