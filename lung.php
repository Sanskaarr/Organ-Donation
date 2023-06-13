<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

                    <li><a href="heart.php">
                        <i class="fas fa-heart"></i>                     
                        <span class="nav-item">Heart Donors</span>
                    </a></li>
                    
                    <li><a href="lung.php">
                        <i class="fas fa-lungs"></i>                   
                        <span class="nav-item">Lungs Donors</span>
                    </a></li>

                <li><a href="adminsearch.html">
                    <i class="fas fa-search"></i>
                        <span class="nav-item">Search Donors</span>
                    </a></li>

                <li><a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>
    </div>
    <style>
        .result{
            margin-left:30%;
            margin-top:-12%;
           
        }
        table{

            width:90%;
            border:2px solid purple;
            padding:25px;
           
        }
       
        
   
        </style>
</body>
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

    $sql = "SELECT * FROM `lungs`";
    $results = mysqli_query($con, $sql);

    if(mysqli_num_rows($results) > 0){
        While($fetch = mysqli_fetch_array($results)){
            echo "<div class='result'>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Name : </th>"."<td class='a';>" .$fetch['name']. "</td>";
            echo "<th>Phone : </th>"."<td class='b';>" .$fetch['phone']. "</td>";
            echo "<th>Address : </th>"."<td class='c';>" .$fetch['address']. "</td>";
            echo "<th>Organ Donated : </th>"."<td class='d';>" .$fetch['organ']. "</td>";
            echo "<th>Blood Group : </th>"."<td class='e';>" .$fetch['blood']. "</td>";
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

