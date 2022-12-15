<!-- DataTable -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> -->
<?php if (!isset($dibuka_dari_dashboard)) {
  include '../utils.php';
  redirect('../dashboard.php?page=Admins');
} ?>
<h3>Data Kategori</h3>

<div class="card">
  <div class="card-body overflow-auto">
    <button class="btn btn-sm text-white mb-4" data-toggle="modal" data-target="#modalTambah" style="background-color:#008374"><i class="fas fa-plus"></i> Tambah Kategori</button>
    <table class="table table-stripped" id="dataTable">
      <thead class="text-center">
        <tr>
          <th>No</th>
          <th>Nama Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php
        $sql = "SELECT * FROM kategori";
        $result = mysqli_query($conn, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($result)) :
          $no++;
        ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nama']; ?></td>
            <td>
              <button onclick="updateDetailModal(<?= $data['id'] ?>)" class='btn btn-sm btn-primary rounded-circle' data-toggle="modal" data-target="#modalDetail"><i class='fas fa-eye'></i></button>
              <!-- <button onclick="updateUbahModal(<?= $data['id'] ?>)" class='btn btn-sm btn-warning rounded-circle' data-toggle="modal" data-target="#modalUbah"><i class='fas fa-pen text-white'></i></button> -->
              <a href='kategori/delete.php?id=<?= $data['id'] ?>' onclick="return confirm('PERHATIAN!!\n\nMenghapus Kategori juga akan menghapus Barang terkait. Anda yakin ingin menghapus data ini?')" class='btn btn-sm btn-danger rounded-circle'><i class='fas fa-trash'></i></a>
            </td>
          </tr>
        <?php
        endwhile;
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php
// Modal Tambah
Modal::create("modalTambah", "Tambah Kategori", "")
  ->setContent("
<form action='kategori/add.php' method='post'>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Nama Kategori' name='nama'>
    </div>
  </div>
  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
  <input type='submit' name='submit' class='btn text-white' style='background-color:#008374' value='Simpan'>
</form>")->print();

// Modal Ubah
Modal::create("modalUbah", "Ubah Kategori", "")
  ->setContent("
<form action='kategori/update.php' method='post'>
  <input id='ubahId' type='hidden' name='id'>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahNama' type='text' class='form-control' placeholder='Nama' name='nama'>
    </div>
  </div>
  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
  <input type='submit' name='submit' class='btn text-white' style='background-color:#008374' value='Simpan'>
</form>")->print();

// Modal Detail
Modal::create("modalDetail", "Detail Kategori", "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>")->setContent("<table border='0' style='width: 100%'>
<tr>
  <th>Nama</th>
  <td id='detailNama'>Roger Sumatera</td>
</tr>
</table>")->print();
?>

<script>
  const Modal = {
    ubah: {
      id: document.getElementById('ubahId'),
      nama: document.getElementById('ubahNama')
    },
    detail: {
      nama: document.getElementById('detailNama')
    }
  };

  function updateUbahModal(id) {
    const modal = Modal.ubah;
    fetch(`kategori/get.php?id=${id}`)
      .then(data => data.json())
      .then(item => {
        console.log(item);
        modal.id.value = item.id;
        modal.nama.value = item.nama;
      })
      .catch(console.log);
  }

  function updateDetailModal(id) {
    const modal = Modal.detail;
    fetch(`kategori/get.php?id=${id}`)
      .then(data => data.json())
      .then(item => {
        modal.nama.textContent = item.nama;
      })
      .catch(console.log);
  }
</script>