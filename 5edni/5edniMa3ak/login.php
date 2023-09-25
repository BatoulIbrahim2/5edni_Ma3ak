<?php
if (isset($_POST['id'], $_POST['password'])) {

    require_once 'connection.php';
    $id = $_POST['id'];
    $password = $_POST['password'];

    $query = "SELECT password FROM passenger where id='" . $id . "'LIMIT 1 ";
    $result = mysqli_query($con, $query);
    $r = mysqli_num_rows($result);
    if ($r == 1) {
        $row = mysqli_fetch_assoc($result);


        if (password_verify($password, $row['password'])) {

            session_start();
            $_SESSION['logged'] = TRUE;
            $_SESSION['id'] = $id;


            $_SESSION['password'] = $password;
            header('location: mainpage.php');
            exit();
        } else {
            echo "<script>alert('Please check you username and password')</script>";
        }
    } elseif ($id == 'admin' && $password == 'admin') {
        session_start();
        $_SESSION['logged'] = TRUE;
        $_SESSION['id'] = $id;

        $_SESSION['password'] = $password;
        header('location: admin.php');
    } else {
        echo "Invalid ID or password.";
    }
}
?>
<html>
    <head>

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
        </style>
    </head>
    <body>

        <script src="login.js"></script>

        <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>5EDNI<span>MA3AK</span></div>
        </div>
        <form method="post" action="login.php" onsubmit="return validateForm()">

            <br>
            <div class="login">
                <input type="text" placeholder="id" id="id" name="id"><br>
                <input type="password" placeholder="password" id="password" name="password"><br>
                <br>

                <input type="submit" value="Login">
                <br><br>
                <a href="register.php">Create New Account</a>
                <form></div>
            <script>
                function validateForm() {


                    var id = document.getElementById("id").value;
                    var password = document.getElementById("password").value;


                    if (id.trim() === "" || password.trim() === "") {
                        alert("Please enter ID and password.");
                        return false;
                    }




                    return true;
                }
            </script>


    </body>
</html>

