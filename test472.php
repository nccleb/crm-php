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

<tr><td  valign="top"   style="align:left"  >  
<form method="post" action="<?php echo htmlspecialchars("test471.php");?>" >

 
<input type="text" id="ext" name = "ext"  placeholder="extension" class="form-control"       >
<input type="text" id="int" name = "int" placeholder="interface" class="form-control"        >
<input type="text" id="ope" name = "ope"  placeholder="operate type" class="form-control"       >





<input  class="whatsappbutton"  type="submit" value="Search" >

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

