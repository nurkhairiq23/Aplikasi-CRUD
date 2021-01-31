<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("location: login.php");
}
	
require 'connect.php';

$items = query("SELECT * FROM barang");

?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="style.css">
<head>
	<title>DAFTAR BARANG</title>
</head>
<body>
	<div class="konten">
		<h1>DAFTAR BARANG</h1>
		<div class="menu">
			<h3>Sebagai Staff Gudang</h3>
		</div>
	
		<table style="width:80%" class="table1" align="center">
		<tr>
		   <th>No</th>
		   <th>Kode</th>
		   <th>Nama</th>
		   <th>Stok</th>
		   <th>Tanggal Update</th>
		   <th colspan=2>Opsi</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach($items as $item) :		?> 
		<tr>
		   <td><?= $i ?></td>
		   <td><?= $item["kode_barang"]; ?></td>
		   <td><?= $item["nama_barang"]; ?></td>
		   <td><?= $item["stok"]; ?></td>
		   <td><?= $item["tanggal"]; ?></td>
		   <td>
				<a href="ubah.php?id=<?= $item["id_barang"]; ?>" class="btn btn-warning" role="button">Ubah</a>
				<a href="hapus.php?id=<?= $item["id_barang"]; ?>" class="btn btn-danger" role="button" onclick="return confirm('yakin ingin menghapus?')">Hapus</a>
		   </td>
		</tr>
		<?php $i++ ?>
		<?php endforeach; ?>
		</table>

		<br />
		<a href="tambah.php" class="btn btn-primary" role="button">Tambah Data</a> 

	</div>
</body>
</html>