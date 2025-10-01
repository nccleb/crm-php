<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?> 


<style>
.whatsappbutton { background-color: #7ACC72; /* Green */ border: none; color: white; text-align: center; text-decoration: none; font-size: 16px; border-radius: 20px; padding: 10px 20px; margin-top: 10px !important; width: fit-content; margin: auto; cursor: pointer }



</style>



<script>

function quit(){
	window.close();
}





</script>	




</head>
<body>
<div class="jumbotron"> 

<?php

echo"<p > Are you sure you want to export Missed Calls Data?</p>"."<br/>";
		
		 echo "<a href=\"test362.php\"><button  class=\"whatsappbutton\">Yes</button></a>";
	     echo "<button class=\"whatsappbutton\" type=\"button\" onclick=\"quit()\">No</button>";

		 exit;


?>



</div>
</body>
</html>











