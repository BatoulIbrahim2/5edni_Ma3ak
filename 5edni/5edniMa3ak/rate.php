<?php

session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
 $id = $_SESSION['id'];
 $output = "";
if(isset($_GET['d_id'])) {
    
  $d_id = $_GET['d_id'];
 
  

}
if(isset($_POST['rate']) && isset($_POST['comment'])){
    $message = $_POST['comment'];
    $rate= $_POST['rate'];
    $s="";
if($rate=="1s"){
    $s="1s";
}
else if($rate=="2s"){
    $s="2s";
}
else if($rate=="3s"){
    $s="3s";
}
else if($rate=="4s"){
    $s="4s";
}
else if($rate=="5s"){
    $s="5s";
}
$query2="DELETE FROM rate WHERE id ='$id' and d_id='$d_id'";
mysqli_query($con, $query2);
$query = "INSERT INTO rate(id,d_id,rate, message) VALUES ('$id','$d_id','$s', '$message')";
  if(mysqli_query($con, $query)) {
 
      header('location:rides.php');
    
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
  }

  // Close the database connection
  mysqli_close($con);
}

  

}
else{
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <style>@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  place-items: center;
  text-align: center;
  background: #000;
}
.container{
  position: relative;
  width: 400px;
  background: #111;
  padding: 20px 30px;
  border: 1px solid #444;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.container .post{
  display: none;
}
.container .text{
  font-size: 25px;
  color: #666;
  font-weight: 500;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #666;
  font-weight: 500;
  cursor: pointer;
}
.container .edit:hover{
  text-decoration: underline;
}
.container .star-widget input{
  display: none;
}
.star-widget label{
  font-size: 40px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
}
#rate-1:checked ~ form header:before{
  content: "I just hate it ";
}
#rate-2:checked ~ form header:before{
  content: "I don't like it ";
}
#rate-3:checked ~ form header:before{
  content: "It is awesome ";
}
#rate-4:checked ~ form header:before{
  content: "I just like it ";
}
#rate-5:checked ~ form header:before{
  content: "I just love it ";
}
.container form{
  display: none;
}
input:checked ~ form{
  display: block;
}
form header{
  width: 100%;
  font-size: 25px;
  color: #fe7;
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
}
form .textarea{
  height: 100px;
  width: 100%;
  overflow: hidden;
}
form .textarea textarea{
  height: 100%;
  width: 100%;
  outline: none;
  color: #eee;
  border: 1px solid #333;
  background: #222;
  padding: 10px;
  font-size: 17px;
  resize: none;
}
.textarea textarea:focus{
  border-color: #444;
}
form .btn{
  height: 45px;
  width: 100%;
  margin: 15px 0;
}
form .btn button{
  height: 100%;
  width: 100%;
  border: 1px solid #444;
  outline: none;
  background: #222;
  color: #999;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}
form .btn button:hover{
  background: #1b1b1b;
}</style>
  <head>
    <meta charset="utf-8">
    <title>Star Rating Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
      <form method="POST" action="">
    <div class="container">
      <div class="post">
<!--        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>-->
      </div>
      <div class="star-widget">
          <input type="radio" name="rate" id="rate-5" value="5s">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4" value="4s">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3" value="3s">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2" value="2s">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1" value="1s">
        <label for="rate-1" class="fas fa-star"></label>
        
          <header></header>
          <div class="textarea">
            <textarea cols="30"id="comment" name="comment" placeholder="Describe your experience.."></textarea>
          </div>
          <div class="btn">
            <button type="submit">Post</button>
          </div>
        
      </div>
    </div>
    <script>
      const btn = document.querySelector("button");
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-widget");
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = ()=>{
          widget.style.display = "block";
          post.style.display = "none";
        }
        return false;
      }
    </script>
      </form>
  </body>
</html>
