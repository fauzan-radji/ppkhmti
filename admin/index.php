<!-- DataTable -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> -->


<h3>Data Admin</h3>

<div class="card">
    <div class="card-body">
        <button class="btn btn-sm text-white mb-4" data-toggle="modal" data-target="#modalTambah" style="background-color:#008374"><i class="fas fa-plus"></i> Tambah Admin</button>
        <table class="table table-stripped" id="dataTable">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                include "./koneksi.php";

                $sql = "SELECT * FROM user";
                $result = mysqli_query($conn, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($result)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama'];?></td>
                        <td><?= $data['email']; ?></td>
                        <td>
                            <a href='' class='btn btn-sm btn-primary rounded-circle'><i class='fas fa-eye'></i></a>
                            <a href='' class='btn btn-sm btn-warning rounded-circle'><i class='fas fa-pen text-white'></i></a>
                            <a href='' class='btn btn-sm btn-danger rounded-circle'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="admin/add.php" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama" name="nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirm-password">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn text-white" style="background-color:#008374" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>
