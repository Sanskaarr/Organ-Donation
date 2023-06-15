<?php
 $database = "localhost";
 $username = "root";
 $password = "";
 $server= "organ";
 $con = mysqli_connect($database, $username, $password,$server);

 session_start();

 $username = $_POST['username'];
 $password = $_POST['pswd'];

//To Prevent Mysql Injection
 $username = stripcslashes($username);
 $password = stripcslashes($password);
 $username = mysqli_real_escape_string($con,$username);
 $password = mysqli_real_escape_string($con,$password);

 $sql = "SELECT * FROM `hospital` WHERE  name = '$username' AND password = '$password';";
 $result = mysqli_query($con,$sql);
 
 $count = mysqli_num_rows($result);

 //if results match,table row must be 1 row
 if($count == 1){
  echo"<script>
  window.location.href='admin.html';
  alert('Welcome ' + '$username');
  </script>";
 }
 else{
   echo"<script>
   window.location.href='adminlogin.html';
   alert('Username or Password is Incorrect !! Please Re-Enter Or Register yourself!!!');
   </script>";
   return false;
 }
?>