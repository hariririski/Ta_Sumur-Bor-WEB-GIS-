<?php
$nama_lokasi=$_POST['nama_transportasi'];
$id_sumur_bor=$_POST['id_sumur_bor'];

$lintang=$_POST['lintang'];

$bujur=$_POST['bujur'];

$kedalaman_akuifer=$_POST['kedalaman_akuifer'];



$nama_kabupaten=$_POST['nama_kabupaten'];
$nama_kecamatan=$_POST['nama_kecamatan'];
$nama_desa=$_POST['nama_desa'];

$nama_desa=$_POST['nama_desa'];

$foto_lokasi=basename($_FILES["foto_sumur_bor"]["name"]);
$foto_lokasi="img/".$foto_lokasi;

	
		include"../maps/db.php";
	if($foto_lokasi=="img/"){
			$perintah="UPDATE `data_sumur_bor` SET `lokasi`='$nama_lokasi',`desa`='$nama_desa',`kecamatan`='$nama_kecamatan',`kabupaten`='$nama_kabupaten',`lon`='$bujur',`lat`='$lintang',`kedalaman_akuifer`='$kedalaman_akuifer' WHERE id_sumur_bor='$id_sumur_bor'";
		
			
		}else{
			upload("foto_sumur_bor");
			$perintah="UPDATE `data_sumur_bor` SET `lokasi`='$nama_lokasi',`desa`='$nama_desa',`kecamatan`='$nama_kecamatan',`kabupaten`='$nama_kabupaten',`lon`='$bujur',`lat`='$lintang',`kedalaman_akuifer`='$kedalaman_akuifer',`foto_lokasi`='$foto_lokasi' WHERE id_sumur_bor='$id_sumur_bor'";
		}
		
		
		$query = mysqli_query($con,$perintah);
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah Mengubah Data Sumur Bor');</script>";
				echo '<script>document.location = "../data_lokasi_sumur_bor.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Kabupaten');</script>";
				echo '<script>document.location = "../edit_lokasi_sumur_bor.php?id=$id_sumur_bor"</script>';
			}

?>
<?php
function upload($name){
	$uploadDir = "../img/";
	// Apabila ada file yang di-upload
	if(is_uploaded_file($_FILES[$name]['tmp_name'])){
		$uploadFile = $_FILES[$name];
		// Extract nama file
		$extractFile = pathinfo($uploadFile['name']);
		$size = $_FILES[$name]['size']; //untuk mengetahui ukuran file
		$tipe = $_FILES[$name]['type'];// untuk mengetahui tipe file
	$sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
	$handle = opendir($uploadDir);
	while(false !== ($file = readdir($handle))){ // Looping isi file pada directory tujuan
		// Apabila ada file dengan awalan yg sama dengan nama file di uplaod
		if(strpos($file,$extractFile['filename']) !== false)
		$sameName++; // Tambah data file yang sama
	}
	/* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
	* nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
	$newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];

	if(move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$newName)){
		echo 'File berhasil diupload dengan nama: '.$newName;
		return $newName;
	}
	else{
		echo 'File gagal diupload';
	}
	}
}

?>