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


 $query2="SELECT * FROM reservations where d_id='$d_id' and date='$dt' and time='$time'";
                $result=  mysqli_query($con, $query2);
                $r= mysqli_num_rows($result);
          
                for($i=0;$i<$r;$i++)
                {
                $row=mysqli_fetch_assoc($result);
                $p_id=$row['p_id'];
                $s = " ".$d_id." Delete a ride in ".$dt." at ".$time." ";
                $query3="INSERT INTO notification(id,message) VALUES ('$p_id','$s')  ";

                mysqli_query($con, $query3);}
                $query="DELETE FROM ride WHERE id ='$id'";
mysqli_query($con, $query);
header('location:me.php');
?>