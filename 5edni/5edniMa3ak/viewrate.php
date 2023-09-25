<!DOCTYPE html>
<html>
<head>
    <title>Driver Ratings</title>
    <style>
         body{
            text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
  
        }
        
        .star-rating {
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
}
.star-rating .star {
    display: inline-block;
    margin-right: 5px;
}
.star-rating input {
    display: none;
}
.star-rating label {
    font-size: 25px;
    color: #ccc;
    cursor: pointer;
}
.star-rating label:before {
    content: '\2605';
}
.star-rating input:checked ~ label {
    color: #ffcc00;
}
h1 {
  font-size: 36px; /* Adjust the font size as needed */
  font-weight: bold;
  color: #333; /* Choose a suitable color */
  text-align: center;
  margin: 20px 0; /* Add margin to create spacing around the heading */
  text-transform: uppercase; /* Optional: Transform the text to uppercase */
  letter-spacing: 2px; 
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); 
  
  font-family: Brush Script MT,cursive;


}
text1{
    color: #1e90ff;
}
    </style>
</head>
<body>
    <h1>Driver Ratings</h1>

    <?php
     session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';
$id = $_SESSION['id'];
   if(isset($_GET['driver_id'])) {
    
  $d_id = $_GET['driver_id'];
 
  

}

    // Query to retrieve ratings for the selected user
    $sql = "SELECT * FROM rate WHERE d_id = $d_id";
    $result=  mysqli_query($con, $sql);
    $r= mysqli_num_rows($result);
         for($i=0;$i<$r;$i++) {
             $row=mysqli_fetch_assoc($result);
             
            $driver_id = $row['d_id'];
            $rate = $row['rate'];
//            $stars = str_repeat('&#9733;', $rate);
            $comment = $row['message'];
            $ids=$row['id'];

            // Query to retrieve the driver's name based on driver ID
            $driver_query = "SELECT FullName FROM passenger WHERE id = $driver_id";
            $driver_result = $con->query($driver_query);
            $driver_name = ($driver_result->num_rows > 0) ? $driver_result->fetch_assoc()['FullName'] : '';
            

            echo '<div class="rating">';
echo "<div class='rating'>";
    echo "<div class='star-rating'>";
    echo "<input type='radio' id='rating-$ids' name='rating-$ids' disabled ";
    echo ($rate == '5s') ? "checked" : "";
    echo "/><label for='rating-$ids'></label>";
    echo "<input type='radio' id='rating-$ids' name='rating-$ids' disabled ";
    echo ($rate == '4s') ? "checked" : "";
    echo "/><label for='rating-$ids'></label>";
    echo "<input type='radio' id='rating-$ids' name='rating-$ids' disabled ";
    echo ($rate == '3s') ? "checked" : "";
    echo "/><label for='rating-$ids'></label>";
    echo "<input type='radio' id='rating-$ids' name='rating-$ids' disabled ";
    echo ($rate == '2s') ? "checked" : "";
    echo "/><label for='rating-$ids'></label>";
    echo "<input type='radio' id='rating-$ids' name='rating-$ids' disabled ";
    echo ($rate == '1s') ? "checked" : "";
    echo "/><label for='rating-$ids'></label>";
    echo "</div>";
    echo "<p>Driver Id: $driver_id</p>";
 echo "<p>Driver Name: $driver_name</p>";
    echo "</div>";

            echo "<p>Comment: $comment</p>";
            echo "<hr>";
        }
        echo"<a href='passenger.php'>Exit</a>";
}
    else{
   header('location:login.php');
}

    ?>

</body>
</html>
