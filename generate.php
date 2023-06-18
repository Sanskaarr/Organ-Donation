<?php

require_once('./TCPDF/tcpdf.php');

$database = "localhost";
$user = "root";
$password = "";
$server = "organ";
$con = mysqli_connect($database, $user, $password,$server);

//  $name = $_GET['name'];

$sql = "SELECT * FROM `reg` INNER JOIN `med` on `reg`.`S.no` = `med`.`S.no` INNER JOIN `doc` on `med`.`S.no` = `doc`.`S.no` WHERE `reg`.`name`= 'sameer';";
$results = mysqli_query($con, $sql);

if(mysqli_num_rows($results) > 0){
    $fetch = mysqli_fetch_array($results);

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf-> AddPage();

    $content = '';

    $content.= '<style>
    img{
 
        height: 200px;
        width:150px;
        object-fit:cover;
        // background:url("img/p.jpg");
        background-repeat: no-repeat;
      
       
   }
    body{
        background: #77A1D3;  
        background: -webkit-linear-gradient(to right, #E684AE, #79CBCA, #77A1D3); 
        background: linear-gradient(to right, #E684AE, #79CBCA, #77A1D3);
        
    }
    .container{
        width: 40em;
        text-align: center;
        border-style: solid;
        height:30em;
        background: #C9FFBF;  
        background: -webkit-linear-gradient(to right, #FFAFBD, #C9FFBF); 
        background: linear-gradient(to right, #FFAFBD, #C9FFBF);
        
        margin:5em;
        margin-left: 15em;
    }
    h3{
        margin-left:10em;
        margin-top:50em;
    }
    h4{
        
        text-align:left;
       
    }
    .cont{
        text-align:left;
        width:71em;
        border-style: solid;
        background: #C9FFBF;  
        background: -webkit-linear-gradient(to right, #FFAFBD, #C9FFBF); 
        background: linear-gradient(to right, #FFAFBD, #C9FFBF);
        
        margin-left: 6.5em;
    }
    </style>';

    $content .= '<div class="container" id="container">
    <h1 style="font-style:bold; color:rgb(24, 47, 116); font-weight:800; text-decoration-line: underline;">ORGAN DONOR CARD</h1>
    <br>
    <div class="card" style="width: 10rem; position:absolute; ">
      <img class="card-img-top" src="C:/xampp/htdocs/card/php/photo.jpg"/>
    </div><br>
    <h3>
      I '.$fetch['name'].' son <input type="radio" name="radio" value="son"/> /daughter <input type="radio" name="radio" value="daughter"/> /wife <input
        type="radio" name="radio" value="wife"/> of <input type="text" /> <br> in the hope that I may help others hereby make
      this <br>anatomical gift, if  medically acceptable to take effect upon <br>my
      brain death. I hereby wish to donate the following organs.
    </h3>
    <div class="cont">
      <h4 style="text-align:center; color:rgb(3, 3, 158); font-weight: 600;">Signed by the Donor in the presence of two witnesses</h4><br>
      <h5 style="position:absolute; margin-top:0%;">Address of Donor:  <u>'.$fetch['address'].'</u></h5> 
      <h5 style="text-align:center; margin-top:6%;">Date of Birth: <u>'.$fetch['dob'].'</u> </h5> <br> <br> <br> <br> 
      <h5 style="position:absolute; margin-top:0%;"> Blood Group: <u>'.$fetch['blood'].'</u></h5>
      <h5 style="text-align:center;">Telephone No: <u>'.$fetch['phone'].'</u></h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <br> <br> <br> 
      <h5 style="position:absolute; margin-top:0%;">Signature of Donor: <img src="C:/xampp/htdocs/card/php/sign.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5> 
      <h5 style="text-align:center; margin-left:-15%">First Witness Signature: <img src="C:/xampp/htdocs/card/php/sign2.jpg"></h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <h5 style="text-align:right; margin-top: -50%;"> Second Witness Signature: <img src="C:/xampp/htdocs/card/php/sign3.jpg"></h5>  <br> <br> <br> <br>
      <br> <br> <br> <br>
      
      <h5 style="text-align:center; font-style:bold; color:rgb(24, 47, 116); font-weight:800; text-decoration-line: underline;"> ORGAN RETRIEVAL BANKING ORGANISATION (ORBO) <br> A.I.M.S., Ansari Nagar, New Delhi-110 029 <br>
      Tel. No. : 26593444, 26588360</h5>';
}

$pdf -> writeHTML($content);

$pdf->Output('card.pdf');
?>