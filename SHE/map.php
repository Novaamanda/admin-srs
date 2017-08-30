<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
include "Login.php";
	}
	else
	{
	?>
<html>
<head>
	<style>
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
#map-canvas {
  height: 70%;
 margin-right: 420px;
 margin-left: 20px;
 
  
}
#right-panel {
        height: 100%;
        float: right;
        width: 350px;
		margin-right: 15px;
        overflow: auto;
      }
	</style>

	
	</head>

<body onLoad="getLocation()">
<div onload="initialize()"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNzvVNagvOYop23aHNjy5lur4H2UqjKMo"></script>

<div style="color:white;" id="lat"></div>
<div style="color:white;"id="long"></div>
<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('safety_kp');
mysql_select_db('ayanisystem');

$a=$_GET['latitude'];
$b=$_GET['longitude'];
$d=$_SESSION['namauser'];
$query = "select a.*,b.* from ayanisystem.user a join safety_kp.bandara b on a.kode_bandara=b.kode_bandara WHERE id_user='$d'";
$sql = mysql_query($query);
$tampil = mysql_fetch_array($sql);
$c=$tampil['lokasi_point'];

?>
<script>
var la, lo;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        //y.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    la = position.coords.latitude; // klo ini kesimpen di var atas 
	
    lo = position.coords.longitude;
}


function mapLocation() {
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var chicago = new google.maps.LatLng(<?php echo "$c"; ?>);
	
    var mapOptions = {
      zoom: 14,
      center: chicago
    };
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    directionsDisplay.setMap(map);
    google.maps.event.addDomListener(document.getElementById('routebtn'), 'click', calcRoute);
  }

  function calcRoute() {

    var start = new google.maps.LatLng(<?php echo "$c"; ?>);
    //var end = new google.maps.LatLng(38.334818, -181.884886);
    var end = new google.maps.LatLng(<?php echo "$a, $b" ?>);
    var request = {
      origin: start,
      destination: end,
        travelMode: 'DRIVING'
    };
	var directionsDisplay = new google.maps.DirectionsRenderer;
	
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
		directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

      } else {
        alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
      }
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
}
mapLocation();
</script>
<br>
<center>
  <input type="button" id="routebtn" value="Lihat Rute" />
  <input type="button" value="Close" onClick="window.close()">
  <!--<input type="button" value="Kembali" onClick="history.back(-1)" />-->
</center>
<br>
<br>
<div>
<div id="right-panel"></div>
<div id="map-canvas"></div>

</div>
</body>
</html>
<?php
	}
	?>
