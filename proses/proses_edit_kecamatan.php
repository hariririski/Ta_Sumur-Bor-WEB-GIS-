
<?php

		$nama_kabupaten=$_POST['nama_kabupaten'];
		$nama_kecamatan=$_POST['nama_kecamatan'];
		$id_kecamatan=$_POST['id_kecamatan'];
		
		include"../maps/db.php";
		$perintah="UPDATE `kecamatan` SET `nama_kecamatan`='$nama_kecamatan',`id_kabupaten`='$nama_kabupaten' WHERE id_kecamatan='$id_kecamatan'";
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