<?php
                
  session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
  $id = $_SESSION['id'];
  $currentDate = date('Y-m-d');

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
_END;

                $query="SELECT * FROM reservations where d_id='$id' and date >= '$currentDate'  ";
                $result=  mysqli_query($con, $query);
                $r= mysqli_num_rows($result);
                if($r==0){
                    echo"<br><h1>NO ONE GOING WITH YOU!</h1>";
                }else{
                    echo<<<_END
               <br></br><table >
                <tr><th>Id of the reservation</th><th>User Id</th><th>User name</th><th>Start Location</th><th>End Location</th><th>Date</th><th>Time</th><th>Location</th><th>More Information</th><th>WatsApp</th><th>Delete</th></tr>

_END;
                for($i=0;$i<$r;$i++)
                {
                $row=mysqli_fetch_assoc($result);
                $w=$row['p_id'];
                $query2="SELECT * FROM passenger where id='$w'";
                $result2=  mysqli_query($con, $query2);
                $r2= mysqli_num_rows($result2);
                $row2=mysqli_fetch_assoc($result2);
                echo"<tr><td>".$row['id']."</td><td>".$row['p_id']."</td><td>".$row2['FullName']."</td><td>".$row['start']."</td><td>".$row['end']."</td><td>".$row['date']."</td><td>".$row['time']."</td>"
                     . "<td><a href ='location.php?p_id=".$row['p_id']."'><img src='location.png' hieght='20px' width='20px'></a></td><td><a href ='information.php?id=".$row['p_id']."'><img src='information2.png' hieght='20px' width='20px'></a></td><td><a href ='https://wa.me/".$row2['phoneNumber']."'><img src='whatsapp.png' hieght='50px' width='30px'></a></td><td><a href ='deletewithyou.php?id=".$row['id']."&& d_id=".$row['d_id']."&& dt=".$row['date']."&& time=".$row['time']."'><img src='delete.png' hieght='20px' width='20px'></a></td>"
                        . "</tr>";

                }}
            

            echo"</table>";
}else{
   header('location:login.php');
}

                
        




?><!DOCTYPE html>
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
input[type=text], input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

/* Set button properties */
button {
  background-color: #4CAF50;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

/* Set button hover properties */
button:hover {
  background-color: #45a049;
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
.tx img{
      width: 4.5%;
      text-align: left;
      float: left;  
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
  color: #ff69b4;
}

td:nth-child(3) {
  color: #228b22;
}

td:last-child {
  color: #ff8c00;
}



    </style>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
  
<body>
    <form method="POST" action="withyou.php" enctype='multipart/form-data'>
 
  
  

   </form>
</body>
  
</html>
    



