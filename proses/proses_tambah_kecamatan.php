
<?php

		$nama_kabupaten=$_POST['nama_kabupaten'];
		$nama_kecamatan=$_POST['nama_kecamatan'];
		
		include"../maps/db.php";
		$perintah="INSERT INTO `kecamatan`(`nama_kecamatan`, `id_kabupaten`) VALUES ('$nama_kecamatan','$nama_kabupaten')";
		$query = mysqli_query($con,$perintah);
		
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah menambah Kecamatan Baru');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Kecamatan');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
			}
				
				
	

?>