<?php 
include '../koneksi.php';
?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Barita</a></li>
            </ol>
        </div>
        <!-- row -->

        <?php 
        if ($_GET['page'] == 'Berita' && empty($_GET['aksi'])) {
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-lg-10"><h4 class="card-title">Berita</h4></div>
                        <div class="col-lg-2 en">
                            <a href="index.php?page=Berita&aksi=tambah" class="btn btn-rounded btn-primary" data-toggle="modal">
                                <span class="btn-icon-start text-primary"><i class="fa fa-plus"></i></span>
                                Berita
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="display dataTable" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Judul</th>
                                    <th>Content</th>
                                    <th>Kategori</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Gambar</th>
                                    <th>Tanggal</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = mysqli_query($koneksi,'SELECT berita.id,berita.judul, berita.content, berita.foto, berita.tanggal, kategori.nama as nama_kategori, users.nama as nama_user FROM berita JOIN kategori ON kategori.id = berita.id_kategori JOIN users ON users.id = berita.users_id');
                                foreach ($data as $index => $item) {    
                                 ?>
                                <tr>
                                    <td><?= $index+1 ?></td>
                                    <td><?= $item['judul'] ?></td>
                                    <td><?= substr($item['content'],0,50) ?> ...</td>
                                    <td><?= $item['nama_kategori'] ?></td>
                                    <td><?= $item['nama_user'] ?></td>
                                    <td><img src="images/berita/<?= $item['foto'] ?>" class="rounded-circle" width="50px"></td>
                                    <td><?= $item['tanggal'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="index.php?page=Berita&aksi=edit&id=<?= $item['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="proses_berita.php?aksi=delete&id=<?= $item['id'] ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
        <?php }elseif ($_GET['aksi'] == 'tambah') { ?>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Berita</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="proses_berita.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Judul</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Judul Berita" name="judul">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Content</label>
                                        <div class="col-sm-9">
                                            <textarea id="mytextarea" name="content"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                        <select class="default-select form-control wide" name="id_kategori">
											<option value="">== Silahkan Pilih Kategori ==</option>
                                            <?php 
                                                $query = "SELECT * FROM kategori";
                                                $data = mysqli_query($koneksi,$query);
                                                foreach( $data as $item){
                                             ?>
											<option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
											<?php } ?>
										</select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Gambar</label>
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
            <?php }elseif ($_GET['aksi'] == 'edit') {
                $query = "SELECT * FROM berita WHERE id = '$_GET[id]'";
                $sql = mysqli_query($koneksi,$query);
                $data = mysqli_fetch_assoc($sql);
                $kategori = $data['id_kategori'];
                $gambar = $data['foto'] 
                ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Berita</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                            <form action="proses_berita.php?aksi=edit&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Judul</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Judul Berita" name="judul" value="<?= $data['judul'] ?>" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Content</label>
                                        <div class="col-sm-9">
                                            <textarea id="mytextarea" name="content"><?= $data['content'] ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                        <select class="default-select form-control wide" name="id_kategori">
											<option value="">== Silahkan Pilih Kategori ==</option>
                                            <?php 
                                                $query = "SELECT * FROM kategori";
                                                $data = mysqli_query($koneksi,$query);
                                                foreach( $data as $item){
                                             ?>
											<option value="<?= $item['id'] ?>" <?= $kategori == $item["id"] ? "selected" : ""?> ><?= $item['nama'] ?></option>
											<?php } ?>
										</select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Gambar</label>
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
                                            <img src="images/berita/<?php echo $gambar ?>" width="100px">
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