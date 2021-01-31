<?php

$conn = mysqli_connect("localhost","root","","db_barang");

function query($query){
	global $conn;
	$result= mysqli_query($conn, $query);

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;

	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$stok = htmlspecialchars($data["stok"]);
	$tanggal = htmlspecialchars($data["tanggal"]);


	$query = "INSERT INTO barang 
			VALUES 
			('', '$kode', '$nama', $stok, '$tanggal')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	}

	function hapus($id){
		global $conn;

		mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id");

		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;

		$id = $data["id"];
		$kode = htmlspecialchars($data["kode"]);
		$nama = htmlspecialchars($data["nama"]);
		$stok = htmlspecialchars($data["stok"]);
		$tanggal = htmlspecialchars($data["tanggal"]);

		$query = "UPDATE barang SET 
			kode_barang = '$kode',
			nama_barang = '$nama',
			stok = $stok,
			tanggal = '$tanggal'
			WHERE id_barang = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

	}
?>