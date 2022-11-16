<?php
include '../koneksi.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $admin = mysqli_fetch_assoc($result);
  echo json_encode($admin);
} else {
  echo "{}";
}
