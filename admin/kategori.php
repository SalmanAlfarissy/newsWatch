<?php 
include '../koneksi.php';
?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kategori</a></li>
            </ol>
        </div>
        <!-- row -->

        <?php 
        if ($_GET['page'] == 'Kategori' && empty($_GET['aksi'])) {
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-lg-10"><h4 class="card-title">Kategori</h4></div>
                        <div class="col-lg-2 en">
                            <a href="index.php?page=Kategori&aksi=tambah" class="btn btn-rounded btn-primary" data-toggle="modal">
                                <span class="btn-icon-start text-primary"><i class="fa fa-plus"></i></span>
                                Kategori
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="display dataTable" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Kategori</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = mysqli_query($koneksi,'SELECT * FROM kategori');
                                foreach ($data as $index => $item) {    
                                 ?>
                                <tr>
                                    <td><?= $index+1 ?></td>
                                    <td><?= $item['nama'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="index.php?page=Kategori&aksi=edit&id=<?= $item['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="proses_kategori.php?aksi=delete&id=<?= $item['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }elseif ($_GET['aksi'] == 'tambah') {?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Kategori</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="proses_kategori.php?aksi=tambah" method="POST">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Kategori</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Nama" name="nama">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <div class="col-sm-3 col-form-label"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif($_GET['aksi'] == 'edit') { 
            $query = "SELECT * FROM kategori WHERE id = '$_GET[id]'";
            $sql = mysqli_query($koneksi,$query);
            $data = mysqli_fetch_assoc($sql);
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Kategori</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="proses_kategori.php?aksi=edit&id=<?= $_GET['id'] ?>" method="POST">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $data['nama'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <div class="col-sm-3 col-form-label"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>