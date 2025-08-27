<?php
session_start();
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
 $o=urldecode($_GET['page']);
$_SESSION["o"]=$o;
 $p=urldecode($_GET['page1']);
$_SESSION["p"]=$p;


?>

<!DOCTYPE html>
<html>
    <head>
    <?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>







	



		

</head>

<body>
<div class="jumbotron"> 









  
 <table>

<tr><td  valign="top"   style="align:"left"  >  
<form method="post" action="<?php echo htmlspecialchars("test437.php");?>" >

<p >Pipeline <p>

<select name="pipe" id="user"  class="form-control">
 <option   value=""   > </option>
<?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
// $req11=@mysqli_query($idr," select * from pipeline order by idp asc  ");
// $req12=@mysqli_query($idr," SELECT COUNT(idp) as arr FROM pipeline; ");




	
	   

    $stmt = $idr->prepare("SELECT COLUMN_NAME,DATA_TYPE
  FROM INFORMATION_SCHEMA.COLUMNS
 WHERE table_name = 'pipeline'    ") ; 



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){

  
   $y = $row["COLUMN_NAME"];
   $z = $row["DATA_TYPE"];

	   if($z!="int"){ 
	echo " <option value=\"$y\">".$y. " </option> "; 
       }


	   
 }



	



	  



?>





   
  
  
  

  
  
  
  
  
   


  </select>
<p><input  type="text"      placeholder="Enter Text"      name="na" id="ap"  ></p><br/>

<!--p>Number<input type="text" name="nu" id="bp"  onclick="test()"></p-->


<input  class="whatsappbutton"  type="submit" value="Add" >

<button type="button"  class="whatsappbutton"     onclick="quit()">Quit</button>
<button  type="button" class="whatsappbutton"   onclick="refresh()">Reload</button>
</form><br/><br/>
</td>
   <td>
</td></tr>

</table>


</body>

<div>
</html>




