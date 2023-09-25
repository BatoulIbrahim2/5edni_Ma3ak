<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connection.php';
$id=$_GET['id'];
$d_id1=$_GET['d_id'];
$dt=$_GET['dt'];
$time1=$_GET['time'];


 $query2="SELECT * FROM reservations where id='$id'";
                $result=  mysqli_query($con, $query2);
                $r= mysqli_num_rows($result);
          
                for($i=0;$i<$r;$i++)
                {
                $row=mysqli_fetch_assoc($result);
                $p_id=$row['p_id'];
                $d_id=$row['d_id'];
                $date=$row['date'];
                $time=$row['time'];
                $s = " ".$d_id." Did not accept you in a ride on ".$date." at ".$time." ";
                $query3="INSERT INTO notification(id,message) VALUES ('$p_id','$s')  ";

                mysqli_query($con, $query3);}
                $query="DELETE FROM reservations where id='$id'";
                $sql = "update ride set available_seat = available_seat + 1 where driver_id ='$d_id1' and departure_time='$dt' and time='$time1' ";
            mysqli_query($con, $sql);
mysqli_query($con, $query);
header('location:me.php');
?>