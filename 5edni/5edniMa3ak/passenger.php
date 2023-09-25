<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
echo<<<_END



      
_END;

$id = $_SESSION['id'];
if ( isset($_POST['startLocation']) && isset($_POST['endLocation']) && isset($_POST['departure_time']) )
{ 
    $start=$_POST['startLocation'];
     $end=$_POST['endLocation'];
     $departureTime = $_POST['departure_time'];

echo<<<_END
    
<br></br><table>
<tr><th>id</th><th>Driver id</th><th>driver Name</th><th>Location</th><th>Destination</th><th>Date</th><th>Start Time</th><th>Return Time</th><th>Available Seat</th><th>price($)</th><th>additional-details</th><th>Add</th><th>view rating</th></tr>


_END;
$query = "SELECT id,driver_id,start_location, end_location, departure_time,time,timereturn,available_seat,price,smoking,food,drink,music,ac,gender  FROM ride where  start_location='$start' AND end_location='$end' AND departure_time='$departureTime' ";
$result = mysqli_query($con, $query);
$r = mysqli_num_rows($result);
for ($i = 0; $i < $r; $i++) {
   
    $row = mysqli_fetch_assoc($result);
    $n=$row['driver_id'];
   $query2 = "SELECT FullName FROM passenger where id='$n' ";
   $result2 = mysqli_query($con, $query2);
    $r2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
    echo"<tr><td>" .$row['id']."</td><td>". $row['driver_id'] .  "</td><td>". $row2['FullName'] .  "</td><td>" . $row['start_location'] . "</td><td>" . $row['end_location'] . "</td><td>" . $row['departure_time'] .
    "</td><td>" . $row['time'] . "</td><td>" . $row['timereturn'] . "</td><td>" . $row['available_seat'] . "</td><td>" . $row['price'] . "</td><td>" . $row['smoking'] . "<br>" . $row['food'] . "<br>" . $row['drink'] . "<br>" . $row['music'] . "<br>" . $row['ac'] ."<br>".  $row['gender'] ."<td><a href ='add.php?id=" . $row['id'] . "'><img src='add.png' "
            . "height='40px' width='40px'></a></td><td><a href ='viewrate.php?driver_id=" . $row['driver_id'] . "'><img src='star1.png' "
            . "height='40px' width='60px'></a></td>"
    . "</tr>";
}


} 

else if ( isset($_POST['endLocation']) && isset($_POST['departure_time']) )
{ 

     $end=$_POST['endLocation'];
     $departureTime = $_POST['departure_time'];

echo<<<_END
    
<br></br><table>
<tr><th>id</th><th>Driver id</th><th>driver Name</th><th>Location</th><th>Destination</th><th>Date</th><th>Start Time</th><th>Return Time</th><th>Available Seat</th><th>price($)</th><th>additional-details</th><th>Add</th><th>view rating</th></tr>


_END;
$query = "SELECT id,driver_id,start_location, end_location, departure_time,time,timereturn,available_seat,price,smoking,food,drink,music,ac,gender  FROM ride where end_location='$end'AND departure_time='$departureTime' ";
$result = mysqli_query($con, $query);
$r = mysqli_num_rows($result);
for ($i = 0; $i < $r; $i++) {
   
    $row = mysqli_fetch_assoc($result);
    $n=$row['driver_id'];
   $query2 = "SELECT FullName FROM passenger where id='$n' ";
   $result2 = mysqli_query($con, $query2);
    $r2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
    echo"<tr><td>" .$row['id']."</td><td>". $row['driver_id'] .  "</td><td>". $row2['FullName'] .  "</td><td>" . $row['start_location'] . "</td><td>" . $row['end_location'] . "</td><td>" . $row['departure_time'] .
    "</td><td>" . $row['time'] . "</td><td>" . $row['timereturn'] . "</td><td>" . $row['available_seat'] . "</td><td>" . $row['price'] . "</td><td>" . $row['smoking'] . "<br>" . $row['food'] . "<br>" . $row['drink'] . "<br>" . $row['music'] . "<br>" . $row['ac'] ."<br>".  $row['gender'] ."<td><a href ='add.php?id=" . $row['id'] . "'><img src='add.png' "
            . "height='40px' width='40px'></a></td><td><a href ='viewrate.php?driver_id=" . $row['driver_id'] . "'><img src='star1.png' "
            . "height='40px' width='60px'></a></td>"
    . "</tr>";
}


} 

}else{
   header('location:login.php');
}
?>

<html>
    <head>
        
    <style>
body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

  }

        .table-container {
            border-spacing: 0;
            text-align: center;    
            outline: none;
            border: none;
            display: inline-flex;
           background-color: #fff;
        }
        .img-td {
            width: 200px;
            height: 200px;}

/* Set location properties */
.location{
  margin: 0 auto;
  max-width: 600px;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  border: 1px solid #ccc;
  text-decoration: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  background-color: white;
}
#endLocation {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

#endLocation option {
  padding: 5px;
}
/* Set input properties */
input[type=text],[ type=date]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

