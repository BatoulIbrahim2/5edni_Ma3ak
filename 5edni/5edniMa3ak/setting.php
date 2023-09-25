<?php
session_start();
if($_SESSION['logged']==true){

require_once 'connection.php';


 $id = $_SESSION['id'];
 if (isset($_POST['password']) && isset($_POST['npass']) )
{
  $password=$_POST['password'];
  $npassword=$_POST['npass'];
          
  
  
 $query="SELECT password FROM passenger where id='".$id."'LIMIT 1 ";
      $result=  mysqli_query($con, $query);
      $r=  mysqli_num_rows($result);
      if($r==1){
      $row= mysqli_fetch_assoc($result);
     
   
   if(password_verify($password, $row['password'])){
       
 
$hashedpass= password_hash($npassword, PASSWORD_DEFAULT);
   
 if($password!=$hashedpass){
   
    if(password_verify($npassword, $hashedpass)){
            $sql = "update passenger set password = '$hashedpass' where id = '$id'";
            mysqli_query($con, $sql);
           header('location:mainpage.php');
 
           
}}}}}}else{
   header('location:login.php');
}

?>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   
     <div class="topnav" id="t">
        <a href="mainpage.php">HOME PAGE</a>
    <a href="setting.php">CHANGE PASSWORD</a>
    <a href="setting2.php">CHANGE PHONE NUMBER</a>
   
    <a href="logout.php">LOGOUT</a>
     </div><br><br> <div class="location">
         <form action="setting.php" method="post">
        <label for="password">Your Current Password:</label>
        <input type="password" id="password" name="password">
     
        
        <br>
        <label for="phone">Your new password:</label>
        <input type="password" id="npass" name="npass">
        <br>
	
     
        <input type="submit" value="Save"></form>
    </div>
<style>body {
    text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  

  }

form {
    width: 300px;
    margin: 0 auto;
}

label, input {
    display: block;
    margin-bottom: 10px;
    
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #CC99FF;
    color: #fff;
    border: none;
    cursor: pointer;
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
.location{
  margin: 0 auto;
  max-width: 600px;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* Set input properties */
input[type= password] {
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
</style>
</html>

