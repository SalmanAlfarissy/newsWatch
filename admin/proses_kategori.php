<?php 
session_start();
include '../koneksi.php' ; 
if ($_GET['aksi']=='tambah'){
	$nama = $_POST['nama'];
    $query =mysqli_query($koneksi,"INSERT INTO kategori (nama) VALUES ('$nama')");
    header('location:index.php?page=Kategori');

} else if ($_GET['aksi']=='delete'){
    
	$delete =mysqli_query($koneksi,"DELETE FROM kategori WHERE id='$_GET[id]'");
    
	header('location:index.php?page=Kategori');

} else if ($_GET['aksi']=='edit'){

    $query = "SELECT * FROM kategori WHERE id='$_GET[id]'";
	$nama = $_POST['nama'] ?? $old['nama'];
	
    $query = mysqli_query($koneksi,"UPDATE kategori SET nama = '$nama' WHERE id='$_GET[id]'" );
    header('location:index.php?page=Kategori');

}

?>