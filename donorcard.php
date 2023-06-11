<?php
$database = "localhost";
$user = "root";
$password = "";
$server = "organ";
$con = mysqli_connect($database, $user, $password,$server);

if(!$con){
    die("Connection Failed !! " . mysqli_connect_error());
}

$sql = "SELECT * FROM `reg`";
$result = mysqli_query($con, $sql);

$med = "SELECT * FROM `med`";
$result2 = mysqli_query($con, $med);

$doc = "SELECT * FROM `doc`";
$result3 = mysqli_query($con, $doc);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Card</title>
</head>
<body>
    <Section>
        <h1>Donor Card</h1>
        <?php
            while($rows = $result ->fetch_assoc())
                {
            ?>
            <table>
                <tr>
                    <th>Name</th><td><?php echo $rows['name']; ?></td>
                    <th>Last</th><td><?php echo $rows['last']; ?></td>
                    <th>Phone</th><td><?php echo $rows['phone']; ?></td>
                    <th>Date of Birth</th><td><?php echo $rows['dob']; ?></td>
                    <th>Address</th><td><?php echo $rows['address']; ?></td>
                    <th>State</th><td><?php echo $rows['state']; ?></td>
                    <th>Pincode</th><td><?php echo $rows['pincode']; ?></td>
                    <th>ID</th><td><?php echo $rows['id']; ?></td>
                    <th>ID Number</th><td><?php echo $rows['idnumber']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
    </Section>

    <Section>
        <?php
            while($rows = $result2 ->fetch_assoc())
                {
            ?>
            <table>
                <tr>
                    <th>Blood Group</th><td><?php echo $rows['blood']; ?></td>
                    <th>Illness</th><td><?php echo $rows['illness']; ?></td>
                    <th>Text</th><td><?php echo $rows['text']; ?></td>
                    <th>Allergies</th><td><?php echo $rows['allergies']; ?></td>
                    <th>Medical<td><?php echo $rows['medical']; ?></td>
                    <th>Hospital</th><td><?php echo $rows['hospital']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
    </Section>
    
    <Section>
        <?php
            while($rows = $result3 ->fetch_assoc())
                {
            ?>
            <table>
                <tr>
                    <th>Photo</th><td><img src="./php/<?php echo $rows['photo']; ?>"></td>
                    <th>ID Proof</th><td><img src="./php/<?php echo $rows['idd']; ?>"></td>
                    <th>Sign</th><td><img src="./php/<?php echo $rows['sign']; ?>"></td>
                    <th>First Witness Sign</th><td><img src="./php/<?php echo $rows['fwsign']; ?>"></td>
                    <th>Second Witness Sign<td><img src="./php/<?php echo $rows['swsign']; ?>"></td>
                </tr>
                <?php
                }
                ?>
            </table>
    </Section>
</body>
</html>

<?php

?>
