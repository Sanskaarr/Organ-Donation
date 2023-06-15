<?php
    $database = "localhost";
    $username = "root";
    $password = "";
    $server= "organ";
    $con = mysqli_connect($database, $username, $password,$server);

    if(!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['txt'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    $sql = "INSERT INTO `hospital` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";

    // $user_check = "SELECT * FROM `hospital` WHERE name = '$username';";
    // $email_check = "SELECT * FROM `hospital` WHERE email = '$email';";
    
    //   $check_u = mysqli_query($con, $user_check);
    //   $check_e = mysqli_query($con, $email_check);

    //   if(mysqli_num_rows($check_u)>0){
    //     echo"<script>
    //     window.location.href='adminlogin.html';
    //     alert('Username already exists !!! Please Choose a new username');
    //     </script>";
    // }
  
    // else if(mysqli_num_rows($check_e)>0){
    //     echo "<script>
    //     window.location.href='adminlogin.html';
    //     alert('Sorry .. Email already exists');
    //     </script>";
    // }

     if (mysqli_query($con, $sql)) {
    echo "<script>
        window.location.href='adminlogin.html';
        alert('Please Log In');
        </script>";

    } 
    else {
        echo "ERROR: Hush ! Sorry" . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
?>