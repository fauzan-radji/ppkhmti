<?php

session_start();

function env($key, $default = null)
{
  if (!file_exists('.env')) throw new Exception("Ga ada file .env LOL. Bikin dulu coy.");

  $lines = file('.env', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
  foreach ($lines as $line) {
    $line = explode('=', $line);
    if ($line[0] === $key) return $line[1];
  }

  return $default;
}

function uploadFile($file, $redirect)
{
  // upload file
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($file["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target_file = $target_dir . uniqid(rand()) . '.jfif';
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
