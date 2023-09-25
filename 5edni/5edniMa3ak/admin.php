<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';


$id = $_SESSION['id'];}else{
   header('location:login.php');
}

?>
<html>
    
    <head>
        
        <style>
            body{
               background-image: url(logo.jpg);
               background-repeat: no-repeat;
               background-position: center;
    background-size:40%;
    float: center;
    align-content: center;
    align-items: center;
   
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
    <body><div class="topnav" id="t">
    <a href="radmin.php">THE RIDES</a>

    <a href="padmin.php">THE PASSENGERS</a>
    
     <a href="vadmin.php">THE RESERVATION</a>
     <a href="cadmin.php">CAR</a>
     <a href="message.php">YOUR MESSAGE</a>
     <a href="paymentad.php">PAYMENT</a>
     <a href="paiding.php">PAID</a>
    <a href="logout.php">LOGOUT</a>
	
   
  </div>
    <form method="POST" action="admin.php" enctype='multipart/form-data'>
 </body>
    </head>
</html>
