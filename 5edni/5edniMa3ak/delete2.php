<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connection.php';
$id=$_GET['id'];
$query="DELETE FROM passenger WHERE id ='$id'";
mysqli_query($con, $query);
header('location:padmin.php');
?>