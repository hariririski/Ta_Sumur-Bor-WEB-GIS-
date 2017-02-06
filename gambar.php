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
         
          
		  <?php
	
                   $i++;
                   
                  
                  
                   echo '
                   
                    
                  <img src="'.$data['foto_lokasi'].'" width="100%">
                  ';
                   }
  ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>