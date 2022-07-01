<?php
	require 'function.php';
	session_start();
	
	//berfungsi  menangkap data yg dikirim
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sql = mysqli_query(koneksi(), "SELECT * FROM user WHERE username='$user' AND password='$pass'");
	$cek = mysqli_num_rows($sql);

	if($cek > 0){
		$data = mysqli_fetch_assoc($sql);
		
		//berfungsi mengecek jika user login sbg admin
		if($data['level'] == "admin"){
			//berfungsi membuat session
			$_SESSION['user'] = $data['username'];
			$_SESSION['level'] = "admin";
			//berfungsi mengalihkan ke halaman admin
			header("location:admin/index.php");
			//berfungsi mengecek 
		}else if($data['level'] == "user"){
			$_SESSION['user'] = $data['username'];
			$_SESSION['level'] = "user";
			header("location:user/index.php");
		}else{
			header("location:index.php?alert=gagal");
		}
	}
?>