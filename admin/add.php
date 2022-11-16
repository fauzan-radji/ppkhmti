<?php
include "../koneksi.php";

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // check duplicate email
    // e for email
    if($e = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'"))) {
        var_dump($e);
        die;
    }

    // $sql = "INSERT INTO user (nama, email, password) VALUES('$nama', '$email', '$password')";
    // $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     $_SESSION['flashSucc'] = "Data berhasil dimasukkan";
    // }else{
    //     $_SESSION['flashErr'] = "Data tidak berhasil dimasukkan";
    // }

    // header('Location: ../index.php?page=Admins');
}
?>