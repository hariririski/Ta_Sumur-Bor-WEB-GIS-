
<?php

		$username=$_POST['username'];
		$password=$_POST['password'];
		$nama_lengkap=$_POST['nama_lengkap'];
		
		include"../maps/db.php";
		$perintah="INSERT INTO `users`(`username`, `password`, `nama`) 
		VALUES ('$username','$password','$nama_lengkap')";
		$query = mysqli_query($con,$perintah);
		
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah menambah Kecamatan Baru');</script>";
				echo '<script>document.location = "../data_admin.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Kecamatan');</script>";
				echo '<script>document.location = "../data_admin.php"</script>';
			}
				
				
	

?>