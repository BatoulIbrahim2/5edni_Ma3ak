<?php

session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
echo<<<_b
<div class="topnav" id="t">
   <a href="radmin.php">THE RIDES</a>

    <a href="padmin.php">THE PASSENGERS</a>
    
     <a href="vadmin.php">THE RESERVATION</a>
     <a href="cadmin.php">CAR</a>
     <a href="message.php">YOUR MESSAGE</a>
     <a href="paymentad.php">PAYMENT</a>
     <a href="paiding.php">PAID</a>
    <a href="logout.php">LOGOUT</a>
     <a href="searchcar.php"> <div class="logo">
        <img src="search.png" alt="Logo" width="4%">
        </div></a>	
</div>    
_b;

$id = $_SESSION['id'];

$query = "SELECT CarNumber,id, color,type  FROM car ";
$result = mysqli_query($con, $query);
$r = mysqli_num_rows($result);
if($r==0){
    echo"<br><h1>NO RESULT!</h1>";
}else{
    echo<<<_END
     <br><br>
<br></br><table>
<tr><th>Id</th><th>Car Number</th><th>Color</th><th>type</th><th>ID of Car</th><th>Delete</th></tr>


_END;
for ($i = 0; $i < $r; $i++) {
   
    $row = mysqli_fetch_assoc($result);
    $c=$row['CarNumber'];
    $query2 = "SELECT image_url  FROM images where id ='$c' ";
$result2 = mysqli_query($con, $query2);
$r2 = mysqli_num_rows($result2);
   $row2 = mysqli_fetch_assoc($result2);
    echo"<tr><td>" .$row['id']."</td><td>" .$row['CarNumber']."</td><td>". $row['color'] .  "</td><td>" . $row['type'] . "</td><td class='img-td'><img src='uploads/".$row2['image_url']."'height='150px' width='150px'/></td><td><a href ='deletecar.php?CarNumber=" . $row['CarNumber'] . "'><img src='delete.png' "
            . "height='20px' width='20px'></a></td>"
    . "</tr>";
}}






} 

else{
   header('location:login.php');
}
?>
<html>
    
    <head>
        
        <style>
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
}

/* Set input properties */
input[type=text], input[type=date],input[type=datetime-local] {
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
body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

  }
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
  }
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
  color: #ff69b4;
}

td:nth-child(3) {
  color: #228b22;
}

td:last-child {
  color: #ff8c00;
}
</style>
    <body>
	
   
  </body>
    </head>
</html>