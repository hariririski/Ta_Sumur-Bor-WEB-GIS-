<?php
$nama_kabupaten=$_POST['nama_kabupaten'];
$id_kabupaten=$_POST['id_kabupaten'];
$foto_kabupaten=basename($_FILES["foto_kabupaten"]["name"]);
$foto_kabupaten="img/".$foto_kabupaten;
upload("foto_kabupaten");

		include"../maps/db.php";
		if($foto_kabupaten=="img/"){
			$perintah="UPDATE `kabupaten` SET `nama_kabupaten`='$nama_kabupaten' WHERE id_kabupaten='$id_kabupaten'";
			
		}else{
			$perintah="UPDATE `kabupaten` SET `nama_kabupaten`='$nama_kabupaten',`logo`='$foto_kabupaten' WHERE id_kabupaten='$id_kabupaten'";
		}
		
		$query = mysqli_query($con,$perintah);
		if ($query) {
				
				
				echo "<script type='text/javascript'>alert('Selamat Anda Telah menambah Kabupaten Baru');</script>";
				echo '<script>document.location = "../data_alamat.php"</script>';
				//header("location: ../data_alamat.php"); // Mengarahkan ke halaman profil
				
			
				
				
			} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal Kabupaten');</script>";
				//echo '<script>document.location = "../data_alamat.php"</script>';
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
	}
	else{
		echo 'File gagal diupload';
	}
	}
}

?>