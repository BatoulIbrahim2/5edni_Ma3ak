<?php

require_once 'connection.php';
if (isset($_POST['id']) && isset($_POST['FullName']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']))
{ 
   
    $id= $_POST['id'];
    $FullName= $_POST['FullName'];
    $password= $_POST['password'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
   
$hashedpass= password_hash($password, PASSWORD_DEFAULT);

if(password_verify($password, $hashedpass)){
   
 $sql_add_query = "INSERT INTO passenger(id,FullName,password,phoneNumber,email) VALUES('$id','$FullName','$hashedpass',$phone,'$email')";
 $add= mysqli_query($con, $sql_add_query);
 if($add === FALSE) {
         die("Could not add the new register");
 

}else{
    header('location:login.php');
}}
}




?>

<html>
    
        <style>
            
           @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(car.png);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <head>

  <script src="script.js"></script>
</head>
    <body> 
        <form method="POST" action="register.php" onsubmit="return validateForm()">
       
         <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>5EDNI<span>MA3AK</span></div>
		</div>
		<br>
		<div class="login">
					
            <input type="text" placeholder="id"  name="id" id="id" > <br><br>
					
            <input type="text"  name="FullName" placeholder="Your Full Name " id="FullName">
				
			<input type="password" placeholder="password" name="password" id="password"> <br><br>
					
            <input type="text" placeholder="Phone Number" id="phone" name="phone">
			
			<br></br>
			<input type="text" placeholder="Email" id="email" name="email"><br></br>
					
			
  
			<input type="submit" value="create">
		
                                  
</div>
        </form>
        
    
    </body>
<script>
    
    function validateForm() {
      var id = document.getElementById("id").value;
      var fullName = document.getElementById("FullName").value;
      var phone = document.getElementById("phone").value;
      var email = document.getElementById("email").value;

      var emailRegex = /^[\w-]+(\.[\w-]+)*@(id\+)?(students\.)?liu\.edu\.lb$/;

      if (id === "" || fullName === "" || phone === "" || email === "") {
        alert("Please fill in all fields.");
        return false;
      }

      if (!emailRegex.test(email)) {
        alert("Invalid email format");
        return false;
      }

      return true;
    }
    </script>
 
  
</html>
