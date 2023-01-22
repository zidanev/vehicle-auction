<?php 

include "koneksi.php";

$nama       = $_POST['name'];
$nope       = $_POST['hp'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$password   = $_POST['password'];
$password2  = $_POST['password2'];

if($password == $password2)
{
    $fpassword = password_hash($password, PASSWORD_DEFAULT);
    $insert =  mysqli_query($koneksi,
    "
        INSERT INTO admin (nama,email,password,nope,alamat,role) VALUES (
            '$nama','$email','$fpassword','$nope','$alamat','member'
        ) 
    ");

    if($insert) {
        header('location:../web/main.php?page=login');
    } else {
        mysqli_error($koneksi);
    }
} 
else 
{
    header('location:../web/main.php?page=login&&message=failregis');
}

?>