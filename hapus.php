<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("location: login.php");
}

require 'connect.php';
$id = $_GET["id"];

if(hapus($id) > 0){
	echo "<script>
			alert('Data berhasil dihapus');
			document.location.href = 'index.php';
		</script>";
	} else{
		echo "<script>
			alert('Data gagal dihapus')
		</script>";
	}
 ?>}
