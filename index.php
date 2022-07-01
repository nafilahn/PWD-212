<?php
	session_start();
	require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Login</title>
</head>

<body>
	<?php
		if (isset($_GET['alert'])) {
			if (isset($_GET['alert']) == "gagal") {
				echo "<p>Maaf username atau password Anda salah!</p>";
			}else if (isset($_GET['alert']) == "belum login"){
				echo "<p>Maaf Anda harus login!</p>";
			}
		}
	?>
	<h1 align="center">Login</h1>
	<table align="center">
		<form action="login.php" method="POST">
			<tr>
				<td>
					<label>Username</label>
				</td>
				<td>
					<input type="text" name="username" placeholder="Username" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Password</label>
				</td>
				<td>
					<input type="password" name="password" placeholder="Password" required>
				</td>
			</tr>
			<tr>
				<td>
				<button type="submit" class="tombol_login" value="Login">LOGIN</button>
				</td>
			</tr>
		</form>
	</table>
</body>
</html>