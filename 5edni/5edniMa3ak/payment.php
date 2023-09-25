<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
 $id = $_SESSION['id'];


  
 
 echo<<<_END
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
<br></br>

_END;
$query2 = "SELECT id,user_id,name,phone,email,month,value,paid FROM payment where user_id='$id' ";
$result2 = mysqli_query($con, $query2);
$r2 = mysqli_num_rows($result2);
if($r2==0){
    echo"<h1>You didn't make any payment,</h1><br><h1> please head to the administration office to pay them</h1>";
}else{
echo<<<B
    <table>
<tr><th>id</th><th>Name</th><th>Phone Number</th><th>email</th><th>month</th><th>Amount</th><th>Payment</th></tr>

B;
for ($i = 0; $i < $r2; $i++) {
   
    $row2 = mysqli_fetch_assoc($result2);
   
    echo"<tr><td>" .$row2['user_id']."</td><td>". $row2['name'] .  "</td><td>" . $row2['phone'] . "</td><td>" . $row2['email'] . "</td><td>" . $row2['month'] . "</td><td>" . $row2['value'] . "</td><td>" . $row2['paid'] . "</td>"
    . "</tr>";
}
}}else{
   header('location:login.php');
}
 
 
 
  
  ?>
<html>
    <style> 
       body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

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
.tx img{
      width: 4.5%;
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
  color: #ff69b4;
}

td:nth-child(3) {
  color: #228b22;
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


}</style>
    <body>
       
  
  
    </body>
</html>