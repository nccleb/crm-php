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
  $password=$_GET['password'];
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
		
		
		
<script>
function quit(){
	window.close();
}

</script>		





</head>

<body>

<div class="jumbotron"> 



<!--h1><p style="color:red"></p></h1>

<fieldset style="background:#f2f2f2;">
   <legend style="font-size:30px;color:red;background:lightblue"></legend-->
 
 <form method="post" action="<?php echo htmlspecialchars("test245.php");?>" >
 <table>
<tr><td >  


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Username</label>
  <input class="form-control" id="nu" rows="3"  name="nu"    value="<?php echo $name ?>"   ></input>
</div></td>


<td>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Password</label>
  <input class="form-control" id="pa" rows="3"  name="pa"    value="<?php echo $password ?>"   ></input>
</div></td>


<td>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Confirm Password</label>
  <input class="form-control" id="pa" rows="3"  name="cpa"    value="<?php echo $password ?>"   ></input>
</div></td>



<td >  


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Email</label>
  <input class="form-control" id="em" rows="3"  name="em"    value="<?php echo $email ?>"   ></input>
</div></td></tr>







</table>


<input type="submit"  class="whatsappbutton"   value="Submit"  id="form">
<button type="button" id="form"  class="whatsappbutton"        onclick="quit()">Quit</button>
</form>



</div>
</body>
</html>


 

        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    