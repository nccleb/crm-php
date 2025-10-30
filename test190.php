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


<?php

     
      if(isset($_POST['name'])&&!empty($_POST['name'])){
	         echo "<h3 id=\"form\">"."Id:".$a =$_POST['name']."</h3>"."<br>"; 
	  }
	 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  
	  //-run  the query against the mysql query function 
	  $result=mysqli_query($idr,"SELECT name_d,num_d FROM drivers where idx='{$a}'");
	  //-create  while loop and loop through result set
	  
	  while($row=mysqli_fetch_array($result)){
	    
		echo "<h3 id=\"form\">"."Name:".$row['name_d']."</h3>"."<br>";
		
		if(strlen($row['num_d'])==7){
            echo "<h3 id=\"form\">"."Number:"."0".$row['num_d']."</h3>";  
			  }	
        else{			  
        echo "<h3 id=\"form\">"."Number:".$row['num_d']."</h3>";		
	    }
	  }

?>
     <a href="test189.php"><button id="form">Try again</button></a>
      <button type="button" id="form" onclick="quit()">Quit</button>
     </fieldset>


</body>
</html>