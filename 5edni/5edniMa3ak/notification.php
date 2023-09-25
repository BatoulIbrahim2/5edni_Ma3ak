<?php

session_start();
if ($_SESSION['logged'] == true) {
  require_once 'connection.php';
  $id = $_SESSION['id'];
} else {
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Notifications</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

  }
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
}

/* Define the light blue color */
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
  background-color: #99CC99;
  color: #444;
  font-weight: bold;
  text-transform: uppercase;
}

td {
  background-color: #fff;
}

tr:nth-child(even) {
  background-color: #9933CC;
}

td:first-child {
  color: #9933CC;
}

td:nth-child(2) {
  color: #9933CC;
}

td:nth-child(3) {
  color: #9933CC;
}

td:last-child {
  color: #9933CC;
}
 .tx img{
      width: 4.5%;
      text-align: left;
      float: left;  
    }
    .topnav a.img{
        width: 4.5%;
      text-align: right;
      float: right; 
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
	
   
     </div> 
  <div class="container">
    <!--<h1>Notifications</h1>-->
    <ul>
      <?php
        $query = "SELECT * FROM notification where id='$id'";
        $result = mysqli_query($con, $query);
        $r = mysqli_num_rows($result);
        if ($r == 0) {
          echo "<br><h1>NO NOTIFICATION</h1>";
        } else {
            echo<<<_B
            <table><tr><th>Notification</th></tr>
            _B;
          for ($i = 0; $i < $r; $i++) {
            $row = mysqli_fetch_assoc($result);
            
            echo"<tr><td>".$row['message']."</td></tr>";
            
          }
          echo"</table>";
        }
        $query2 = "SELECT * FROM chat where user2='$id'";
        $result2 = mysqli_query($con, $query2);
        $r2 = mysqli_num_rows($result2);
        if ($r2 != 0) {
         
            echo<<<_B
            <table><tr><th>Chat</th><th></th></tr>
            _B;
          for ($i = 0; $i < $r2; $i++) {
            $row2 = mysqli_fetch_assoc($result2);
            $u1=$row2['user1'];
            echo"<tr><td>new Chat from ".$row2['user1']."</td><td><a href ='chat.php?d_id=" . $u1 . "'><img src='arrow.png' "
            . "height='20px' width='20px'></a></td></tr>";
            
          }
          echo"</table>";
        }
      ?>
    </ul>
  </div>
</body>
</html>

