
<?php

		$id=$_GET['id'];
		
		
		include"../maps/db.php";
		$perintah="DELETE FROM `data_sumur_bor` WHERE id_sumur_bor='$id'";
		$query = mysqli_query($con,$perintah);
		
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah Mengahapus Data');</script>";
				echo '<script>document.location = "../data_lokasi_sumur_bor.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Mengahapus Data');</script>";
				echo '<script>document.location = "../data_lokasi_sumur_bor.php"</script>';
			}
				
				
	

?>