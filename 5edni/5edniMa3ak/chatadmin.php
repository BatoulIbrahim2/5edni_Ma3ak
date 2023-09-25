<?php

session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';



$id = $_SESSION['id'];
$admin="admin";
if(isset($_POST['submit']) && !empty($_POST['message'])) {
  $message = $_POST['message'];
    $message = mysqli_real_escape_string($con, $message);

echo "</table";
$query = "INSERT INTO chat (user1,user2, message) VALUES ('$id','$admin', '$message')";
  if(mysqli_query($con, $query)) {
    echo "Message sent successfully!";
    header('location:chatadmin.php');
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
  }

  // Close the database connection
 
}

$query2 = "SELECT *  FROM chat where (user1='$id'or user1='$admin') and (user2='$admin' or user2='$id') ";
$result = mysqli_query($con, $query2);
$r = mysqli_num_rows($result);
if($r==0){
     echo"<h1>You can contact the Admin Here</h1>";
}else{
for ($i = 0; $i < $r; $i++) {
    $row = mysqli_fetch_assoc($result);
    if($row['user1']==$id){
  echo '<div class="chat-message">';
            echo '<span class="user">' . $row['user1'] . '</span>: ' . $row['message'];
//            echo '<span class="time">' . $time . '</span>';
            echo '</div>';
    }
    else{
        echo '<div class="chat-message2">';
            echo '<span class="user">' . $row['user1'] . '</span>: ' . $row['message'];
//            echo '<span class="time">' . $time . '</span>';
            echo '</div>';
    }
}

}}
else{
   header('location:login.php');
}

?>
<html lang="en">
    <head>
        <style>/* Chat container */
            body{
              
     background-image: url('car11.png');
    background-repeat: no-repeat;
    background-size: cover;
 
      margin:  100px 400px;
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
.chat-container {
            width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
            height: 400px;
            overflow-y: scroll;
            
        }
        .chat-message2 {
            background-color: #f1f1f1;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
           align-items: center;
            width: 400px;
  
  align-items: center;
  margin: 10px;
  border: 1px solid #ccc;
  text-decoration: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .chat-message2 .user {
            font-weight: bold;
        }


        .chat-message {
            background-color: #CCCCFF;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
           align-items: center;
            width: 400px;
  
  align-items: center;
  margin: 10px;
  border: 1px solid #ccc;
  text-decoration: none;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .chat-message .user {
            font-weight: bold;
        }

        .chat-message .time {
            font-size: 0.8em;
            color: #888;
        }

        /* CSS styles for the input box and send button */
        .chat-input {
            display: flex;
            margin-top: 10px;
        }

        .chat-input input[type="text"] {
            flex-grow: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            justify-content: center;
            align-items: center;
            width: 700px;
                
        }

        .chat-input input[type="submit"] {
            margin-left: 5px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            
        }

  </style>
        <meta charset="utf-8" />
        <title>Tuts+ Chat Application</title>
        <meta name="description" content="Tuts+ Chat Application" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        
         <form method="post" action="" lass="chat-input"> <br>
       
                <input name="message" type="text" id="message" required />
                <input name="submit" type="submit"  value="Send" />
        </div>  </form>
       
    </body>
</html>
