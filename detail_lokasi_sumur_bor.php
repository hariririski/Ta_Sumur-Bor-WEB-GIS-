<html>
<head>
<script>
$('#mymodal').on('shown', function () {
  google.maps.event.trigger(map, 'resize');
  map.setCenter(new google.maps.LatLng(42.7369792, -84.48386540000001));
});
</script>
</head>
<body>
<div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <?php
		  $gambar=$_GET['gambar'];
		  
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * FROM `data_sumur_bor`, kabupaten, kecamatan, desa WHERE data_sumur_bor.kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kecamatan=desa.id_kecamatan and data_sumur_bor.id_sumur_bor='$gambar'";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
		  
		  
		  ?>

          <h4 class="modal-title"><?php echo $data['lokasi']?></h4>
        </div>
        <div class="modal-body">
         <table>
		 <tr>
			 <td>
			 Nama
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 <?php echo $data['lokasi'] ?>
			 </td>
		 </tr>
		 <tr>
			 <td>
			 Foto
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 <?php echo '<img src="'.$data['foto_lokasi'].'" width="100%">' ?>
			 </td>
		 </tr>
		 
		 <tr>
			 <td>
			 Provinsi
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 Aceh
			 </td>
		 </tr>
		 <tr>
			 <td>
			 Kabupaten/Kota
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 <?php echo $data['nama_kabupaten'] ?>
			 </td>
		 </tr>
		 <tr>
			 <td>
			 Kecamatan
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 <?php echo $data['nama_kecamatan'] ?>
			 </td>
		 </tr>
		 <tr>
			 <td>
			 Desa
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 <?php echo $data['nama_desa'] ?>
			 </td>
		 </tr>
		 <tr>
			 <td>
			 Koordinat
			 </td>
			 <td>
			 :
			 </td>
			 <td>
			 <?php echo $data['lat'].",".$data['lon'] ?>
			 
			 </td>
		 </tr>
		<table>
         	<iframe  src="perlokasi.php?lokasi=<?php echo $data['lat'].",".$data['lon'] ?>" width="100%" height="305px" scrolling="no" frameborder="0"></iframe>
		  
  <center>
  <a href="edit_lokasi_sumur_bor.php?id=<?php echo  $data['id_sumur_bor'] ?>"><button class="btn btn-primary btn-lg">Edit</button></a>
  <a href="proses/proses_hapus_sumur_bor.php?id=<?php echo  $data['id_sumur_bor'] ?>"><button class="btn btn-danger btn-lg">Hapus</button></a>
  </center>
  <?php
                   }
  ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
	 
	  </body>
	  </html>