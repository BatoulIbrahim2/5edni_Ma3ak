<?php


session_start();
if($_SESSION['logged']==true){
include 'connection.php';

if ( isset($_POST['carnumber']) && isset($_POST['type']) && isset($_POST['color'])  && isset($_POST['submit']) && isset($_FILES['my_image']) )
{  
    
    $id = $_SESSION['id'];
    $carnumber = $_POST['carnumber'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    



	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index1.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO images(image_url,id) 
				        VALUES('$new_img_name','$carnumber')";
				mysqli_query($con, $sql);
				header("Location: vcar.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index1.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index1.php?error=$em");
	}
$sql_add_query = "INSERT INTO car(CarNumber,id,color,type) VALUES('$carnumber','$id','$color','$type')";
                                mysqli_query($con, $sql_add_query);
				header("Location: vcar.php");


}else {
	header("Location: index1.php");
}



                    
                  
        
                
}
else{
   header('location:login.php');
}

    
    




?>
