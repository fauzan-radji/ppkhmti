<?php
$jumlah_item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS jumlah_item FROM items"))['jumlah_item'];
$anggota_tim = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS anggota_tim FROM tim"))['anggota_tim'];
$jumlah_admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS jumlah_admin FROM user"))['jumlah_admin'];
?>
<h3>Dashboard</h3>
<div class="row">
  <div class="col-3">
    <div class="card">
      <div class="card-body rounded text-white" style="background-color:#008374 ;">
        <div class="row">
          <div class="col">
            <h3 class="text-bolder"><b>Jumlah Items</b></h3>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <h1 class="fas fa-box"></h1>
          </div>
          <div class="col-auto">
            <h2><b><?= $jumlah_item ?></b></h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3">
    <div class="card shadow">
      <div class="card-body rounded text-white" style="background-color:#008374 ;">
        <div class="row">
          <div class="col">
            <h3 class="text-bolder"><b>Jumlah Tim</b></h3>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <h1 class="fas fa-users"></h1>
          </div>
          <div class="col-auto">
            <h2><b><?= $anggota_tim ?></b></h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-3">
    <div class="card shadow">
      <div class="card-body rounded text-white" style="background-color:#008374 ;">
        <div class="row">
          <div class="col">
            <h3 class="text-bolder"><b>Jumlah Admin</b></h3>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <h1 class="fas fa-users"></h1>
          </div>
          <div class="col-auto">
            <h2><b><?= $jumlah_admin ?></b></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>