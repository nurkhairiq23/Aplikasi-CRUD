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
		<h1>Daftar Barang</h1>

		<div class="menu">
			<h3>Sebagai Manager</h3>
		</div>

		<table style="width:80%" class="table1" align="center">
		<tr>
		   <th>No</th>
		   <th>Kode</th>
		   <th>Nama</th>
		   <th>Stok</th>
		   <th>Tanggal Update</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach($items as $item) :		?> 
		<tr>
		   <td><?= $i ?></td>
		   <td><?= $item["kode_barang"]; ?></td>
		   <td><?= $item["nama_barang"]; ?></td>
		   <td><?= $item["stok"]; ?></td>
		   <td><?= $item["tanggal"]; ?></td>
		</tr>
		<?php $i++ ?>
		<?php endforeach; ?>
		</table>
	</div>
</body>
</html>