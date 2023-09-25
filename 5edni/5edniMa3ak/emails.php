<?php

session_start();
if($_SESSION['logged']==true){
require_once 'connection.php';

$id = $_SESSION['id'];

if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{ 
 $msg= $_POST['message'];
  $subject= $_POST['subject'];
   $email= $_POST['email'];
   
if (!empty($msg)) {
        // Save the message in the chat table (replace 'your_database' with your actual database name and 'your_chat_table' with your actual table name)
       

        $sql = "INSERT INTO chat  (user1,user2, message) VALUES ('$id','$email', '$msg')";

      if(mysqli_query($con, $sql) === FALSE) {
         die("Could not add the new register");
 

}}else {
        echo "Please enter a message.";
    }
}}
?>
<html>
<head>
    <title>Email Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 120px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Email Page</h1>

    <form action="emails.php" method="post">
        
       
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Send Email">
    </form>
</body>
</html>

