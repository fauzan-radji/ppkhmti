<?php
include '../koneksi.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tim WHERE id = $id");
    $tim = mysqli_fetch_assoc($result);
    $tim['foto'] = 'tim/uploads/' . $tim['foto'];
    echo json_encode($tim);
} else {
    echo "{}";
}
