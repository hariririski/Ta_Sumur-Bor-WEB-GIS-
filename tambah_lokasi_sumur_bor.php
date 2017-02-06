<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include('share/header.php')?>
    <title>Acme | Home</title>

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
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css"/>
	<script type="text/javascript" src="js/jquery-gmaps-latlon-picker.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;
						document.getElementById('citydiv').innerHTML='<select name="no_kamar" class="form-control">'+
						'<option>Pilih Desa</option>'+
				        '</select>';						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
</script>


      <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
  
    <!--header end-->

    <!--breadcrumbs start-->
    
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="component-bg">
        <div class="container">
            <!-- Forms
================================================== -->
<div class="bs-docs-section mar-b-30">
  


  <h2 id="forms-horizontal">Tambah lokasi Sumur Bor</h2>
  
  <div class="bs-callout bs-callout-info">
    <form class="form-horizontal" role="form" action="proses/proses_tambah_lokasi_sumur_bor.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nama Lokasi</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Lokasi" required name="nama_transportasi">
        </div>
      </div>
	 
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Lintang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Lintang" required name="lintang">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Bujur</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="Bujur" required name="bujur">
        </div>
      </div>
	   <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Kealaman Akuifer</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" placeholder="kedalaman_akuifer" required name="kedalaman_akuifer">
        </div>
      </div>
	   
	 
	   <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Kabupaten</label>
        <div class="col-sm-10">
          <select name="country" onChange="getState(this.value)" class="form-control" >
		  <option>Pilih Kabupaten</option>
			<?php
                  include'maps/db.php';
                  $i=0; 
                  $tampil = "SELECT * from kabupaten";
                  $sql = mysqli_query($con,$tampil);
                  while($data = mysqli_fetch_array($sql))
                   {
                   $i++;
                   echo "<option value='$data[id_kabupaten]'>$data[nama_kabupaten]</option>";
                 
                   }
					?>
    
		  </select>
        </div>
      </div>
	   <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
        <div class="col-sm-10">
          <div id="statediv"><select name="state" class="form-control" >
	<option>Pilih Kecamatan</option>
        </select></div>
        </div>
      </div>
	   <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Desa</label>
        <div class="col-sm-10">
          <div id="citydiv"><select name="no_kamar" class="form-control">
	<option>Pilih Desa</option>
        </select></div>
        </div>
      </div>
       <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Upload Foto</label>
        <div class="col-sm-10">
           <input type="file" id="exampleInputFile" name='foto_sumur_bor'>
       
        </div>
      </div>
	    
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Tambah</button>
        </div>
      </div>
    </form>
	<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
  </div><!-- /.bs-example -->


</div>
        </div>
    </div>
    <!--container end-->

   

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>


     <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        wow = new WOW(
          {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0          // default
          }
        )
        wow.init();
    </script>

  </body>
</html>
