<?php
include "../koneksi.php";

if(isset($_POST['submit'])){
    include '../utils.php';

    // insert into
    $foto = uploadFile($_FILES['foto'], '../index.php?page=Teams');
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];

    $sql = "INSERT INTO tim (nama, jabatan, twitter, facebook, instagram, linkedin, foto) VALUES('$nama', '$jabatan', '$twitter', '$facebook', '$instagram', '$linkedin', '$foto')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['flashSucc'] = "Data berhasil dimasukkan";
    }else{
        $_SESSION['flashErr'] = "Data tidak berhasil dimasukkan";
    }

    header('Location: ../index.php?page=Teams');
}
?>