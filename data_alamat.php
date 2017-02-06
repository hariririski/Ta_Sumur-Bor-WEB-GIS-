<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('share/header.php')?>
	
    <title>
      SITrans | Data ALamat
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
              Data ALamat
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
                Data Alamat
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
	  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pf-img">
                     <div class="col-lg-12">
          <!--tab start-->
          <section class="tab wow fadeInLeft">
            <header class="panel-heading tab-bg-dark-navy-blue">
              <ul class="nav nav-tabs nav-justified ">
                <li class="active">
                  <a data-toggle="tab" href="#news">
                   Alamat
                  </a>
                </li>
                
                <li>
                  <a data-toggle="tab" href="#events1">
                    Kabupaten/Kota
                  </a>
                </li>
				 <li>
                  <a data-toggle="tab" href="#events2">
                    Kecamatan
				   </a>
                </li>
				 <li>
                  <a data-toggle="tab" href="#events3">
                    Desa
                  </a>
                </li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content tasi-tab">
                <div id="news" class="tab-pane fade in active">
                  <article class="media">
                      <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Alamat</h2>

        <div class="box-icon">
            
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Logo</th>
		
		 <th>Kabupaten/Kota</th>
		 <th>Kecamatan</th>
        <th>Desa</th>
        
       
        
        
        
    </tr>
    </thead>
    <tbody>
    <?php
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * from desa,kabupaten,kecamatan WHERE  kabupaten.id_kabupaten=kecamatan.id_kabupaten and kecamatan.id_kecamatan=desa.id_kecamatan";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
                   $i++;
                   
                  
                  
                   echo '
                   <tr>
                    <td width="30px">'.$i.'</td>
					';
					?> 
				
					
					  <td  width="5%"><img src="<?php echo $data['logo']?> "></td>
					  
					  	<?php
					  echo'
					  <td class="center">'.$data['nama_kabupaten'].'</td>
					  <td class="center">'.$data['nama_kecamatan'].'</td>
                    <td class="center">'.$data['nama_desa'].'</td>
                    
                   
                   
                    
                    
                    
                    
                    
                  </tr>
                  ';
                   }
  ?>
    
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
                  </article>
                  
                </div>
               
				
				<div id="events1" class="tab-pane fade">
                 <article class="media">
                    <center>
					<a href="tambah_kabupaten.php" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary btn-lg">Tambah Kabupaten/Kota</button></a>
                    </center>
                    
	<div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Kabupaten/Kota</h2>

        <div class="box-icon">
            
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>logo</th>
        <th>Nama Kabupaten/Kota</th>
        <th>Edit</th>
        <th>Hapus</th>
        
        
    </tr>
    </thead>
    <tbody>
    <?php
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * from kabupaten";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
                   $i++;
                   
                  
                  
                   echo '
                   <tr>
                    <td width="30px">'.$i.'</td>
					<td  width="5%"><img src="'.$data['logo'].'"></td>
                    <td class="center">'.$data['nama_kabupaten'].'</td>
                   <td width="50px">
                   <a href="edit_kabupaten.php?id='.$data['id_kabupaten'].'" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary ">Edit</button></a>
				   </td>
				   <td width="50px">
					<a href="proses/proses_hapus_kabupaten.php?id='.$data['id_kabupaten'].'"><button class="btn btn-danger ">Hapus</button></a>
                    </td>
                    
                    
                    
                    
                    
                  </tr>
                  ';
                   }
  ?>
    
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
                  </article>
                </div>
				<div id="events2" class="tab-pane fade">
                 <article class="media">
                  <center>
                  <a href="tambah_kecamatan.php" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary btn-lg">Tambah Kecamatan</button></a>
                  </center> 
				  	
	<div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Kecamatan</h2>

        <div class="box-icon">
            
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Kecamatan</th>
        <th>Edit</th>
        <th>Hapus</th>
        
        
    </tr>
    </thead>
    <tbody>
    <?php
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * from kecamatan";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
                   $i++;
                   
                  
                  
                   echo '
                   <tr>
                    <td width="30px">'.$i.'</td>
                    <td class="center">'.$data['nama_kecamatan'].'</td>
                   <td width="50px">
                   <a href="edit_kecamatan.php?id='.$data['id_kecamatan'].'" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary ">Edit</button></a>
				   </td>
				   <td width="50px">
					<a href="proses/proses_hapus_kecamatan.php?id='.$data['id_kecamatan'].'"><button class="btn btn-danger ">Hapus</button></a>
                    </td>
                    
                    
                    
                    
                    
                  </tr>
                  ';
                   }
  ?>
    
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
	
                  </article>
                </div>
				<div id="events3" class="tab-pane fade">
                 <article class="media">
                    <center>
					<a href="tambah_desa.php" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary btn-lg">Tambah Desa</button></center></a>
                     <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Desa</h2>

        <div class="box-icon">
            
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Desa</th>
        <th>Edit</th>
        <th>Hapus</th>
        
        
        
    </tr>
    </thead>
    <tbody>
    <?php
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * from desa";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
                   $i++;
                   
                  
                  
                   echo '
                   <tr>
                    <td width="30px">'.$i.'</td>
                    <td class="center">'.$data['nama_desa'].'</td>
					<td width="50px">
                    <a href="edit_desa.php?id='.$data['id_desa'].'" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary ">Edit</button></a>
				   </td>
				   <td width="50px">
					<a href="proses/proses_hapus_desa.php?id='.$data['id_desa'].'"><button class="btn btn-danger ">Hapus</button></a>
                    </td>
                    
                    
                    
                    
                  </tr>
                  ';
                   }
  ?>
    
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
                  </article>
                </div>
                
              </div>
            </div>
          </section>
          <!--tab end-->
        </div>
                 </div>

            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
	 <?php include('modala.php');?>
   <div id="content" class="col-lg-12 col-sm-12">
            <!-- content starts -->
                

    <div class="row">
   
	

	
    <!--/span-->

    </div><!--/row-->
	 <div class="row">
  
	</div>
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
