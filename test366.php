

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('head.php'); ?>
<script>
function quit(){
	window.close();
}

</script>		


<style>
.whatsappbutton { background-color: #7ACC72; /* Green */ border: none; color: white; text-align: center; text-decoration: none; font-size: 16px; border-radius: 20px; padding: 10px 20px; margin-top: 10px !important; width: fit-content; margin: auto; cursor: pointer }



</style>
	



</head>

<body>


<div class="jumbotron"> 


<h1><p style="color:red"></p></h1>

<fieldset style="background:#f2f2f2;">
   <!legend style="color:red;background:lightblue"></legend>
 <table>

<tr><td  valign="top"   style="align:"left"  > 
<p  id="fo">ARE YOU SURE YOU WANT TO DELETE ALL THE DATA ?</p> 
<form method="post" action="<?php echo htmlspecialchars("test367.php");?>" id="form1">
<p style="color:blue"><input style="color:blue" type="hidden" name="id" id="bp" size="11"><p><br/>   

<input type="submit" class="whatsappbutton"  value="YES" id="form">

<button type="button" id="form" class="whatsappbutton"   onclick="quit()">NO</button>
</form><br/><br/>
</td>
   <td>
</td></tr>

</table>
</fieldset>
</body>


</div>
</html>







 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    