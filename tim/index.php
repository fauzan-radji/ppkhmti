<!-- DataTable -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> -->
<?php if (!isset($dibuka_dari_dashboard)) {
  redirect('../dashboard.php?page=Teams');
} ?>
<h3>Data Tim</h3>
<?php if (isset($_SESSION['flashSucc'])) : ?>
  <script>
    Swal.fire({
      title: 'Sukses',
      html: '<?= $_SESSION['flashSucc'] ?>',
      icon: 'success',
    })
  </script>
<?php
  unset($_SESSION['flashSucc']);
endif;
?>

<div class="card">
  <div class="card-body">
    <button type="button" class="btn btn-sm text-white mb-3" data-toggle="modal" data-target="#modalTambah" style="background-color:#008374">
      <i class="fas fa-plus"></i> Tambah Anggota
    </button>
    <table class="table table-stripped" id="dataTable">
      <thead class="text-center">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php
        $sql = "SELECT id, nama, jabatan, foto FROM tim";
        $result = mysqli_query($conn, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($result)) :
          $no++;
        ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['jabatan']; ?></td>
            <td>
              <img src="tim/uploads/<?= $data['foto']; ?>" alt="<?= $data['nama']; ?>" style="max-width: 100px; max-height: 100px; object-fit: contain;">
            </td>
            <td>
              <button onclick="updateDetailModal(<?= $data['id'] ?>)" class='btn btn-sm btn-primary rounded-circle' data-toggle="modal" data-target="#modalDetail"><i class='fas fa-eye'></i></button>
              <button onclick="updateUbahModal(<?= $data['id'] ?>)" class='btn btn-sm btn-warning rounded-circle' data-toggle="modal" data-target="#modalUbah"><i class='fas fa-pen text-white'></i></button>
              <a href='tim/delete.php?id=<?= $data['id'] ?>' onclick="return confirm('Anda yakin ingin menghapus data ini?')" class='btn btn-sm btn-danger rounded-circle'><i class='fas fa-trash'></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<?php
// Modal Tambah
Modal::create(
  id: "modalTambah",
  title: "Tambah Anggota",
  footer: ""
)
  ->setContent("<form action='tim/add.php' method='post' enctype='multipart/form-data'>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Nama' name='nama' required>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Jabatan' name='jabatan' required>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Link Twitter' name='twitter'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Link Facebook' name='facebook'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Link Instagram' name='instagram'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input type='text' class='form-control' placeholder='Link LinkedIn' name='linkedin'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input type='file' accept='.jpg,.jpeg,.png' class='form-control-file' placeholder='Foto' name='foto' required>
    </div>
  </div>
  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
  <input type='submit' name='submit' class='btn text-white' style='background-color:#008374' value='Simpan'>
</form>")->print();

// Modal Ubah
Modal::create(
  id: "modalUbah",
  title: "Ubah Anggota",
  footer: ""
)
  ->setContent("<form action='tim/update.php' method='post' enctype='multipart/form-data'>
  <input id='ubahId' type='hidden' name='id'>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahNama' type='text' class='form-control' placeholder='Nama' name='nama'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahJabatan' type='text' class='form-control' placeholder='Jabatan' name='jabatan'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahTwitter' type='text' class='form-control' placeholder='Link Twitter' name='twitter'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahFacebook' type='text' class='form-control' placeholder='Link Facebook' name='facebook'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahInstagram' type='text' class='form-control' placeholder='Link Instagram' name='instagram'>
    </div>
  </div>
  <div class='row mb-3'>
    <div class='col'>
      <input id='ubahLinkedIn' type='text' class='form-control' placeholder='Link LinkedIn' name='linkedin'>
    </div>
  </div>
  <div class='row mb-3'>
    <label class='col' style='cursor: pointer;'>
      <img id='ubahFoto' src='' alt='' style='height: 300px; width: 100%; object-fit: contain;'>
      <input id='fileFoto' type='file' accept='.jpg,.jpeg,.png' class='d-none' placeholder='Foto' name='foto'>
    </label>
  </div>
  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
  <input type='submit' name='submit' class='btn text-white' style='background-color:#008374' value='Simpan'>
</form>")->print();

// Modal Detail
Modal::create(
  id: "modalDetail",
  title: "Detail Anggota",
  footer: "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>"
)
  ->setContent("<div class='card'>
  <img id='detailFoto' class='card-img-top' src=' alt='Card image cap'>
  <div class='card-body'>
    <h5 id='detailNama' class='card-title'>Reza Kecap</h5>
    <h6 id='detailJabatan' class='card-subtitle'>Ketua Bidang Pengembangan Organisasi</h6>
  </div>
  <div class='card-footer text-center'>
    <a id='detailTwitter' href='#' class='btn btn-info py-0 px-2' style='font-size: 1.5em;'><i class='fab fa-twitter'></i></a>
    <a id='detailFacebook' href='#' class='btn btn-primary py-0 px-2' style='font-size: 1.5em;'><i class='fab fa-facebook'></i></a>
    <a id='detailInstagram' href='#' class='btn btn-danger py-0 px-2' style='font-size: 1.5em;'><i class='fab fa-instagram'></i></a>
    <a id='detailLinkedIn' href='#' class='btn btn-dark py-0 px-2' style='font-size: 1.5em;'><i class='fab fa-linkedin-in'></i></a>
  </div>
</div>")->print();
?>

<script>
  const Modal = {
    ubah: {
      id: document.getElementById('ubahId'),
      nama: document.getElementById('ubahNama'),
      jabatan: document.getElementById('ubahJabatan'),
      twitter: document.getElementById('ubahTwitter'),
      facebook: document.getElementById('ubahFacebook'),
      instagram: document.getElementById('ubahInstagram'),
      linkedin: document.getElementById('ubahLinkedIn'),
      foto: document.getElementById('ubahFoto')
    },
    detail: {
      nama: document.getElementById('detailNama'),
      jabatan: document.getElementById('detailJabatan'),
      twitter: document.getElementById('detailTwitter'),
      facebook: document.getElementById('detailFacebook'),
      instagram: document.getElementById('detailInstagram'),
      linkedin: document.getElementById('detailLinkedIn'),
      foto: document.getElementById('detailFoto'),
    }
  };

  function updateUbahModal(id) {
    const modal = Modal.ubah;
    fetch(`tim/get.php?id=${id}`)
      .then(data => data.json())
      .then(item => {
        console.log(item);
        modal.id.value = item.id;
        modal.nama.value = item.nama;
        modal.jabatan.value = item.jabatan;
        modal.twitter.value = item.twitter;
        modal.facebook.value = item.facebook;
        modal.instagram.value = item.instagram;
        modal.linkedin.value = item.linkedin;
        modal.foto.src = item.foto;
      })
      .catch(console.log);
  }

  function updateDetailModal(id) {
    const modal = Modal.detail;
    fetch(`tim/get.php?id=${id}`)
      .then(data => data.json())
      .then(item => {
        modal.nama.textContent = item.nama;
        modal.jabatan.textContent = item.jabatan;
        modal.twitter.href = item.twitter;
        modal.facebook.href = item.facebook;
        modal.instagram.href = item.instagram;
        modal.linkedin.href = item.linkedin;
        modal.foto.src = item.foto;
      })
      .catch(console.log);
  }


  const fileFoto = document.getElementById('fileFoto');
  fileFoto.addEventListener('change', e => {
    if (fileFoto.files && fileFoto.files[0]) {
      const reader = new FileReader();

      reader.onload = e => Modal.ubah.foto.src = e.target.result;
      reader.readAsDataURL(fileFoto.files[0]);
    }
  });
</script>