<?php
session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
 $id = $_SESSION['id'];
$user = $_GET["id"];
$paid="unpaid";

  $item_query = "select * from passenger where id = '$user'";
 
 $result=  mysqli_query($con, $item_query);
 $row = mysqli_fetch_assoc($result);
 
 
 
 
$query2 = "SELECT id,user_id,name,phone,email,month,value,paid FROM payment where user_id='$user' and paid='$paid'";
$result2 = mysqli_query($con, $query2);
$r2 = mysqli_num_rows($result2);
if($r2==0){
    echo"<h1>NO RESULT!</h1>";
}else{
    echo<<<_END
<br></br><table>
<tr><th>id</th><th>Name</th><th>Phone Number</th><th>email</th><th>month</th><th>Amount</th><th>Paid</th></tr>


_END;
for ($i = 0; $i < $r2; $i++) {
   
    $row2 = mysqli_fetch_assoc($result2);
   
    echo"<tr><td>" .$row2['user_id']."</td><td>". $row2['name'] .  "</td><td>" . $row2['phone'] . "</td><td>" . $row2['email'] . "</td><td>" . $row2['month'] . "</td><td>" . $row2['value'] . "</td><td><a href ='py3.php?id=" . $row2['id'] . "'><img src='p2.png' "
            . "height='40px' width='40px'></a></td>"
    . "</tr>";
}
}
}else{
   header('location:login.php');
}
 
 
  
  ?>
<html>
<head>
  <title>Set Month for Students</title>
  <style> 
      body{
          background-color: 	#CCCCCC;
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


}

</style>
  <script src="script.js">
  var months = [];
var date = new Date();

for (var i = 0; i < 12; i++) {
  date.setMonth(i);
  var monthName = date.toLocaleString('default', { month: 'long' });
  months.push(monthName);
}

console.log(months);
</script>
</head>
<body>
  <h1>PAYMENT PAGE</h1>
    <form method="GET" action="py2.php" enctype='multipart/form-data'> <br>
 
  </form>
</body>
</html>
