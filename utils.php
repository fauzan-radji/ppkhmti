<?php
session_start();

function uploadFile($file, $redirect)
{
  // upload file
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($file["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target_file = $target_dir . uniqid(rand()) . '.' . $imageFileType;
  // Check if image file is a actual image or fake image
  $check = getimagesize($file["tmp_name"]);
  if (!$check) {
    setError("File yang diupload bukan gambar.");
    redirect($redirect);
  }

  // Allow certain file formats
  if (
    $imageFileType !== "jpg" &&
    $imageFileType !== "png" &&
    $imageFileType !== "jpeg" &&
    $imageFileType !== "gif"
  ) {
    setError("Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.");
    redirect($redirect);
  }

  if (!move_uploaded_file($file["tmp_name"], $target_file)) {
    setError("Maaf, terdapat error saat mengupload file.");
    redirect($redirect);
  }

  return basename($target_file);
}

function setError($errorMessage)
{
  $_SESSION['flashErr'] = $errorMessage;
}

function setSuccess($successMessage)
{
  $_SESSION['flashSucc'] = $successMessage;
}

function redirect($destination)
{
  header("Location: $destination");
}
