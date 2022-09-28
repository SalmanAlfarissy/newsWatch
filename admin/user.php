<?php 
include '../koneksi.php';
?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            </ol>
        </div>
        <!-- row -->

        <?php 
        if ($_GET['page'] == 'User' && empty($_GET['aksi'])) {
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-lg-10"><h4 class="card-title">Data User</h4></div>
                        <div class="col-lg-2 en">
                            <a href="index.php?page=User&aksi=tambah" class="btn btn-rounded btn-primary" data-toggle="modal">
                                <span class="btn-icon-start text-primary"><i class="fa fa-plus"></i></span>
                                User
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="display dataTable" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = mysqli_query($koneksi,'SELECT * FROM users');
                                foreach ($data as $index => $item) {    
                                 ?>
                                <tr>
                                    <td><?= $index+1 ?></td>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['username'] ?></td>
                                    <td><?= $item['level'] == 0 ? 'Administrator' : 'Jurnalis'?></td>
                                    <td><img src="images/user/<?= $item['foto'] ?>" class="rounded-circle" width="50px"></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="index.php?page=User&aksi=edit&id=<?= $item['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="proses_user.php?aksi=delete&id=<?= $item['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                            <h4 class="card-title">Tambah Data User</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="proses_user.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Nama" name="nama">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Username" name="username">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Level</label>
                                        <div class="col-sm-9">
                                        <select class="default-select form-control wide" name="level">
											<option value="">== Silahkan Pilih Level User ==</option>
											<option value="0">Administrator</option>
											<option value="1">Jurnalis</option>
										</select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control" name="foto">
                                                </div>
                                            </div>    
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
            $query = "SELECT * FROM users WHERE id = '$_GET[id]'";
            $sql = mysqli_query($koneksi,$query);
            $data = mysqli_fetch_assoc($sql);
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data User</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="proses_user.php?aksi=edit&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $data['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $data['username'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Level</label>
                                        <div class="col-sm-9">
                                        <select class="default-select form-control wide" name="level">
											<option value="">== Silahkan Pilih Level User ==</option>
											<option value="0" <?= $data['level'] == 0 ? 'selected' : ''?>>Administrator</option>
											<option value="1" <?= $data['level'] == 1 ? 'selected' : ''?>>Jurnalis</option>
										</select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control" name="foto">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                    <div class="col-sm-3 col-form-label"></div>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                            <img src="images/user/<?= $data['foto'] ?>" width="100px">
                                            </div>    
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