<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="author" content="cosmic">
    <meta name="keywords" content="Bootstrap 3, Template, Theme, Responsive, Corporate, Business">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Acme | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/flexslider.css"/>
    <link href="../assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


      <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
	<style type='text/css'>
  #peta {
  width: 100%;
  height: 400px;

} </style>
    
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyBJEyzwKXH2n9SpdmUoRQqWbtvOVSLukyw&origins&callback=initMap"> </script>
 
	<script src="jquery.js"></script>
	
   <script type="text/javascript">
   var layers=[];

layers[0] = new  google.maps.KmlLayer('http://bioskopaceh.com/p11_kabupaten_a_15102012_Lay2.kmz',
{preserveViewport: true});

layers[1] = new google.maps.KmlLayer('http://bioskopaceh.com/garis_recharge_discharge_Lay.kmz',
{preserveViewport: true});

layers[2] = new google.maps.KmlLayer('http://bioskopaceh.com/petacataceh_Clip1_LayerToKML2.kmz',
{preserveViewport: true});
var map;
	
	
	function initialize() {
	
    var locations = [
   <?php
         //konfgurasi koneksi database 
         include'db.php';
		  
            	$sql_lokasi="SELECT * FROM `data_sumur_bor`, kabupaten, kecamatan, desa WHERE data_sumur_bor.kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kabupaten=kabupaten.Id_kabupaten and kecamatan.id_kecamatan=desa.id_kecamatan";
            	$result=mysqli_query($con,$sql_lokasi);
				// ambil nama,lat dan lon dari table lokasi
            	while($data=mysqli_fetch_object($result)){
            		 ?>
             ['<?=$data->id_sumur_bor;?>', <?=$data->lat;?>, <?=$data->lon;?>],
       <?php
				}
		?>		
    
    ];
	var point
	var lokasi
    //Parameter Google maps
    var options = {
      zoom: 8, //level zoom
	  //posisi tengah peta
      center: new google.maps.LatLng(4.2952462,96.9974882),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	 if(navigator.geolocation) {
 
        function visitorLocation(position) {
             point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
			lokasi=position.coords.latitude+","+position.coords.longitude;
           
           
           
        }
        navigator.geolocation.getCurrentPosition(visitorLocation);
    }
	 // Buat peta di 
     map = new google.maps.Map(document.getElementById('peta'), options);
	 // Tambahkan Marker 
  
	  var infowindow = new google.maps.InfoWindow();

    var marker, i;
     /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		 icon: locations[i][3]
      });
     /* menambahkan event clik untuk menampikan
     	 infowindows dengan isi sesuai denga
	    marker yang di klik */
		
    		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() { 
				var id= locations[i][0];
	
				$.ajax({
					url : "get_info_databases_baru.php",
					data : "id=" +id+"&&l="+lokasi,
					success : function(data) {
							infowindow.setContent(data);
							infowindow.open(map, marker);
					}
				});		
			}
		})(marker, i));
	
    }

  };
function toggleLayers(i)
{

  if(layers[i].getMap()==null) {
     layers[i].setMap(map);
	 
  }
  else {
     layers[i].setMap(null);
  }
  document.getElementById('status').innerHTML += "toggleLayers("+i+") [setMap("+layers[i].getMap()+"] returns status: "+layers[i].getStatus()+"<br>";
}


	</script>
  </head>

  <body onload="initialize()">
    <!--header start-->
    

    <!--breadcrumbs start-->
    
    <!--container start-->
    <div class="white-bg">

        <!-- career -->
    <div class="container career-inner">
       <BR>
       <BR>
       <BR>
        <div class="row">
            <div class="col-md-9">
                <div class="candidate wow fadeInLeft">
                     <!-- PETA -->
					<div id="peta"  style="width: 100%; height: 590px; margin: 0 auto" ></div>
					
					
					
                </div>
                <hr>
                
            </div>
            <div class="col-md-3">
                <div class="candidate wow fadeInRight">
                    <!-- CEK -->
					<table border='0'>
					<tr>
					<td width='85%'> <input type="checkbox" id="layer_01" onclick="toggleLayers(0);"/> Batas Kabupaten</td>
					</tr>
					<tr>
					<td width='85%'><input type="checkbox" id="layer_01" onclick="toggleLayers(1);"/> Arah Aliran Air Tanah</td>
					</tr>
					<tr>
					<td width='85%'><input type="checkbox" id="layer_01" onclick="toggleLayers(2);"/> Peta Cekungan Air Tanah</td>
					</tr>
					</table >
					
                </div>
                <hr>
                
                
            </div>
        </div>
    <!-- career -->
       </div>
    </div>
    <!--container end-->

     <!--footer start-->
   

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/hover-dropdown.js"></script>
    <script defer src="../js/jquery.flexslider.js"></script>
    <script type="../text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/link-hover.js"></script>


     <!--common script for all pages-->
    <script src="../js/common-scripts.js"></script>


    <script src="../js/wow.min.js"></script>
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
