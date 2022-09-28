<?php 
session_start();
include '../koneksi.php' ; 
if ($_GET['aksi']=='tambah'){

	$judul = $_POST['judul'];
	$content = $_POST['content'];
	$id_kategori = $_POST['id_kategori'];
	$users_id = $_SESSION['id'];
    $tanggal = date('Y-m-d H:i:s');
	
	$rand = rand();
	$extention = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
	
	if($extention == 'jpg' or'png' or 'jpeg'){
		$namafilebaru = date('Y-m-d').'-'.$rand.'.'.$extention;
		move_uploaded_file($_FILES['foto']['tmp_name'],'images/berita/'.$namafilebaru);

		$query =mysqli_query($koneksi,"INSERT INTO berita (id_kategori,users_id,judul,content,foto,tanggal) VALUES ('$id_kategori','$users_id','$judul','$content','$namafilebaru','$tanggal')");
		header('location:index.php?page=Berita');
	}else{
		echo "<script>alert('File yang anda upload tidak berformat jpg atau png!!'); location.replace(document.referrer);</script>";	
	}
	

} else if ($_GET['aksi']=='delete'){
    $query = "SELECT * FROM berita WHERE id='$_GET[id]'";
    $sql = mysqli_query($koneksi,$query);
    $hapusfoto = mysqli_fetch_assoc($sql);
    unlink('images/berita/'.$hapusfoto['foto']);

	$delete =mysqli_query($koneksi,"DELETE FROM berita WHERE id='$_GET[id]'");
    
	header('location:index.php?page=Berita');

} else if ($_GET['aksi']=='edit'){

    $query = "SELECT * FROM berita WHERE id='$_GET[id]'";
    $sql = mysqli_query($koneksi,$query);
    $old = mysqli_fetch_assoc($sql);


	$judul = $_POST['judul'] ?? $old['judul'];
	$content = $_POST['content'] ?? $old['content'];
	$id_kategori = $_POST['id_kategori'] ?? $old['id_kategori'];
    $tanggal = date('Y-m-d H:i:s') ?? $old['tanggal'];
	
	$extention = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
	if($extention == 'jpg' or'png' or 'jpeg'){
        
		move_uploaded_file($_FILES['foto']['tmp_name'],'images/berita/'.$old['foto']);

		$query = mysqli_query($koneksi,"UPDATE berita SET judul = '$judul', content='$content', id_kategori='$id_kategori', tanggal='$tanggal' WHERE id = '$_GET[id]'" );
		header('location:index.php?page=Berita');
	}elseif (empty($extention)) {
		$query = mysqli_query($koneksi,"UPDATE berita SET judul = '$judul', content='$content', id_kategori='$id_kategori', tanggal='$tanggal' WHERE id = '$_GET[id]'" );
		header('location:index.php?page=Berita');
	}
	else{
		echo "<script>alert('File yang anda upload tidak berformat jpg atau png!!'); location.replace(document.referrer);</script>";	
	}

}

?>