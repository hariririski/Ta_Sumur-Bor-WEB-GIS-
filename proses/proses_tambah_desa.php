
<?php

		
		$nama_kecamatan=$_POST['nama_kecamatan'];
		$nama_desa=$_POST['nama_desa'];
		
		include"../maps/db.php";
		$perintah="INSERT INTO `desa`(`nama_desa`, `id_kecamatan`) VALUES ('$nama_desa','$nama_kecamatan')";
		$query = mysqli_query($con,$perintah);
		
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah menambah Desa Baru');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Desa');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
			}
				
				
	

?>