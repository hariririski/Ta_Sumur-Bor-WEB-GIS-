<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Latihan Google  map</title>
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
    <table width="100%" border="0">
	<tr>
	<td width='85%'><div id="peta"  style="width: 100%; height: 590px; margin: 0 auto" ></div></td>
	<td>
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
	
	
	

	
	
	</td>
	</tr>
    </table>
    
	
	
  </body>
</html>