<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
 $id = $_SESSION['id'];
$p_id = $_GET["p_id"];



 
 echo<<<_END


_END;
$query2 = "select * from location where pid = '$p_id'";
$result2 = mysqli_query($con, $query2);
$r2 = mysqli_num_rows($result2);
for ($i = 0; $i < $r2; $i++) {
   
    $row2 = mysqli_fetch_assoc($result2);
   
    echo"<script>
    var map, marker;

    function initMap() {
      var myLatLng = {lat:".$row2['latitude'].", lng: ".$row2['longitude']."};
      map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 20
      });
      marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true
      });
    }

    function updateLocation() {
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      document.getElementById(".$row2['latitude'].").value = lat;
      document.getElementById(".$row2['longitude'].").value = lng;
    }
  </script>";
    echo "<script>
    google.maps.event.addListener(marker, 'dragend', function() {
      updateLocation();
    });
  </script>";
}
}else{
   header('location:login.php');
}
?>

<html>
<head>
  <title>Location Form</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfqOGkvjzVj4ByijRmyvrNJc6LVh_3uMI"></script>
<!--  <script>
    var map, marker;

    function initMap() {
      var myLatLng = {lat: 33.8547, lng: 35.8623};
      map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 8
      });
      marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true
      });
    }

    function updateLocation() {
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      document.getElementById("lat").value = lat;
      document.getElementById("lng").value = lng;
    }
  </script>-->
  <style>
   #map {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
#map-container {
  width: 100%;
  height: 500px; /* Adjust the height as needed */
  position: relative;
}
.map-controls {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 1; /* Ensure controls are above the map */
}
.marker {
  width: 20px;
  height: 20px;
  background-color: red;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.info-window {
  max-width: 250px;
  padding: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.info-window h3 {
  margin-top: 0;
  font-size: 18px;
}

.info-window p {
  margin-bottom: 0;
}


  </style>
</head>
<body onload="initMap()">
  <h1>Location Form</h1>
  <form action="location.php" method="post">
    <div id="map"></div>
    
  </form>
  
</body>
<style>#map {
  height: 400px;
}
</style>
</html>