

<!DOCTYPE html>
<html>
<head>

<!script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script src="jquery-3.5.1"></script>
  <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/bootstrap">
  <!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="base.css">
  <!script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!link rel="stylesheet" href="js/bootstrap.min.js">
  <!script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   
   
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: right;
    padding: 8px;
	 
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>  
   
   
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		//font-size:2vw;
	}
	
	
}

#form{
	color:blue;
	//font-size:2vw;
}

#for{
	color:red;
	//font-size:2vw;
}


</style>


















</head>





<body>


<table>
<tr><th>DATE</th ><th>Time</th><th  >Caller ID</th><th>Dest</th><th >TRG</th><th  >Ring</th><th>Status</th><th>Duration</th></tr>


<?php 


	 
	  //connect  to the database 
	  $idr=@mysql_connect("192.168.16.103","root","1Sys9Admeen72")|| ("die connection error");
      @mysql_select_db("nccleb_test");
	  $sql="SELECT  * FROM internal" ; 
	  
	  $result=mysql_query($sql); 
	  
	  
	  while($row=mysql_fetch_assoc($result)){ 
	         $date  =$row['date']; 
			 $time=$row['time']; 
			 $src=$row['src'];
             $dest  =$row['dest']; 
			 $trg=$row['trg']; 
			 $ringbefore=$row['ringbefore']; 
             $status=$row['status']; 
			 $duration=$row['duration'];			 
		echo	"<tr><td>".$date."</td><td>".$time."</td><td>".$src."</td><td>".$dest."</td><td>".$trg."</td><td>".$ringbefore."</td><td>".$status."</td><td>".$duration."</td></tr>";
			  
	          
	  }
	 


 ?>
	  <tr id="yourid"><th>DATE</th ><th>Time</th><th  >Caller ID</th><th   >Dest</th><th >TRG</th><th  >Ring</th><th>Status</th><th>Duration</th></tr>
		 
</table>
	<?php
	$idr=@mysql_connect("192.168.16.103","root","1Sys9Admeen72")|| ("die connection error");
@mysql_select_db("nccleb_test");


$req1=mysql_query("SELECT COUNT(*) FROM internal ");
$row1=mysql_fetch_assoc($req1);
echo $row1['COUNT(*)'];
	?>
	
	
	
	</body>
	
	
	</html>