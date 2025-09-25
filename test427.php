<?php
session_start();
?>


<?php


    
 $os=$_SESSION["os"];
 $_SESSION["os"]=$os;
 
?>







<?php

  $id=$_GET['id'];
  $name=$_GET['name'];
  $number=$_GET['number'];
  $_SESSION["id"]=$id;
  $_SESSION["name"]=$name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
		








</head>

<body>

<div  class="jumbotron"> 




 <table>
 <form method="post" action="<?php echo htmlspecialchars("test428.php");?>" >
<tr><td>  


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Case</label>
  <input class="form-control" id="nu" rows="3"  name="case"    value="<?php  ?>"   ></input>
</div></td></tr>

<tr><td>  


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Rate</label>
  <input class="form-control" id="nu" rows="3"  name="rate"    value="<?php  ?>"   ></input>
</div></td></tr>



</table>

 <input type="submit" class="whatsappbutton"     value="Submit" id="form"></input>

<button type="button" id="form"  class="whatsappbutton"        onclick="quit()">Quit</button>
</form>
</div>
</body>
</html>


 