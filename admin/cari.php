<?php
function cari ($cari){
	$konek = koneksi();
	$query = "SELECT * FROM mahasiswa WHERE
	nama LIKE '%$cari' OR
	nim LIKE '%$cari'";
	$result = mysqli_query($konek, $query);
	$dataArray = [];
	while ($data = mysqli_fetch_assoc($result)){
		$dataArray[] = $data;
	}
	return $dataArray;
}
?>