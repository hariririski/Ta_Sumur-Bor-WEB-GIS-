
<?php

		$id=$_GET['id'];

		include"../maps/db.php";
		$perintah="DELETE FROM `desa` WHERE id_desa='$id'";
		$query = mysqli_query($con,$perintah);
		
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah Mengahapus Data');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
				
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Mengahapus Data');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
			}
				
				
	

?>