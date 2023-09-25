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
body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

  }
  .logo {
  
  /* Place the logo first */
}
.img.logo{
    /*width: 4px;*/
}


/*div.polaroid {
    
    justify-content: center;
  width: 40%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  text-align: center;
  float: left;
  align-items: center;
  background-color: 		#FFFFFF	;
  
  
}*/
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
@font-face {
  font-family: 'CustomFont';
  src: url('path/to/font.woff2') format('woff2'),
       url('path/to/font.woff') format('woff');
  /* Add more font formats if necessary */
}

/*div.container {
  text-align: center;
  padding: 10px 20px;
  color: #000000;
  
}*/
img {
      display: block;
      margin: 0 auto;
      width: 40%;
    }
    p{
        text-align: center;
        size: auto;
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
.chat-icon {
  position: fixed;
  bottom: 10px;
  right: 20px;
  width: 10%
}

.chat-icon a {
  
  width:30%;
/*  height:50px;
  border-radius: 10%;
  background-color: #007bff;
  text-align: center;
  line-height: 50px;
  color: #fff;
  text-decoration: none;
  font-size: 20px;*/
  transition: background-color 0.3s ease;
}

.chat-icon a:hover {
  background-color: #0062cc;
}
.chat-icon2 {
  position: fixed;
  bottom: 650px;
  right: 20px;
  width: 10%
}

.chat-icon2 a {
  
  width:30%;
/*  height:50px;
  border-radius: 10%;
  background-color: #007bff;
  text-align: center;
  line-height: 50px;
  color: #fff;
  text-decoration: none;
  font-size: 20px;*/
  transition: background-color 0.3s ease;
}

.chat-icon2 a:hover {
  background-color: #0062cc;
}
/*.container1 {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50vh;  Adjust as needed 
}

.box {
  width: 700px;  Adjust as needed 
  height: 200px;  Adjust as needed 
  background-color: #ccc;  Adjust as needed 
  margin: 0px;  Adjust as needed 
  
}*/
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40vh;
  text-align: center;
  color: black;
  font-weight: bold;
  font-size: 150%;
  font-family: Brush Script MT,cursive;
}

.box {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 700px;
  height: 300px;
  margin: 10px;
  border: 1px solid #ccc;
  text-decoration: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  background-color: white;
  
}

.box img {
  max-width: 100%;
  max-height: 100%;
}
p { font-family: "Playfair Display", "Didot", "Times New Roman", Times, serif; }

</style>
</head><body>
    
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
   <div class="chat-icon2">
       <a href="notification.php"><img src="notification.png" alt="notification"></a>
   </div><br><br>  <h1> WELCOME TO 5EDNI MA3AK</h1><br><br>
     <div class="container">
    <p class>
      <a href="passenger.php" class="box">
     <img src="add.png" >
 </a>
            Join a ride
</p> 
  


    
    <p>
        <a href="driver.php" class="box">
     <img src="addcar.png">
 </a>Add a ride
</p>
 
  </div>
    
<div class="chat-icon">
  <a href="chatadmin.php"><img src="ch.png" alt="Chat with admin"></a>
</div>
</body>
</html>

