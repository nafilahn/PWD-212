<?php
	include "../koneksi.php";
	$id = $_GET['id'];
	mysqli_query("DELETE FROM mahasiswa WHERE id = '$id'");
	header("location:index.php");
?>