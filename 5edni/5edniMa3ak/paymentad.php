<?php

session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
echo<<<_END

<div class="topnav" id="t">
   <a href="radmin.php">THE RIDES</a>

    <a href="padmin.php">THE PASSENGERS</a>
    
     <a href="vadmin.php">THE RESERVATION</a>
     <a href="cadmin.php">CAR</a>
     <a href="message.php">YOUR MESSAGE</a>
     <a href="paymentad.php">PAYMENT</a>
     <a href="paiding.php">PAID</a>
    <a href="logout.php">LOGOUT</a>
	
   
        </div><br>
<br></br>

      
_END;

$id = $_SESSION['id'];
if (isset($_POST['userid']) && isset($_POST['semester']) )
{ 
    $user=$_POST['userid'];
    $month=$_POST['semester'];
  

echo<<<_END
    
<br></br>
   <table>
<tr><th>id</th><th>Name</th><th>Phone Number</th><th>email</th><th>Payment</th><th>Add new Payment</th></tr>


_END;

$query = "SELECT id,FullName,phoneNumber,email FROM passenger where id='$user' ";
$result = mysqli_query($con, $query);
$r = mysqli_num_rows($result);
for ($i = 0; $i < $r; $i++) {
   
    $row = mysqli_fetch_assoc($result);
   
    echo"<tr><td>" .$row['id']."</td><td>". $row['FullName'] .  "</td><td>" . $row['phoneNumber'] . "</td><td>" . $row['email'] . "</td><td><a href ='py2.php?id=" . $row['id'] . "'><img src='payment.png' "
            . "height='40px' width='40px'></a></td><td><a href ='addpy.php?id=" . $row['id'] . "&&semester=".$month."'><img src='addpym.png' "
            . "height='40px' width='40px'></a></td>"
    . "</tr>";
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

input[type="text"] {
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
  <title>User Search</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form method="POST" action="paymentad.php">
  <div class="container">
    <h1>Add Payment</h1>
    <form>
      <input type="text" id="userid" name="userid" placeholder="Enter user ID">
      <br><br>
      <select name="semester" id="semester">
  <option value="Spring22-23"selected>Spring22-23</option>
  <option value="Fall23-24">Fall23-24</option>
  <option value="Spring23-24">Spring23-24</option>
  <option value="Fall24-25" >Fall24-25</option>
      </select><br><br>
      <button type="submit" >Search</button>
      
    </form>
    <div id="searchResults"></div>
  </div>
        <script src="script.js"></script>
</body>
</html>


