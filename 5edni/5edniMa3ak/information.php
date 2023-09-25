<?php
// Assuming you have already established a database connection
require_once 'connection.php';
// Get the ID from the URL query parameter
$id = $_GET['id'];

// Fetch user information from the database based on the ID
$query = "SELECT * FROM location WHERE pid = $id";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Check if a user with the given ID exists
if (!$user) {
    echo "Location not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        /* CSS styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
     background-image: url('car3.png');
    background-repeat: no-repeat;
    background-size: cover;
    justify-content: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            background-color: white;
        }
        th {
            background-color: #f2f2f2;
            font-family: Brush Script MT,cursive;
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
    </style>
</head>
<body>
    <h1>User Information</h1>
    <br><br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Street</th>
            <th>City</th>
            <th>Building</th>
        </tr>
        <tr>
            <td><?php echo $user['pid']; ?></td>
            <td><?php echo $user['street']; ?></td>
            <td><?php echo $user['city']; ?></td>
            <td><?php echo $user['building']; ?></td>
        </tr>
    </table>
</body>
</html>
