<?php
session_start();

if ($_SESSION['logged'] == true) {
  require_once 'connection.php';

  $id = $_SESSION['id'];

  if (isset($_POST['latitude']) && isset($_POST['longitude']) && $_POST['street'] && isset($_POST['city']) && isset($_POST['building'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
     $street = $_POST['street'];
    $city = $_POST['city'];
     $building = $_POST['building'];

    $sql_add_query = "INSERT INTO location(pid, latitude, longitude,street,city,building) VALUES ('$id','$latitude', '$longitude','$street','$city', '$building')";
    $add = mysqli_query($con, $sql_add_query);

    if ($add === FALSE) {
      die("Could not add the new record");
    }else{
       header('location: mainpage.php'); 
    }
  } 
} else {
  header('location: login.php');
}
?>
<html>
<head>
  <title>Longitude and Latitude</title>
</head>
<body>
 <style>
     body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

  }
.topnav {
  overflow: hidden;
  background-color:white;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  margin-bottom: 20px;
}

.topnav a:hover {
  background-color:#f7f7f7;
  color: black;
}

.topnav a.active {
  background-color: #e1e3e2;
  color: black;
}
.topnav img{
width: 15%;
  text-align: left;
 float: left;
    
}
  form {
    max-width: 400px;
    margin: 0 auto;
  }

  h1 {
  font-size: 36px; /* Adjust the font size as needed */
  font-weight: bold;
  color: #333; /* Choose a suitable color */
  text-align: center;
  margin: 20px 0; /* Add margin to create spacing around the heading */
  text-transform: uppercase; /* Optional: Transform the text to uppercase */
  letter-spacing: 2px; /* Optional: Adjust letter spacing for emphasis */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle shadow */
  
  font-family: Brush Script MT,cursive;


}

  label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
    font-size: 120%;
    font-family: Brush Script MT,cursive;
  }

  input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }

  button[type="submit"]:hover {
    background-color: #45a049;
  }
  .tx img{
      width: 4.5%;
      text-align: left;
      float: left;  
    }
</style>
<div class="tx" id="t"> <img src="logo.jpg" ></div>
     <div class="topnav" id="t">
   <a href="mainpage.php">HOME PAGE</a>
    <a href="me.php">YOUR RIDES</a>
    
    <a href="rides.php">YOUR RESERVATION</a>
    <a href="vcar.php">CAR</a>
    <a href="withyou.php">PASSENGERS</a>
     <a href="loc1.php">LOCATION</a>
       <a href="payment.php">PAYMENT</a>
    <a href="mainsetting.php">SETTING</a>
    <a href="logout.php">LOGOUT</a>
	
   
     </div><br><br>

<form method="POST" action="loc1.php">
     
  
  
  <h1>Enter Your Location</h1>

  <label for="longitude">Longitude:</label>
  <input type="text" id="longitude" name="longitude" placeholder="Enter longitude" />

  <label for="latitude">Latitude:</label>
  <input type="text" id="latitude" name="latitude" placeholder="Enter latitude" />
  <label for="longitude">Add Street:</label>
  <input type="text" id="street" name="street" placeholder="Enter your street name" />

  <label for="latitude">Add City</label>
  <input type="text" id="city" name="city" placeholder="Enter city name" />
  <label for="latitude">Building</label>
  <input type="text" id="building" name="building" placeholder="Enter the Building Number" />

  <button type="submit">Save</button>
</form>


  <script>
    function getLocation() {
      var longitudeInput = document.getElementById("longitude");
      var latitudeInput = document.getElementById("latitude");

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          var longitude = position.coords.longitude;
          var latitude = position.coords.latitude;

          longitudeInput.value = longitude;
          latitudeInput.value = latitude;
        });
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    // Call getLocation() when the page loads
    window.onload = getLocation;
  </script>
</body>
