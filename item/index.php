<!-- DataTable -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> -->


<h3>Data Barang</h3>
<?php
if (isset($_SESSION['flashSucc'])) {
?>
<script>
    Swal.fire({
        title: 'Sukses',
        html: '<?= $_SESSION['flashSucc'] ?>',
        icon: 'success',
    })
</script>
<?php
    unset($_SESSION['flashSucc']);
}
?>

<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-sm text-white mb-3" data-toggle="modal" data-target="#modalTambah"
            style="background-color:#008374">
            <i class="fas fa-plus"></i> Tambah Barang
        </button>
        <table class="table table-stripped" id="dataTable">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                include "./koneksi.php";

                $sql = "SELECT items.*,kategori.nama as nama_kategori FROM items, kategori WHERE items.item_kategori = kategori.id";
                $result = mysqli_query($conn, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($result)) :
                    $no++;
                    $harga = number_format($data['harga_item'],0,",",".");
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data['nama_item']; ?></td>
                    <td>Rp. <?= $harga; ?></td>
                    <td><?= $data['nama_kategori']; ?></td>
                    <td>
                        <img src="item/uploads/<?= $data['foto_item']; ?>" alt="<?= $data['nama_item']; ?>" style="max-width: 100px; max-height: 100px; object-fit: contain;"> 
                    </td>
                    <td>
                        <button onclick="updateDetailModal(<?=$data['id']?>)" class='btn btn-sm btn-primary rounded-circle' data-toggle="modal" data-target="#modalDetail"><i class='fas fa-eye'></i></button>
                        <button onclick="updateUbahModal(<?=$data['id']?>)" class='btn btn-sm btn-warning rounded-circle' data-toggle="modal" data-target="#modalUbah"><i class='fas fa-pen text-white'></i></button>
                        <a href='delete.php?id=<?=$data['id']?>' class='btn btn-sm btn-danger rounded-circle'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="item/add.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <textarea type="text" rows="7" class="form-control" placeholder="Deskripsi Barang"
                                name="desc_barang"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Harga Barang" name="harga_barang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="file" class="form-control-file" placeholder="Harga Barang" name="foto_barang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <select name="kategori_barang" class="form-control">
                                <option value="">Kategori Barang</option>
                                <?php
                                    $sql = "SELECT * FROM kategori";
                                    $result = mysqli_query($conn, $sql);
                                    while($data = mysqli_fetch_array($result)) :
                                ?>
                                    <option value="<?=$data['id']?>"><?=$data['nama']?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn text-white" style="background-color:#008374"
                        value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbahTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="item/update.php" method="post" enctype="multipart/form-data">
                    <input id="ubahId" type="hidden" name="id">
                    <div class="row mb-3">
                        <div class="col">
                            <input id="ubahNama" type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <textarea id="ubahDeskripsi" type="text" rows="7" class="form-control" placeholder="Deskripsi Barang"
                                name="desc_barang"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input id="ubahHarga" type="number" class="form-control" placeholder="Harga Barang" name="harga_barang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col" style="cursor: pointer;">
                            <img id="ubahFoto" src="" alt="" style="height: 300px; width: 100%; object-fit: contain;">
                            <input id="fileFoto" type="file" class="d-none" placeholder="Harga Barang" name="foto_barang">
                        </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <select name="kategori_barang" class="form-control">
                                <option value="">Kategori Barang</option>
                                <?php
                                    $sql = "SELECT * FROM kategori";
                                    $result = mysqli_query($conn, $sql);
                                    while($data = mysqli_fetch_array($result)) :
                                ?>
                                    <option id="ubahKategori-<?= $data['id'] ?>" value="<?=$data['id']?>"><?=$data['nama']?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn text-white" style="background-color:#008374"
                        value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailNama">Detail barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="detailFoto" src="" alt="Detail barang" style="width: 100%; max-height: 300px; object-fit: contain;">
                <p id="detailDeskripsi" class="mt-4 deskripsi">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe delectus vel sunt? Maxime animi dolorem similique dolor minima, dicta inventore.</p>
                <hr>
                <div class="row">
                    <p id="detailKategori" class="col">Bahan Makanan</p>
                    <p class="col text-right">Rp. <span id="detailHarga">50000</span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const Modal = {
        ubah: {
            id: document.getElementById('ubahId'),
            nama: document.getElementById('ubahNama'),
            deskripsi: document.getElementById('ubahDeskripsi'),
            harga: document.getElementById('ubahHarga'),
            foto: document.getElementById('ubahFoto'),
            kategori: [
                <?php
                    $sql = "SELECT * FROM kategori";
                    $result = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_array($result)) :
                ?>
                    document.getElementById("ubahKategori-<?= $data['id'] ?>"),
                <?php endwhile; ?>
            ]
        },
        detail: {
            nama: document.getElementById('detailNama'),
            deskripsi: document.getElementById('detailDeskripsi'),
            harga: document.getElementById('detailHarga'),
            foto: document.getElementById('detailFoto'),
            kategori: document.getElementById('detailKategori')
        }
    };

    function updateUbahModal(id) {
        const modal = Modal.ubah;
        fetch(`item/get.php?id=${id}`)
            .then(data => data.json())
            .then(item => {
                modal.id.value = item.id;
                modal.nama.value = item.nama_item;
                modal.deskripsi.value = item.deskripsi_item;
                modal.harga.value = item.harga_item;
                modal.foto.src = item.foto_item;
                modal.kategori.find(option => option.id === `ubahKategori-${item.item_kategori}`).selected = true;
            })
            .catch(console.log);
    }

    function updateDetailModal(id) {
        const modal = Modal.detail;
        fetch(`item/get.php?id=${id}`)
            .then(data => data.json())
            .then(item => {
                modal.nama.textContent = item.nama_item;
                modal.deskripsi.textContent = item.deskripsi_item;
                modal.harga.textContent = new Intl.NumberFormat('id-ID').format(+item.harga_item);
                modal.kategori.textContent = item.kategori;
                modal.foto.src = item.foto_item;
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