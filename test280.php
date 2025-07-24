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
  $email=$_GET['email'];
  $_SESSION["id"]=$id;
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

<div class="jumbotron" > 


<form method="post" action="<?php echo htmlspecialchars("test281.php");?>">

 <table>

<tr><td>  


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Name</label>
  <input class="form-control" id="nu" rows="3"  name="nu"    value="<?php echo $name ?>"   ></input>
</div></td>
  
<td>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Number</label>
  <input class="form-control" id="pa" rows="3"  name="pa"    value="<?php echo  $number ?>"   ></input>
</div></td>

<td>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Email</label>
  <input class="form-control" id="pa" rows="3"  name="em"    value="<?php echo  $email ?>"   ></input>
</div></td>

</tr>



</table>
<input type="submit" value="Submit"  class="whatsappbutton"     id="form">
<button type="button" id="form" class="whatsappbutton"     onclick="quit()">Quit</button>
</form>




</body>
</html>


 

        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    