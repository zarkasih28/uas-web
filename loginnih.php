<?php

	$koneksi = new mysqli("localhost","root","","perpustakaan");

	if (isset($_POST['login'])) { 
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = $koneksi -> query("select * from admin where username='$username' and password='$password'");

		$data = $sql -> fetch_assoc();

		$ketemu = $sql -> num_rows;

		if ($ketemu) {

			if($data['username']==$username&& $data['password']==$password){	
				
				$_SESSION['username'] = $data['id_admin'];

				?>

				<?php
			if ($_SESSION['username']) {
				header("location:index.php");
						}else{
				header("location : login.php");
				}
		}
			
		}
	}

 
?>