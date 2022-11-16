<?php
function uploadFile($file, $redirect) {
    // upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $target_file = $target_dir . uniqid(rand()) . '.' . $imageFileType;
    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if(!$check) {
        $_SESSION['flashErr'] = "File yang diupload bukan gambar.";
        header("Location: $redirect");
    }

    // Allow certain file formats
    if(
        $imageFileType !== "jpg" &&
        $imageFileType !== "png" &&
        $imageFileType !== "jpeg" &&
        $imageFileType !== "gif"
    ) {
        $_SESSION['flashErr'] = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        header("Location: $redirect");
    }

    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        $_SESSION['flashErr'] = "Maaf, terdapat error saat mengupload file.";
        die;
        header("Location: $redirect");
    }

    return basename($target_file);
}