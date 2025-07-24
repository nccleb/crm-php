

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
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "test186.php?q=" + str,false);
        xmlhttp.send();
    }
}
</script>




</head>

<body>







<fieldset style="background:#f2f2f2;">
   
   <h3 id="form">Search  Contacts Details</h3> 
   
 
<h4 id="for" >Enter The Name:</h4>
 
<form method="post" action="<?php echo htmlspecialchars("test185.php");?>" id="searchform">
<p style="color:blue;font-size:4VW"><input style="color:blue;font-size:4VW" type="text" name="name" ><p>


<input id="form" type="submit" value="Search" name="submit">

<button type="button" id="form" onclick="quit()">Quit</button>
</form><br/><br/><br/><br/><br/><br/>
<p style="color:blue;font-size:4VW"  ><b>Start typing a name in the input field below:</b></p>
<form> 
<p style="color:blue;font-size:4VW" >First name:</p> <input type="text" onkeyup="showHint(this.value)">
</form>
<p style="color:blue;font-size:4VW"  >Suggestions: <span id="txtHint"></span></p>






</fieldset>



</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    










