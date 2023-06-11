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
                    
                    <li><a href="lungs.php">
                        <i class="fas fa-lungs"></i>                   
                        <span class="nav-item">Lungs Donors</span>
                    </a></li>

                <li><a href="index.html">
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
    <div class="form">
        <form action="searcho.php" method="post">
            <input type="text" name="search" id="search">
            <button>Search</button>
        </form>
    </div>
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

    $search = $_POST['search'];

    $search = htmlspecialchars($search);
    $search = mysqli_real_escape_string($con, $search);

    $sql = "SELECT * FROM `reg` WHERE `name` LIKE '%$search%' ORDER BY `name`";
    // $sql = "SELECT reg.name, lung.name, heart.name FROM reg INNER JOIN lung ON reg.name=lung.name INNER JOIN heart ON reg.name=heart.name WHERE 'name' LIKE '%$search%' ORDER BY `name`;";
    $results = mysqli_query($con, $sql);

    if(mysqli_num_rows($results) > 0){
        While($fetch = mysqli_fetch_array($results)){
            echo "<div class='result'>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Name : </th>"."<td>" .$fetch['name']. "</td>";
            echo "<th>Phone : </th>"."<td>" .$fetch['phone']. "</td>";
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

