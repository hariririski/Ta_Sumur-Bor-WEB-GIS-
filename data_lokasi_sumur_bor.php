<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('share/header.php')?>

    <title>
      SITrans | Transportasi
    </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	


    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	
	<link href="table/css1/charisma-app.css" rel="stylesheet">
    
    <link href='table/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
<script src="js/html5shiv.js">
</script>
<script src="js/respond.min.js">
</script>
<![endif]-->
  </head>

  <body>
    <!--header start-->
      <?php include'share/logo.php';?>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Data Lokasi Sumur Bor
            </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                 Beranda
                </a>
              </li>
              <li>
                <a href="#">
                  Data
                </a>
              </li>
              <li class="active">
               Data Transportasi
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
	
    <!--breadcrumbs end-->
	<center> <a href="tambah_lokasi_sumur_bor.php" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary btn-lg">Tambah Lokasi Sumur Bor</button><center></a>
   <div id="content" class="col-lg-12 col-sm-12">
            <!-- content starts -->
                

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Data Sumur Bor</h2>

        <div class="box-icon">
            
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Foto</th>
        
       
        <th>Desa</th>
        <th>Kecamatan</th>
        <th>Kabupaten/Kota</th>
        <th>Kedalaman Akuifer</th>
        <th>Detail</th>
        
    </tr>
    </thead>
    <tbody>
    <?php
	include('modala.php');
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * FROM `data_sumur_bor`, kabupaten, kecamatan, desa WHERE data_sumur_bor.kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kecamatan=desa.id_kecamatan";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
                   $i++;
                   
                  
                  
                   echo '
                   <tr>
                    <td width="30px">'.$i.'</td>
                    <td class="center">'.$data['lokasi'].'</td>
                   
					';
					if ($data['foto_lokasi']!=null){
					echo'
                    <td class="center"><a href="gambar.php?gambar='.$data['id_sumur_bor'].'" data-toggle="modal" data-target="#myModal"><img src="'.$data['foto_lokasi'].'" width="50px"></a></td>
					';}
					else{
						echo "<td>-</td>";
					}
					echo'
                   
                    
                    <td class="center">'.$data['nama_desa'].'</td>
                    <td class="center">'.$data['nama_kecamatan'].'</td>
                    <td class="center">'.$data['nama_kabupaten'].'</td>
                    <td class="center">'.$data['kedalaman_akuifer'].'</td>
                    <td><a href="detail_lokasi_sumur_bor.php?gambar='.$data['id_sumur_bor'].'" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary btn-lg">Detail</button><center></a></td>
                    
                    
                    
                  </tr>
                  ';
                   }
  ?>
    
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
        </div>
    <!--footer start-->
   <?php include'share/footer.php';?>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="js/hover-dropdown.js">
    </script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>

    <script src="js/jquery.easing.min.js">
    </script>
    <script src="js/link-hover.js">
    </script>
    <script src="js/wow.min.js">
    </script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js">
    </script>


    <script>

      wow = new WOW(
        {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       0          // default
        }
      )
        wow.init();


      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider) {
            $('body').removeClass('loading');
          }
        }
                                   );
      }
                    );




      $(window).scroll(function() {
        $('#skillz').each(function(){
          var imagePos = $(this).offset().top;
          var viewportheight = window.innerHeight;

          var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+viewportheight) {
            $('.skill_bar').fadeIn('slow');
            $('.skill_one').animate({
              width:'60%'}
                                    , 2000);
            $('.skill_two').animate({
              width:'90%'}
                                    , 2000);
            $('.skill_three').animate({
              width:'70%'}
                                      , 1000);
            $('.skill_four').animate({
              width:'55%'}
                                     , 1000);
            $('.skill_bar_progress p').fadeIn('slow',function(){

            }
                                             );
          }
        }
                         );
      }
                      );




    </script>
	
<script src="table/abower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="table/js/jquery.cookie.js"></script>
<!-- calender plugin -->

<!-- data table plugin -->
<script src='table/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="table/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="table/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="table/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="table/bower_components/responsive-tables/responsive-tables.js"></script>

<!-- star rating plugin -->
<script src="table/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="table/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="table/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="table/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="table/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="table/js/charisma.js"></script>
<script type="text/javascript">
			$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); });
			$.fn.modal.Constructor.prototype.enforceFocus = function() {};
		</script>
  </body>
  
</html>
