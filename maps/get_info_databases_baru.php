	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->

    <!--external css-->

    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="../stylesheet" href="css/flexslider.css"/>
    <link href="../assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="../stylesheet" href="css/animate.css">
    <link rel="../stylesheet" href="assets/owlcarousel/owl.carousel.css">
    <link rel="../stylesheet" href="assets/owlcarousel/owl.theme.css">

    <link href="../css/superfish.css" rel="stylesheet" media="screen">
   


    <!-- Custom styles for this template -->
    <link rel="../stylesheet" type="text/css" href="css/component.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
	
 </head>
</body>
<?php
         //konfgurasi koneksi database 
         include'db.php';
		$id=$_GET['id'];
		  $lokasi=$_GET['l'];
            $tampil = "SELECT * FROM `data_sumur_bor`, kabupaten, kecamatan, desa WHERE data_sumur_bor.kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kecamatan=desa.id_kecamatan and data_sumur_bor.id_sumur_bor='$id'";
                  $result=mysqli_query($con,$tampil);
				// ambil nama,lat dan lon dari table lokasi
            	while($data=mysqli_fetch_object($result)){
            		 ?>
             
       	
	<div id="content"><div id="siteNotice"></div>
    <center><h3 id="firstHeading" class="firstHeading"><?php echo $data->lokasi ?></h3><div id="bodyContent"> </center>
	<table>
	<tr>
	<td>
	<img src="../<?php echo $data->foto_lokasi?>" width="250px" alt="" title='<?php echo $data->lokasi ?>'  >
	</td>
	<td>
	<table>
	<tr>
	<td>
	<p><?php echo $data->nama_desa.", ".$data->nama_kecamatan.", ".$data->nama_kabupaten?></p> 
	</td>
	</tr>
	<tr>
	<td>
	<p>Kedalaman Akuifer <?php echo $data->kedalaman_akuifer?></p> 
	</td>
	</tr>
	
	
					
					</td>
	</table>
	
   
	</td>
	<td>
	</td>
	</tr>
	</table>
	
		
			
					
			
	
	
    <br>
	
	
    </div></div>
	<?php
				}
		?>
		
<script type="text/javascript">
			$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); });
			$.fn.modal.Constructor.prototype.enforceFocus = function() {};
		</script>
</body>
</html>