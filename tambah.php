<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("location: login.php");
}
require 'connect.php';

if( isset($_POST["submit"])){

	if(tambah($_POST)> 0){
		echo "<script>
			alert('Data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>";
	} else{
		echo "<script>
			alert('Data gagal ditambahkan')
		</script>";
	}
}

?>

 <!DOCTYPE html>
 <html>
 	<link rel="stylesheet" type="text/css" href="style.css">
 <head>
 	<title>Tambah Data Barang</title>
 </head>
 <body>
 	<div class="konten">
 		<h1>Tambah Data Barang</h1>

 		<div class="menu">
			<h3>Sebagai Staff Gudang</h3>
		</div>

 		<form action="" method="post">
 			<div class="form-group">
            	<label for="kode">Kode Barang :</label>
            	<input type="text" name="kode" class="form-control" placeholder="Masukan kode barang" required id="kode" autocomplete="off" />
        	</div>
        	<div class="form-group">
            	<label for="nama">Nama Barang :</label>
            	<input type="text" name="nama" class="form-control" placeholder="Masukan Nama barang" required id="nama" autocomplete="off"/>
        	</div>
        	<div class="form-group">
            	<label for="stok">Jumlah Stok Barang :</label>
            	<input type="number" name="stok" class="form-control" placeholder="Masukan jumlah stok barang" required id="stok" autocomplete="off"/>
        	</div>
        	<input type="hidden" name="tanggal" value="<?= date("Y-m-d") ?>">

        	<button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>

        	<a href="index.php" class="btn btn-warning" role="button" onclick="return confirm('Data tidak akan tersimpan, tetap ingin kembali?')">Kembali</a>
 		</form>
 	</div>
 </body>
 </html>