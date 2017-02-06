<?php
$id_transportasi=$_GET['id_transportasi'];
$nama_transportasi=$_POST['nama_transportasi'];
$lintang=$_POST['lintang'];
$bujur=$_POST['bujur'];
$deskripsi=$_POST['deskripsi'];
$nama_kategori=$_POST['nama_kategori'];
$jalan=$_POST['jalan'];
$nama_provinsi=$_POST['nama_provinsi'];
$nama_kabupaten_kota=$_POST['nama_kabupaten_kota'];
$nama_kecamatan=$_POST['nama_kecamatan'];
$nama_desa=$_POST['nama_desa'];
$target_dir = "../maps/foto/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$foto=basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		include"../maps/db.php";
		$perintah="UPDATE `transportasi` SET `nama`='$nama_transportasi',`lat`='$lintang',`lon`='$bujur',`foto`='$foto',`deskripsi`='$deskripsi',`id_kategori`='$nama_kategori',`id_desa`='$nama_desa',`id_kecamatan`='$nama_kecamatan',`id_kabupaten_kota`='$nama_kabupaten_kota',`id_provinsi`='$nama_provinsi',`jalan`='$jalan' WHERE transportasi.id_transportasi='$id_transportasi'";
		$query = mysqli_query($con,$perintah);
		if ($query) {
				echo "<script type='text/javascript'>alert('Selamat Anda Telah Update Lokasi Trasnportasi Baru');</script>";
				echo '<script>document.location = "../data_lokasi_transportasi.php"</script>';
		} else {
				echo "<script type='text/javascript'>alert('Maaf Gagal Anda update Lokasi Trasnportasi');</script>";
				echo '<script>document.location = "../data_lokasi_transportasi.php"</script>';
		}
    } else {
        echo "<script type='text/javascript'>alert('Maaf Anda update Lokasi Trasnportasi');</script>";
				echo '<script>document.location = "../data_lokasi_transportasi.php"</script>';
    }

?>