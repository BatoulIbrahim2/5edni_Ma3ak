<?php

session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';


$id = $_SESSION['id'];
if (isset($_POST['userid']) && isset($_POST['date']) )
{ 
    $user=$_POST['userid'];
    $month=$_POST['date'];
    
  

$query2 = "SELECT id,driver_id,start_location,end_location,departure_time,time,timereturn,available_seat,price FROM ride where driver_id='$user' and  departure_time='$month'";
$result2 = mysqli_query($con, $query2);
$r2 = mysqli_num_rows($result2);
if($r2==0){
    echo"<h1>NO RESULT!</h1>";
}else{
    echo<<<_END
<br></br><table>
<tr><th>id</th><th>Name</th><th>Start Location</th><th>End Location</th><th>Date</th><th>Start Time</th><th>Return Time</th><th>Available Seat</th><th>Price</th></tr>


_END;
for ($i = 0; $i < $r2; $i++) {
   
    $row2 = mysqli_fetch_assoc($result2);
   $query3 = "SELECT FullName FROM passenger where id='$user'";
$result3 = mysqli_query($con, $query3);
$r3 = mysqli_num_rows($result3);
 $row3 = mysqli_fetch_assoc($result3);
    echo"<tr><td>" .$row2['driver_id']."</td><td>". $row3['FullName'] .  "</td><td>" . $row2['start_location'] . "</td><td>" . $row2['end_location'] . "</td><td>" . $row2['departure_time'] . "</td><td>" . $row2['time'] . "</td><td>" . $row2['timereturn'] . "</td><td>" . $row2['available_seat'] . "</td><td>" . $row2['price'] . "</td>"
    . "</tr>";
}
echo "</table";
}





} 

}else{
   header('location:login.php');
}?>
<!DOCTYPE html>
<html>
    <style>.container {
  width: 400px;
  margin: 0 auto;
  text-align: center;
}

h1 {
  margin-top: 50px;
}

form {
  margin-top: 30px;
}

input[type="text"],[ type=date] {
  padding: 10px;
  width: 200px;
}

button {
  padding: 10px 20px;
}

#searchResults {
  margin-top: 30px;
  font-weight: bold;
}
body {
  background-color: #CCCCCC;
  font-family: Arial, sans-serif;
   text-align: center;
   background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
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
/* Styling input fields */
input[type="text"],input[type="submit"]
{
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 250px;
}

/* Styling select dropdown */
select {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 250px;
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

/* Styling when inputs/selects are focused */
/*input:focus,
select:focus {
  outline: none;
  border-color: #4d90fe;
  box-shadow: 0 0 5px #4d90fe;
}*/

/* Styling when inputs/selects are hovered */
/*input:hover,
select:hover {
  border-color: #999;
}*/

/* Styling for submit button */
/*input[type="submit"] {
  padding: 10px 20px;
  background-color: #4d90fe;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}*/

/* Styling for submit button when hovered */
/*input[type="submit"]:hover {
  background-color: #357ae8;
}*/


</style>
<head>
  <title>Ride Search</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form method="POST" action="searchride.php">
  <div class="container">
    <h1>Ride Search</h1>
    <form>
      <input type="text" id="userid" name="userid" placeholder="Enter user ID">
      <br><br><input type="date" id="date" name="date">
      <br><br>
      
      <button type="submit" >Search</button>
      
    </form>
    <div id="searchResults"></div>
  </div>
        <script src="script.js"></script>
</body>
</html>
