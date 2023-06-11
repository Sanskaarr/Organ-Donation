<?php
$database = "localhost";
$user = "root";
$password = "";
$server = "organ";
$con = mysqli_connect($database, $user, $password,$server);

if(!$con){
    die("Connection Failed !! " . mysqli_connect_error());
}

$photo_name = $_FILES["photo"]["name"];
$photo = $_FILES["photo"]["tmp_name"];
$folder1 = "./php/" .$photo_name;

$idd_name = $_FILES["idd"]["name"];
$idd = $_FILES["idd"]["tmp_name"];
$folder2 = "./php/" .$idd_name;

$sign_name = $_FILES["sign"]["name"];
$sign = $_FILES["sign"]["tmp_name"];
$folder3 = "./php/" .$sign_name;

$fwsign_name = $_FILES["fwsign"]["name"];
$fwsign = $_FILES["fwsign"]["tmp_name"];
$folder4 = "./php/" .$fwsign_name;

$swsign_name = $_FILES["swsign"]["name"];
$swsign = $_FILES["swsign"]["tmp_name"];
$folder5 = "./php/" .$swsign_name;

$sql = "INSERT INTO `doc` (`photo`, `idd`, `sign`, `fwsign`, `swsign`) VALUES ('$photo_name', '$idd_name', '$sign_name', '$fwsign_name', '$swsign_name');";
 
if (mysqli_query($con, $sql)) {
echo "<script>
    alert('Thank you For Submitting the Form !!');
    </script>";
}

else {
    echo "ERROR: Hush ! Sorry" . $sql . "<br>" . mysqli_error($con);
}

if(move_uploaded_file($photo,$folder1)){
    echo "<script>
        window.location.href = 'donorcard.php'
    </script>";
}

if(move_uploaded_file($idd,$folder2)){
    echo "<script>
    window.location.href = 'dashboard.html'
    </script>";
}

if(move_uploaded_file($sign,$folder3)){
    echo "<script>
        window.location.href = 'dashboard.html'
    </script>";
}

if(move_uploaded_file($fwsign,$folder4)){
    echo "<script>
    window.location.href = 'dashboard.html'
    </script>";
}

if(move_uploaded_file($swsign,$folder5)){
    echo "<script>
    window.location.href = 'dashboard.html'
    </script>";
}
mysqli_close($con);
?>