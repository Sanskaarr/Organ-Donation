<?php
$database = "localhost";
$user = "root";
$password = "";
$server = "web";
$con = mysqli_connect($database, $user, $password,$server);

if(!$con){
    die("Connection Failed !! " . mysqli_connect_error());
}

$sql = "SELECT * FROM `connect`";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing Data in the Table</title>
</head>
<body>
    <section>
        <h1>Table for Data</h1>
        <table>
            <tr>
                <th>S.No</th>
               <th>Username</th>
               <th>Email</th>
               <th>Password</th> 
               <th>Gender</th>
               <th>Image</th>
            </tr>
            <?php
            while($rows = $result ->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['S.No']; ?></td>
                <td><?php echo $rows['Username']; ?></td>
                <td><?php echo $rows['Email']; ?></td>
                <td><?php echo $rows['Password']; ?></td>
                <td><?php echo $rows['Gender']; ?></td>
                <td><?php echo $rows['file']; ?></td>
            </tr>
            <?php
                }
                ?>
        </table>
    </section>
</body>
</html>