
<?php

		
		$nama_kecamatan=$_POST['nama_kecamatan'];
		$nama_desa=$_POST['nama_desa'];
		$id_desa=$_POST['id_desa'];
		
		include"../maps/db.php";
		$perintah="UPDATE `desa` SET `nama_desa`='$nama_desa',`id_kecamatan`='$nama_kecamatan' WHERE id_desa='$id_desa'";
		$query = mysqli_query($con,$perintah);
		
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah Mengubah');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Mengubah');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
			}
				
				
	

?>