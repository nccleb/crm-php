<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>  
<style>
#id{
	color:blue;
	font-size:28px;
}

#for{
	color:red;
	font-size:28px;
}


</style>




<script>
function quit(){
	window.close()
}

</script>

<title></title>
</head>
<body>
<?php
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_FILES['csv_file'])&&($_FILES['csv_file']['error']==0)){
	if($_FILES['csv_file']['size']<=8000000){

		$info=pathinfo($_FILES['csv_file']['name']);
		$target=$info['basename'];
		
		$extensionU=$info['extension'];
        $extensionA=array("csv");
		if(in_array($extensionU,$extensionA)){
			move_uploaded_file($_FILES['csv_file']['tmp_name'],"upload/$target");
			
		}
		else{
	echo "<p style=\"color:red;font-size:28px\">Invalid file type!</p>";
	 echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}
		
		
	}
	else{
	echo "<p style=\"color:red;font-size:28px\">Invalid file size!</p>";
	 echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}
}
else{
	echo "<p style=\"color:red;font-size:28px\">Error! Please choose a correct file!</p>";
	 echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}



$handle = fopen("upload/$target", "r");
$t=0;
   while($file=fgetcsv($handle,",")){
      
	$idb=$file[0];
	$date=$file[1];
	$time=$file[2];
	$callerId=$file[3];
	$extension=$file[4];
	$duration=$file[5];
	$status=$file[6];
	
	 
	
	
	
	  
	

	
	
	     
	  
	   
	   
    if (!preg_match("/^[0-9]*$/",$idb)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid ID format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 
   
   
     if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]\/:~&'+-\.\p{Arabic} ]*$/u",$date)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Date format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]\/:~&'+-\.\p{Arabic} ]*$/u",$time)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Time format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

   
   if (!preg_match("/^[0-9]*$/",$callerId)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid CallerId format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

   
   
	   
    if (!preg_match("/^[0-9 ]*$/u",$extension)) {
		
  echo "<p style=\"color:red;font-size:28px\">Invalid Extension format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }
   
   if (!preg_match("/^[0-9 ]*$/u",$duration)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Duration format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
   
   
    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]:~&'+-\.\p{Arabic} ]*$/u",$status)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Status format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


	   	   
 
   
   
   
   
    
   
   
   
   
   
   
   
   



   

  


    

    
	   	   
  
   
    
   
   
    
   
   
     $stmt = $idr->prepare("INSERT INTO billing (idb ,date,time,callerId,extension,duration,status) VALUES ( ?, ?,?,?,?,?,?)");

     $stmt->bind_param("issssis", $idb, $date,$time,$callerId,$extension,$duration,$status);


     $stmt->execute();


    $stmt->close();

  
   
	


    
   
  
   
	//$stmt=mysql_query("insert into crm (idc ,category,balance,lcd,la,incident,status,id,idfc) values ( '{$idc}', '{$category}','{$balance}','{$lcd}','{$la}','{$incident}','{$status}','{$id}','{$idfc}')");
	 
	
	
   }
   
    $req1=mysqli_query($idr,"select * from billing");
	
	   if(mysqli_num_rows($req1)>0 ){
		   echo "<p style=\"color:red;font-size:28px\">data is well inserted</p>";
		   echo "<button id=\"id\"   type=\"button\" onclick=\"quit()\">Quit</button>";
		   fclose($handle);
		   mysql_close($idr);
	   }
	   else{
		   
		   echo "<p style=\"color:red;font-size:28px\">data was not inserted</p>";
		   echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
   }
   
      
	


	

?>	
</body>
</html>			
			
	