/* Set button properties */
button {
  background-color: #CC99FF	;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

/* Set button hover properties */
button:hover {
  background-color: #CCCCCC;
}

/* Set form properties */
form {
  display: flex;
  flex-direction: column;
}

/* Set label properties */
label {
  font-weight: bold;
  margin-bottom: 10px;
}
* {
  box-sizing: border-box;
  margin:0;
  padding:0;
  
}
/*body {
  background:#DDD;
  font-family: 'Inknut Antiqua', serif;
  font-family: 'Ravi Prakash', cursive;
  font-family: 'Lora', serif;
  font-family: 'Indie Flower', cursive;
  font-family: 'Cabin', sans-serif;
}*/
div.container {
  max-width: 1350px;
  margin: 0 auto;
  overflow: hidden;
      
}
.upcomming {
  font-size: 45px;
  text-transform: uppercase;
  border-left: 14px solid rgba(255, 235, 59, 0.78);
  padding-left: 12px;
  margin: 18px 8px;
  
}
.container .item {
  width: 48%;
  float: left;
  padding: 0 20px;
  background: #fff;
  overflow: hidden;
  margin: 10px
}
.container .item-right, .container .item-left {
  float: left;
  padding: 20px 
}
.container .item-right {
  padding: 79px 50px;
  margin-right: 20px;
  width: 25%;
  position: relative;
  height: 286px
}
.container .item-right .up-border, .container .item-right .down-border {
    padding: 14px 15px;
    background-color: #ddd;
    border-radius: 50%;
    position: absolute
}
.container .item-right .up-border {
  top: -8px;
  right: -35px;
}
.container .item-right .down-border {
  bottom: -13px;
  right: -35px;
}
.container .item-right .num {
  font-size: 60px;
  text-align: center;
  color: #111
}
.container .item-right .day, .container .item-left .event {
  color: #555;
  font-size: 20px;
  margin-bottom: 9px;
}
.container .item-right .day {
  text-align: center;
  font-size: 25px;
}
.container .item-left {
  width: 71%;
  padding: 34px 0px 19px 46px;
  border-left: 3px dotted #999;
} 
.container .item-left .title {
  color: #111;
  font-size: 34px;
  margin-bottom: 12px
}
.container .item-left .sce {
  margin-top: 5px;
  display: block
}
.container .item-left .sce .icon, .container .item-left .sce p,
.container .item-left .loc .icon, .container .item-left .loc p{
    float: left;
    word-spacing: 5px;
    letter-spacing: 1px;
    color: #888;
    margin-bottom: 10px;
}
.container .item-left .sce .icon, .container .item-left .loc .icon {
  margin-right: 10px;
  font-size: 20px;
  color: #666
}
.container .item-left .loc {display: block}
.fix {clear: both}
.container .item .tickets, .booked, .cancel{
    color: #fff;
    padding: 6px 14px;
    float: right;
    margin-top: 10px;
    font-size: 18px;
    border: none;
    cursor: pointer
}
.container .item .tickets {background: #777}
.container .item .booked {background: #3D71E9}
.container .item .cancel {background: #DF5454}
.linethrough {text-decoration: line-through}
@media only screen and (max-width: 1150px) {
  .container .item {
    width: 100%;
    margin-right: 20px
  }
  div.container {
    margin: 0 20px auto
  }
}
 .tx img{
      width: 4.5%;
      text-align: left;
      float: left;  
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
table {
  border-collapse: separate;
  border-spacing: 0 10px;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  font-size: 16px;
  color: #444;
}

th, td {
  text-align: center;
  padding: 10px;
}

th {
  background-color: #f5f5f5;
  color: #444;
  font-weight: bold;
  text-transform: uppercase;
}

td {
  background-color: #fff;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

td:first-child {
  color: #1e90ff;
}

td:nth-child(2) {
  color: #9933CC;
}

td:nth-child(3) {
  color: #33CC00;
}

td:last-child {
  color: #ff8c00;
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

</style>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
    <form method="POST" action="passenger.php" enctype='multipart/form-data'> <br>
  <div class="location">
    <h1>Ride Search</h1>
    <form>
      <label for="startLocation">Location</label>
      <input type="text" id="startLocation" name="startLocation" placeholder="Enter start location">
      
      <label for="endLocation">Destination(Campus):</label><br><br>
     
      <select id="endLocation" name="endLocation">
   <option value="default"selected>Select the campus</option>
  <option value="Saida">Saida</option>
  <option value="Nabatieh">Nabatieh</option>
  <option value="Khiara" >Khiara</option>
  <option value="Beirut" >Beirut</option>
  <option value="Tripolie" >Tripolie</option>
  <option value="Tyr" >Tyr</option>
  <option value="Reyak" >Reyak</option>
      </select><br><br>
      <label for="endLocation">Date:</label><br>
  <input type="date" id="departure_time" name="departure_time" required>
      <button type="submit">Search</button><br></br>
    </form>
  </div><br></br>



</body>
             </html>