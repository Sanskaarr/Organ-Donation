<?php
include('reg.html');

$database = "localhost";
$user = "root";
$password = "";
$server = "organ";
$con = mysqli_connect($database, $user, $password,$server);

if(!$con){
    die("Connection Failed !! " . mysqli_connect_error());
}

$name = $_POST["name"];
$last = $_POST["last"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$address = $_POST["address"];
$state = $_POST["state"];
$pincode = $_POST["pincode"];
$id = $_POST["unique"];
$idnumber = $_POST["idnumber"];

$sql = "INSERT INTO `reg` (`name`, `last`, `phone`, `dob`, `address`, `state`, `pincode`, `id`, `idnumber`) VALUES ('$name', '$last', '$phone', '$dob', '$address', '$state', '$pincode', '$id', '$idnumber');";

if (mysqli_query($con, $sql)) {
    echo "<script>
        window.location.href = 'med.html'
        </script>";
    
    } 
    else {
        echo "ERROR: Hush ! Sorry" . $sql . "<br>" . mysqli_error($con);
    }
    
    mysqli_close($con);
?>