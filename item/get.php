<?php
include '../utils.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // $result = mysqli_query($conn, "SELECT items.*, kategori.nama FROM items, kategori WHERE id = $id");
  $result = mysqli_query($conn, "SELECT items.*, kategori.nama AS kategori FROM items INNER JOIN kategori ON items.item_kategori=kategori.id WHERE items.id = $id");
  $item = mysqli_fetch_assoc($result);
  $item['foto_item'] = 'item/uploads/' . $item['foto_item'];
  echo json_encode($item);
} else {
  echo "{}";
}
