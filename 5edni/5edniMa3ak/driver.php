<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';

$id = $_SESSION['id'];
echo<<<_b
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
_b;
if (isset($_POST['start_location']) && isset($_POST['end_location']) && isset($_POST['departure_time'])&& isset($_POST['time']) && isset($_POST['timer']) && isset($_POST['available_seat'])&& isset($_POST['price']) )
{ 

$startlocation = $_POST['start_location'];
$endlocation = $_POST['end_location'];
$departureTime = $_POST['departure_time'];
$Time = $_POST['time'];
$Timer = $_POST['timer'];
$availableSeat = $_POST['available_seat'];
$price = $_POST['price'];
$smoking = isset($_POST['smoking']);
$food = isset($_POST['food']);
$drink = isset($_POST['drink']);
$music = isset($_POST['music']);
$ac = isset($_POST['ac']);
$girls = isset($_POST['girls']);
$boys = isset($_POST['boys']);
if($smoking==1){
    $s1='Smoking';
}
else{
    $s1='No Smoking';
}
if($food==1){
    $f1='Food';
}else{
    $f1='No Food';
}
if($drink==1){
    $d1='Drink';
}else{
    $d1='No Drink';
}
if($music==1){
    $m1='Music';
}else{
    $m1='No Music';
}
if($ac==1){
    $a1='AC';
}
else{
    $a1='No AC';
}
if($girls==1){
$g1='Only Girls';}
 else if($boys==1){
    $g1='Only Boys';
 }
 else{
 $g1='Girls and Boys';
    }
  


$sql = "SELECT driver_id, departure_time,time FROM ride where driver_id='$id' and departure_time='$departureTime' ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // If there's a matching ride, redirect back to the form with a parameter indicating that a ride exists
    header("Location: driver.php?ride_exists=true");
    exit();
}
$sql2 = "SELECT p_id, date,time FROM reservations where p_id='$id' and date='$departureTime' and time='$Time' ";
$result2 = mysqli_query($con, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // If there's a matching ride, redirect back to the form with a parameter indicating that a ride exists
    header("Location: driver.php?reservation_exists=true");
    exit();
}
$sql_add_query = "INSERT INTO ride(driver_id,start_location,end_location,departure_time,time,timereturn,available_seat,price,smoking,food,drink,music,ac,gender)VALUES('$id','$startlocation','$endlocation','$departureTime','$Time','$Timer','$availableSeat','$price','$s1','$f1','$d1','$m1','$a1','$g1')";

 if(mysqli_query($con, $sql_add_query) == FALSE) {
     
         die("Could not add the new ride");


}
else{
    
    header('location:me.php');
}}}else{
   header('location:login.php');
}

?>
  <html>
    <head>
        
    <style>
            
        .tx img{
      width: 4.5%;
      text-align: left;
      float: left;  
    }
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
  max-width: 1000px;
  padding: 80px;
  background-color: #fff;
  border-radius: 10px;
  /*box-shadow: 0 0 10px rgba(0,0,0,0.1);*/
  border: 1px solid #ccc;
  text-decoration: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  background-color: white;
}

/* Set input properties */
input[type=text],[ type=date],[type=time]{
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
  margin-bottom: 5px;
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
  overflow: hidden
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
  }}
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
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

h1 {
  text-align: RIGHT;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

label,
input,
button {
  display: block;
  margin-bottom: 5px;
}

label {
  font-weight: bold;
}

input {
  width: 100%;
  padding: 5px;
}
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

label,
input,
button {
  display: block;
  margin-bottom: 5px;
}

label {
  font-weight: bold;
 color:CC66FF;
}

input {
  width: 100%;
  padding: 5px;
}
button {
  background-color:	#CC99FF;
  color: #fff;
  padding: 10px;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
.my-link {
  color: #CC99CC; /* default link color */
  text-decoration: none; /* remove default underline */
  transition: color 0.3s ease; /* add transition effect for color change */
}

/* Link hover styles */
.my-link:hover {
  color: #f00; /* change link color on hover */
  text-decoration: underline; /* add underline on hover */
}

/* Link clicked styles */
.my-link:active {
  color: #00f; /* change link color when clicked */
}
.photo {
    background-color: #fcfcfc;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 500px;
    margin: auto;
    text-align: center;
    font-family: arial;
    float: left;
    width: 20%;
    padding: 5px;
    clear: both;
    display: table;

  }
  .form {
    margin-left: 37%;
    width: 23%;
}
#end_location {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

#end_location option {
  padding: 5px;
}

#submit {
    border-radius: 50%;
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
}

.topnav a:hover {
  background-color:#f7f7f7;
  color: black;
}

.topnav a.active {
  background-color: #e1e3e2;
  color: black;
}


</style>
    </head>
   
    <body>
        <form method="POST" action="driver.php" >
	
	<br><br>
            <div class="location">
  <label for="start-location">Location:</label>
  <input type="text" id="start_location" name="start_location" placeholder="Enter the Star Location" required>
   
  <label for="endLocation">Destination(Campus):</label>
     
      <select id="end_location" name="end_location">
   <option value="default"selected>Select the campus</option>
  <option value="Saida">Saida</option>
  <option value="Nabatieh">Nabatieh</option>
  <option value="Khiara" >Khiara</option>
  <option value="Beirut" >Beirut</option>
  <option value="Tripolie" >Tripolie</option>
  <option value="Tyr" >Tyre</option>
  <option value="Reyak" >Reyak</option>
      </select>
      <label for="endLocation">Date:</label>
  <input type="date" id="departure_time" name="departure_time" required>
  <label for="endLocation">Departure Time:</label>
  <input type="time" id="time" name="time" required>
  <label for="endLocation">Return Time:</label>
  <input type="time" id="timer" name="timer" required>
  <label for="available-seats">Available Seats:</label>
  <input type="number" id="available_seat" name="available_seat"  max= "10" min="1" placeholder="Enter the Available Seats" required>
 
  <label for="price">Price($):</label>
  <input type="number" id="price" name="price"  max= "10" min="1" placeholder="Enter the Price" required>
  
  <label for="available-seats">additional-details:</label>
  <label for="smoking"> smoking </label><input type= "checkbox" name="smoking" id="smoking" value="smoking"> 
  <label for="food"> food</label><input type= "checkbox" name="food" id="food" value="food"> 
   <label for="drink"> drink</label><input type= "checkbox" name="drink" id="drink" value="drink"> 
    <label for="music"> music</label><input type= "checkbox" name="music" id="music" value="music"> 
    <label for="ac"> AC-heater</label> <input type= "checkbox" name="ac" id="ac" value="ac"> 
    <label for="girls"> Only Girls</label><input type= "checkbox" name="girls" id="girls" value="girls"> 
    <label for="boys"> Only Boys</label> <input type= "checkbox" name="boys" id="boys" value="boys"> 
  
  <br>
  
  <button type="submit">Create Ride</button>
  
</div>

        </form>
        <script>
        <?php
        // Check if there's a ride with the same start and end locations
        if (isset($_GET['ride_exists'])) {
            echo "alert('You have a ride at the same time!');";
        }
        if (isset($_GET['reservation_exists'])) {
            echo "alert('You have a reservation at the same time!if you to add this ride you want to delete the reservation before');";
        }
        ?>
    </script>
       
    </body>
</html>

