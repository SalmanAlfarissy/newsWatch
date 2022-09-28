<?php 
session_start();
include '../koneksi.php' ; 
if ($_GET['aksi']=='tambah'){

	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$level = $_POST['level'];
	
	$rand = rand();
	$extention = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
	
	if($extention == 'jpg' or'png' or 'jpeg'){
		$namafilebaru = date('Y-m-d').'-'.$rand.'.'.$extention;
		move_uploaded_file($_FILES['foto']['tmp_name'],'images/user/'.$namafilebaru);

		$query =mysqli_query($koneksi,"INSERT INTO users (nama,username,password,level,foto) VALUES ('$nama','$username','$password','$level','$namafilebaru')");
		header('location:index.php?page=User');
	}else{
		echo "<script>alert('File yang anda upload tidak berformat jpg atau png!!'); location.replace(document.referrer);</script>";	
	}
	

} else if ($_GET['aksi']=='delete'){
    $query = "SELECT * FROM users WHERE id='$_GET[id]'";
    $sql = mysqli_query($koneksi,$query);
    $hapusfoto = mysqli_fetch_assoc($sql);
    unlink('images/user/'.$hapusfoto['foto']);

	$delete =mysqli_query($koneksi,"DELETE FROM users WHERE id='$_GET[id]'");
    
	header('location:index.php?page=User');

} else if ($_GET['aksi']=='edit'){

    $query = "SELECT * FROM users WHERE id='$_GET[id]'";
    $sql = mysqli_query($koneksi,$query);
    $old = mysqli_fetch_assoc($sql);


	$nama = $_POST['nama'] ?? $old['nama'];
	$username = $_POST['username'] ?? $old['username'];
	$password = md5($_POST['password']) ?? $old['password'];
	$level = $_POST['level'] ?? $old['level'];
	
	$extention = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
	if($extention == 'jpg' or'png' or 'jpeg'){
        
		move_uploaded_file($_FILES['foto']['tmp_name'],'images/user/'.$old['foto']);

		$query = mysqli_query($koneksi,"UPDATE users SET nama = '$nama', username='$username', password='$password', level='$level' WHERE id = '$_GET[id]'" );
		header('location:index.php?page=User');
	}elseif (empty($extention)) {
		$query = mysqli_query($koneksi,"UPDATE users SET nama = '$nama', username='$username', password='$password', level='$level' WHERE id = '$_GET[id]'" );
		header('location:index.php?page=User');
	}
	else{
		echo "<script>alert('File yang anda upload tidak berformat jpg atau png!!'); location.replace(document.referrer);</script>";	
	}

}

?>