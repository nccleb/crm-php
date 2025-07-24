

<!DOCTYPE html>
<html>
   <?php include('head.php'); ?>
<script>
function quit(){
	window.close();
}

</script>		
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		font-size:4VW;
	}
	
	
}

#form{
	color:blue;
	font-size:4VW;
}

#for{
	color:blue;
	//font-size:4VW;
}


</style>




</head>

<body>







<fieldset style="background:#f2f2f2;">
   
   <h3 id="form">Search  Contacts Details</h3> 
   
 
<h4 id="for" >Enter The Id:</h4>
 
<form method="post" action="<?php echo htmlspecialchars("test190.php");?>" id="searchform">
<p style="color:blue;font-size:4VW"><input style="color:blue;font-size:4VW" type="text" name="name" ><p>


<input id="form" type="submit" value="Search" name="submit">

<button type="button" id="form" onclick="quit()">Quit</button>
</form><br/><br/><br/><br/><br/><br/>






</fieldset>



</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    










