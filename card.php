<?php
$database = "localhost";
$user = "root";
$password = "";
$server = "organ";
$con = mysqli_connect($database, $user, $password,$server);

if(!$con){
    die("Connection Failed !! " . mysqli_connect_error());
}

$search = $_POST['search'];

$search = htmlspecialchars($search);
$search = mysqli_real_escape_string($con, $search);

$sql = "SELECT * FROM `reg` INNER JOIN `med` on `reg`.`S.no` = `med`.`S.no` INNER JOIN `doc` on `med`.`S.no` = `doc`.`S.no` WHERE `name` LIKE '%$search%'  ORDER BY `name`;";
$results = mysqli_query($con, $sql);

if(mysqli_num_rows($results) > 0){
    While($fetch = mysqli_fetch_array($results)){

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="card.css" />
    <script src="form.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <title>Donor Card</title>
  </head>
  <body>
    <div class="check">
    <form action="card.php" method="post" onsubmit="return check()">
      <h1 style="text-align: center; color: rgb(15, 244, 252); background-color: rgb(0, 80, 104); font-size:35px;">
         Write your name to get your donor card<br>(as per your registeration form)</h1>
        
            <input type="text" name="search" id="search" style="margin-top: 1em; margin-left:35em;">
            <button  onClick="document.getElementById('container').scrollIntoView();" />Search</button>
        </form>
    </div>
   
    <div class="container" id="container">
      <h1 style="font-style:bold; color:rgb(24, 47, 116); font-weight:800; text-decoration-line: underline;">ORGAN DONOR CARD</h1>
      <br>
      <div class="card" style="width: 18rem; position:absolute;">
        <img class="card-img-top" src="./php/<?php echo $fetch['photo']; ?>"/>
      </div><br>
      <h3>
     

        I <u><?php echo $fetch['name']?></u> son <input type="radio" name="radio" value="son"/> /daughter <input type="radio" name="radio" value="daughter"/> /wife <input
          type="radio" name="radio" value="wife"/> of <input type="text" /> <br> in the hope that I may help others hereby make
        this <br>anatomical gift, if  medically acceptable to take effect upon <br>my
        brain death. I hereby wish to donate the following organs.
      </h3>
      <br>
      <br>
      <br>
      <br>
      
      <h4>Special wishes, if any</h4><textarea class="sc" rows="2" cols="50" style="margin-right:50em;"></textarea>
    </div>
    <div class="cont">
      <h4 style="text-align:center; color:rgb(3, 3, 158); font-weight: 600;">Signed by the Donor in the presence of two witnesses</h4><br>
      <h5 style="position:absolute; margin-top:0%;">Address of Donor:  <u><?php echo $fetch['address']?></u></h5> 
      <h5 style="text-align:center;">Date of Birth: <u><?php echo $fetch['dob']?></u> </h5> <br> <br> <br> <br> 
      <h5 style="position:absolute; margin-top:0%;"> Blood Group: <u><?php echo $fetch['blood']?></u></h5>
      <h5 style="text-align:center;">Telephone No: <u><?php echo $fetch['phone']?></u></h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <br> <br> <br> 
      <h5 style="position:absolute; margin-top:0%;">Signature of Donor: <img src="./php/<?php echo $fetch['sign']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5> 
      <h5 style="text-align:center; margin-left:-5%">First Witness Signature: <img src="./php/<?php echo $fetch['fwsign']; ?>"></h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <h5 style="text-align:right; margin-top: -20%;"> Second Witness Signature: <img src="./php/<?php echo $fetch['swsign']; ?>"></h5>  <br> <br> <br> <br>
      <br> <br> <br> <br>
      
      <h5 style="text-align:center; font-style:bold; color:rgb(24, 47, 116); font-weight:800; text-decoration-line: underline;"> ORGAN RETRIEVAL BANKING ORGANISATION (ORBO) <br> A.I.M.S., Ansari Nagar, New Delhi-110 029 <br>
      Tel. No. : 26593444, 26588360</h5>
    </h>
  </div>
  <a class="btn btn-primary" href="generate.php" role="button">Download as PDF</a>
  <button class="btn btn-primary" onclick="window.location.href = 'card.html';">Exit</button>

 <?php
    }
}
else{
  echo "<script>
  alert('No Result Found !!');
  window.location.href = 'card.html';
  </script>";
}

?>
  </body> 
</html>

