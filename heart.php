<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="admin.js"></script>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                    <li><a href="#" class="logo">
                        <img src="img/a.jpg" alt="">
                        <span class="nav-item">COMPONENT</span>
                    </a></li>

                    <li><a href="admin.html">
                     <i class="fas fa-user-md"></i>
                        <span class="nav-item">Donor Details</span>
                    </a></li>

                    <li><a href="body.php">
                        <i class="fas fa-child"></i>
                           <span class="nav-item">Body Details</span>
                       </a></li>

                    <li><a href="heart.php">
                        <i class="fas fa-heart"></i>                     
                        <span class="nav-item">Heart Donors</span>
                    </a></li>
                    
                    <li><a href="lung.php">
                        <i class="fas fa-lungs"></i>                   
                        <span class="nav-item">Lungs Donors</span>
                    </a></li>

                    <li><a href="organ.php">
                        <i class="fas fa-notes-medical"></i>                  
                        <span class="nav-item">Organ Donors</span>
                    </a></li>

                <li><a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>
    </div>
</body>
<style>
        .result2{
            margin-left:30%;
            margin-top:-13%;   
        }

        table{
            width:90%;
            border:2px solid purple;
            padding:25px;
        }

</style>
</html>

<?php
    $database = "localhost";
    $username = "root";
    $password = "";
    $server = "organ";
    $con = mysqli_connect($database, $username, $password, $server);
    
    if(!$con){
        die("Connection Failed !!" .mysqli_connect_error());
    }

    $sql = "SELECT * FROM `hearts`";
    $results = mysqli_query($con, $sql);

    if(mysqli_num_rows($results) > 0){
        While($fetch = mysqli_fetch_array($results)){
            echo "<div class='result2'>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Name : </th>"."<td>" .$fetch['name']. "</td>";
            echo "<th>Phone : </th>"."<td>" .$fetch['phone']. "</td>";
            echo "<th>Address : </th>"."<td>" .$fetch['address']. "</td>";
            echo "<th>Organ Donated : </th>"."<td>" .$fetch['organ']. "</td>";
            echo "<th>Blood Group : </th>"."<td>" .$fetch['blood']. "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
        }
    }
    else{
            echo "<script>
            alert('No Result Found !!');
            window.location.href = 'index.html';
            </script>";
            return false;
        }
?>

