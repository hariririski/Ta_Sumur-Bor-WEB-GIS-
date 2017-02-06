<?php
$nama_lokasi=$_POST['nama_transportasi'];

$lintang=$_POST['lintang'];//5.

$bujur=$_POST['bujur']; // 95.

$kedalaman_akuifer=$_POST['kedalaman_akuifer'];


$nama_kabupaten=$_POST['country'];

$nama_kecamatan=$_POST['nama_kecamatan'];

$nama_desa=$_POST['nama_desa'];

$data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyBJEyzwKXH2n9SpdmUoRQqWbtvOVSLukyw&origins=$lintang,$bujur&destinations=$lintang,$bujur&language=id-ID&sensor=false");
//$data = json_decode($data,TRUE);
$data2=explode(":",$data);
$data3=explode(' ',$data2[1]);

print_r($data2);

if(strcmp($data3[15],"Aceh")==0){
	echo "<script type='text/javascript'>alert('Koordinat yang dimasukkan  Di".$data3[15]."');</script>";
/*
$foto_lokasi=basename($_FILES["foto_sumur_bor"]["name"]);
$foto_lokasi="img/".$foto_lokasi;
upload("foto_sumur_bor");
	
		include"../maps/db.php";
	$perintah="INSERT INTO `data_sumur_bor`(`lokasi`, `desa`, `kecamatan`, `kabupaten`, `lon`, `lat`, `kedalaman_akuifer`, `foto_lokasi`)
		VALUES ('$nama_lokasi','$nama_desa','$nama_kecamatan','$nama_kabupaten','$bujur','$lintang','$kedalaman_akuifer','$foto_lokasi')";
		$query = mysqli_query($con,$perintah);
		if ($query) {
				echo "<script type='text/javascript'>alert('Selamat Anda Telah menambah LokasiBaru');</script>";
				echo '<script>document.location = "../data_lokasi_sumur_bor.php"</script>';
		} else {
				echo "<script type='text/javascript'>alert('Maaf Anda Gagal menambah Lokasi');</script>";
				echo '<script>document.location = "../data_lokasi_sumur_bor.php"</script>';
		}
*/
}else{
	
	echo "<script type='text/javascript'>alert('Koordinat yang dimasukkan Bukan Di Aceh Melainkan ".$data3[15]."');</script>";
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