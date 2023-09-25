<?php
	require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="NavStyle.css">
  <title>Home</title>
</head>
<style>
  body {
    text-align: center;
  }

/*  h1 {
    text-align: center;
    
	color: #9900CC
  }*/
  h1 {
  font-size: 36px; /* Adjust the font size as needed */
  font-weight: bold;
  color: #FFCC00; /* Choose a suitable color */
  text-align: center;
  margin: 20px 0; /* Add margin to create spacing around the heading */
  text-transform: uppercase; /* Optional: Transform the text to uppercase */
  letter-spacing: 2px; /* Optional: Adjust letter spacing for emphasis */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle shadow */
}

.photo {
    background-color: #fcfcfc;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 500px;
    margin: auto;
    text-align: center;
    font-family: arial;
    float: left;
    width: 20%;
    padding: 5px;
    clear: both;
    display: table;

  }
  .form {
    margin-left: 37%;
    width: 23%;
}

#submit {
    border-radius: 50%;
}
body{
    background-image: url('car.png');
    background-repeat: no-repeat;
    background-size: cover;
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


h1{
	  text-align: center;
}
</style>
</head>

<body>
<div class="topnav" id="t">
    <a href="home.php">HOME</a>
    <a href="https://liu.edu.lb/NewLIU2022/academic/calendar.php">CALENDER</a>
    <a href="Login.php">LOGIN</a>
    <a href="Register.php">SIGNUP</a>
	
   
  </div>
  <h1>WELCOME TO 5EDNI MA3AK</h1>
  <br><br><br><br><br>
</body>

</html>
