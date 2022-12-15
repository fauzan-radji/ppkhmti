<?php
$timPage = '../dashboard.php?page=Teams';
include '../utils.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  mysqli_query($conn, "DELETE FROM tim WHERE id = $id");

  if (mysqli_affected_rows($conn) >= 1) {
    setSuccess("Data berhasil dihapus");
  } else {
    setError("Data gagal dihapus");
  }
}

redirect($timPage);
