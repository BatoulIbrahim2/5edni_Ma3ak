<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connection.php';
$id=$_GET['id'];
$d_id=$_GET['d_id'];
$dt=$_GET['dt'];
$time=$_GET['time'];
$s = "A user Delete a reservation in ".$dt." at ".$time." ";


$query="DELETE FROM reservations WHERE id ='$id'";
$query2="INSERT INTO notification(id,message) VALUES ('$d_id','$s')  ";
mysqli_query($con, $query);
$add= mysqli_query($con, $query2);
 if($add === FALSE) {
         die("Could not add the new register");
 

}else{
$sql = "update ride set available_seat = available_seat + 1 where driver_id ='$d_id' and departure_time='$dt' and time='$time' ";
            mysqli_query($con, $sql);
header('location:rides.php');}
?>