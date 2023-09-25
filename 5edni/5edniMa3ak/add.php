<?php
session_start();
if($_SESSION['logged']==true){

require_once 'connection.php';
$ids = $_SESSION['id'];
if(isset($_GET['id'])) {
    
  $id = $_GET['id'];
 
  



 
    
 $item_query = "select * from ride where id = '$id'";
 
 $result=  mysqli_query($con, $item_query);
 $row = mysqli_fetch_assoc($result);
 
 $d_id = $row['driver_id'];
 $start = $row['start_location'];
 $end = $row['end_location'];
 $available_seat = $row['available_seat'];
 $time = $row['time'];
 $timer = $row['timereturn'];
 $dt = $row['departure_time'];
 $sql1 = "SELECT * FROM ride where driver_id='$ids' and departure_time='$dt' and time='$time'  and timereturn='$timer'";
$result5 = mysqli_query($con, $sql1);

if (mysqli_num_rows($result5) > 0) {
    // If there's a matching ride, redirect back to the form with a parameter indicating that a ride exists
    header("Location: add.php?ride_exists=true");
     exit('location:passenger.php');
    
}
$sql2 = "SELECT p_id, date,time FROM reservations where p_id='$ids' and date='$dt' and time='$time' ";
$result2 = mysqli_query($con, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // If there's a matching ride, redirect back to the form with a parameter indicating that a ride exists
    header("Location: add.php?reservation_exists=true");
     exit('location:passenger.php');
    
}
 if($available_seat > 0){
     
   
    $sql_add_query = "INSERT INTO reservations(id,p_id,d_id,start,end,date,time,timereturn) VALUES('$id','$ids','$d_id','$start','$end','$dt','$time','$timer')";

        if(mysqli_query($con, $sql_add_query) === FALSE){
            die("Could not add the new reservation"); 
            
        }
        else{
            $sql = "update ride set available_seat = available_seat - 1 where id = '$id'";
            mysqli_query($con, $sql);
           header('location:passenger.php');
        }
 }else{
     die("la asr");
 }
}}else{
   header('location:login.php');
}



?>
<html><body>
        <form method="GET" action="add.php" ></form><script>
        <?php
        // Check if there's a ride with the same start and end locations
        if (isset($_GET['ride_exists'])) {
            echo "alert('You have a ride at the same time!');";
           
          
        }
        if (isset($_GET['reservation_exists'])) {
            echo "alert('You have a reservation at the same time! if you to add this reservation you want to delete the reservation before');";
        }
        ?>
    </script></body></html>
