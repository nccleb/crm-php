<!DOCTYPE html>
<html>
   <?php include('head.php'); ?>
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		font-size:4vw;
	}
	
	
}

#form{
	color:blue;
	font-size:4vw;
}

#for{
	color:blue;
	font-size:4vw;
}


</style>

<script>
function size(){
	window.resizeTo(400,800);
}

</script>


<script>
function quit(){
	window.close()
}

</script>
</head>
<body onload="size()" >
<?php 
	  if(isset($_POST['name'])&&!empty($_POST['name'])){ 
	 
	  if (preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
	  $name=$_POST['name']; 
	  $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  
	  
	  $result=mysqli_query($idr, "SELECT  * FROM drivers WHERE name_d LIKE '{$name}'");
	  
	  $t=0;
	  while($row=mysqli_fetch_assoc($result)){ 
	          $Number  =$row['num_d']; 
			  
	       echo "<p id=\"for\">"."Id:".$ID=$row['idx']."</p>"; 
	  
		 
      if(strlen($Number)==7){
		   
	   echo  "<p id=\"for\"  >". "Number:"."0".$Number . " </p>"; 
	  
	  }
	  
	  
	  if(strlen($Number)==8){
		 echo  "<p id=\"for\"   >".$Number . " </p>"; 
         

	  }
	  $t=1;
	  
	  
	  
	  }
	  if($t==0){
		echo"<p id=\"for\"> Name not found!</p>";  
		  
	  }
	  echo "<a href=\"search.php\"><button id=\"form\">Try again</button></a>";
  	  echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
	  }else{ 
	 
       echo"<p id=\"for\"> Please enter only letters!"."<br/><br/>"."<br/>";
		 echo "<a href=\"search.php\"><button id=\"form\">Try again</button></a>";
	     echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";

		 
	  }}
	  else{ 
	 
       echo"<p id=\"for\"> Please enter a search query!"."<br/><br/>"."<br/>";
		 echo "<a href=\"test184.php\"><button id=\"form\">Try again</button></a>";
	     echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";

		 


	  
	  }
	  
	 
	  
	?> 
	
	</body>
	</html>