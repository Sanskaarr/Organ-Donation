<?php
include('med.html');

$database = "localhost";
$user = "root";
$password = "";
$server = "organ";
$con = mysqli_connect($database, $user, $password,$server);

if(!$con){
    die("Connection Failed !! " . mysqli_connect_error());
}

$blood = $_POST["bg"];
$illness = $_POST["illness"];
$text = $_POST["text"];
$allergies = $_POST["allergies"];
$medical = $_POST["medical"];
$hospital = $_POST["hospital"];

$sql = "INSERT INTO `med` (`blood`, `illness`, `text`, `allergies`, `medical`, `hospital`) VALUES ('$blood', '$illness', '$text', '$allergies', '$medical', '$hospital');";

if (mysqli_query($con, $sql)) {
    echo "<script>
        window.location.href = 'doc.html'
        </script>";
    
    } 
    else {
        echo "ERROR: Hush ! Sorry" . $sql . "<br>" . mysqli_error($con);
    }
    
    mysqli_close($con);
?>