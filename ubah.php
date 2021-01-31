<?php 
	session_start();

	if(!isset($_SESSION["login"])){
		header("location: login.php");
	}
	require 'connect.php';

	$id = $_GET["id"];
	$query = query("SELECT * FROM barang WHERE id_barang = $id")[0];

	if( isset($_POST["submit"])){

		if(ubah($_POST)> 0){
			echo "<script>
				alert('Data berhasil diubah');
				document.location.href = 'index.php';
			</script>";
		} else{
			echo "<script>
				alert('Data gagal diubah')
			</script>";
		}
	}
 ?>

  <!DOCTYPE html>
 <html>
 	<link rel="stylesheet" type="text/css" href="style.css">
 <head>
 	<title>Ubah Data Barang</title>
 </head>
 <body>
 	<div class="konten">
 		<h1>Ubah Data Barang</h1>

 		<div class="menu">
			<h3>Sebagai Staff Gudang</h3>
		</div>

 		<form action="" method="post">
 			<div class="form-group">
            	<label for="kode">Kode Barang :</label>
            	<input type="text" name="kode" class="form-control" required id="kode" autocomplete="off" value="<?= $query['kode_barang']?>" />
        	</div>
        	<div class="form-group">
            	<label for="nama">Nama Barang :</label>
            	<input type="text" name="nama" class="form-control" required id="nama" autocomplete="off" value="<?= $query['nama_barang']?>"/>
        	</div>
        	<div class="form-group">
            	<label for="stok">Jumlah Stok Barang :</label>
            	<input type="number" name="stok" class="form-control" required id="stok" autocomplete="off" value="<?= $query['stok']?>"/>
        	</div>
        	<input type="hidden" name="tanggal" value="<?= date("Y-m-d") ?>">

        	<input type="hidden" name="id" value="<?= $query['id_barang'] ?>">

        	<button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>

        	<a href="index.php" class="btn btn-warning" role="button" onclick="return confirm('Batalkan perubahan?')">Batal</a>
 		</form>
 	</div>
 </body>
 </html>