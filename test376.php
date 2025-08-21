
<?php

session_start();
   $num=$_GET["page"];
   $idf=$_GET["page1"];
 

 $_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;


$y=$_POST["name"];



?>










<?php

function test_input($data) {
	 $data = trim($data);	
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>














































	
	
	
	


		

			
		
		


	






















<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>



  <style>
      
      th {
       
        top: 0;
      }
     
      th,td {
        padding: 5px 10px;
        border: 2px solid #626d5c;
        text-align: center;
      }
      th {
        background: #04af2f;
      }
    </style>




<center>

<p> TICKETS REPORT</p>
<HR/>



























<script>
	
	
	
	
function dell(str) {
	
	 var result = confirm("Want to delete?");
if (result) {
    //Logic to delete the item

	
	 var id=document.getElementById("start").value;;
  var idf=document.getElementById("end").value; ;
  
  //alert(name+idf);
	
  var xhttp;
 
  
  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tr").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test352.php?id="+id+"&idf="+idf, true);
 
  xhttp.send();
}

}                                                          
</script>








	
	
 


</head>
<body>


<div class="container text-center"> 
<div class="divClass" id="divClass" >

</center>
<div class="wrapper" >
<table>
  <tr>
    <th>Complaints</th>
  
	
	<th> Count</th>
	
  </tr>
  



<?php
$y=$_POST["name"];
$idf=$_GET["page1"];
$z=$_POST['name1'];
if($idf=="1" OR $idf=="2"){



 if($z=="q" ){
	
	

  
  $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit();
 }
 
  
 
 if(isset($_POST['search'])){
   
  
 
   
    
    $t=test_input($_POST['incident']);
     $startdate=$_POST['startdate'];
     $enddate=$_POST['enddate'];
 
    
    $req86=mysqli_query($idr,"select incident , count(*) AS counter FROM crm 
    where  lcd between \"$startdate\" and\"$enddate\" 
    
    AND incident IN ( select comment_text  FROM comments )
     
    
   
   
 
   
     
    GROUP BY incident
 
    ");
  
 
 
   $count6=mysqli_num_rows($req86);
 }
 









    $_SESSION['stat']="req86";
		
	
    if($count6=="0"  )
    {
      echo"<h2>No Complaints Found!</h2>";
    }else{

  while($row = mysqli_fetch_array($req86)) {  
    "There are ". $row['counter'] ." ". $row['incident'] ;   
     "<br />";  

    
		
	


  
      echo "<tr>";
      
      echo"<td>". $row['incident']."</td>";
      echo"<td>".$row['counter']."</td>";
    
  

  
  }

  

}

}











else if($z=="!"  ){
	
	
  
  $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit();
 }
 
  
 
 if(isset($_POST['search'])){
   
   
   
    
      $t=test_input($_POST['incident']);
      $startdate=$_POST['startdate'];
      $enddate=$_POST['enddate'];
      $idf=$_POST['name'];
      $req85=mysqli_query($idr,"select incident,count(*) AS counter
       
      FROM crm c, form_element f
      where c.idfc = f.name
      AND lcd between \"$startdate\" and\"$enddate\" 
      AND idfc= '$idf'	
      AND incident IN ( select comment_text  FROM comments )
       
      
     
     
   
     
       
      GROUP BY incident
   
      ");
  
 
 
   $count5=mysqli_num_rows($req85);




 }
 
 
 
 
 
    
 if($count5=="0"  )
 {
   echo"<h2>No Complaints Found!</h2>";
 }else{
	


  while($row = mysqli_fetch_array($req85)) {  
    "There are ". $row['counter'] ." ". $row['incident'] ;   
     "<br />";  

    
		
	


  
      echo "<tr>";
      
      echo"<td>". $row['incident']."</td>";
      echo"<td>".$row['counter']."</td>";
    
  

  
  }

}

}






else if($z=="*" ){
	
	
 $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $t=test_input($_POST['incident']);
   $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
   $idf=$_POST['name'];
   $req84=mysqli_query($idr,"select incident, count(*) AS counter 
   FROM crm c, form_element f
   where c.idfc = f.name
   AND lcd between \"$startdate\" and\"$enddate\" 
   AND idfc= '$idf'	
   AND incident NOT IN ( select comment_text  FROM comments )
    
   
  
  

  
    
   GROUP BY incident

   ");


  $count4=mysqli_num_rows($req84);
}



if($count4=="0"  )
 {
   echo"<h2>No Complaints Found!</h2>";
 }else{
		
	


  while($row = mysqli_fetch_array($req84)) {  
    "There are ". $row['counter'] ." ". $row['incident'] ;   
     "<br />";  

    
		
	


  
      echo "<tr>";
      
      echo"<td>". $row['incident']."</td>";
      echo"<td>".$row['counter']."</td>";
    
  

  
  }

}


}




else if($z=="$" ){
	
	
  $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit();
 }
 if(isset($_POST['search'])){
    $t=test_input($_POST['incident']);
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $idf=$_POST['name'];
    $req94=mysqli_query($idr,"select incident , count(*) AS counter 
    FROM crm 
    where  lcd between \"$startdate\" and\"$enddate\" 
     AND incident NOT IN ( select comment_text  FROM comments )
    GROUP BY incident
 
    ");
  
 
 
   $count14=mysqli_num_rows($req94);
 }
 
 
 
 if($count14=="0"  )
  {
    echo"<h2>No Complaints Found!</h2>";
  }else{
     
   
 
 
   while($row = mysqli_fetch_array($req94)) {  
     "There are ". $row['counter'] ." ". $row['incident'] ;   
      "<br />";  
 
     
     
   
 
 
   
       echo "<tr>";
       
       echo"<td>". $row['incident']."</td>";
       echo"<td>".$row['counter']."</td>";
     
   
 
   
   }
 
 }
 
 
 }
 
 
 
 
 










else if($z=="**" ){
	
	

  $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit();
 }
 if(isset($_POST['search'])){
     $t=test_input($_POST['incident']);
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $idf=$_POST['name'];
   $req82=mysqli_query($idr,"select * from  crm  
 where  lcd between \"$startdate\" and\"$enddate\" 
   
 AND incident ='$t'
 ");
  
 
 
   $count=mysqli_num_rows($req82);
 }
 
 
    
 
		
	


    $count=mysqli_num_rows($req82);	


    if($count=="0"  )
    {
      echo"<h2>No Complaints Found!</h2>";
    }else{
    

    echo "<tr>";
    $t=$_POST['incident'];
 
      echo"<td>".$t."</td>";
      echo"<td>".$count."</td>";
      
    
 
     echo "</tr>";
		
	
}
	

}










else if($z=="@" ){
	
	
 $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){	
  $z=test_input($_POST['name1']);
  $t=test_input($_POST['incident']);
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
    $idf=$_POST['name'];
    $req72=mysqli_query($idr,"select incident,count(*) AS counter
    FROM crm c, form_element f
    where c.idfc = f.name
    AND lcd between \"$startdate\" and\"$enddate\" 
    AND idfc= '$idf'
    AND incident = '$t'	
    AND incident IN ( select comment_text  FROM comments )
     
    
   
   
 
   
     
    GROUP BY incident
 
    ");
 


  $count=mysqli_num_rows($req72);
}


	
	
    $count=mysqli_num_rows($req72);	


    if($count=="0"  )
    {
      echo"<h2>No Complaints Found!</h2>";
    }else{
    


    echo "<tr>";
    $t=$_POST['incident'];
 
      echo"<td>".$t."</td>";
      echo"<td>".$count."</td>";
      
    
 
     echo "</tr>";

}


}


}




















	
	
	else
	{
		echo"<h2>YOU DON'T HAVE ENOUGH PERMISSIONS!</h2>";
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	






?>
</table>


<script>
function statistics(){
 
 
	
  window.open("test387.php?var1=<?php echo $startdate ?>&var2=<?php echo $enddate ?>&var3=<?php echo $idf ?>&var4=<?php echo $z ?>");
}

 

 </script>

</div>
<div  id="printDiv">
<center>







<form method="post" >
 <!--input id="in" type="text" name="name1" size="4"-->

<p> 
<select      name="name1">

<option value=""  selected>Select something...</option>
<option value="q"      >All Tickets(only choose date)(chart)</option>
<option value="!"      >Choose Agent for All Tickets(Complaints blank)</option>
<option value="$"      >All Other Tickets(All blank)</option>
<option value="*"> Choose Agent for Other(Ticket blank)</option>
<hr>
<option value="**"> All Agent(blank) Choose Ticket</option>
<option value="@">  Choose Agent Choose Ticket</option>



</select><br>




Agent

<select     name="name">

<option value=""  selected>Select something...</option>
<?php
$idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$stmt = $idr->prepare("SELECT * from form_element ") ; 

   



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){


 $y = $row[name];
 
 
echo " <option value=\"$y\">".$y. " </option> "; 



   
}

?>


</select>





Complaints
<select name="incident" id="in"  >
 <option   value=" "   >Select something... </option>
<?php

$idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req11=@mysqli_query($idr," select * from comments order by id_co asc  ");
$req12=@mysqli_query($idr," SELECT COUNT(id_co) as arr FROM comments; ");
$lig=@mysqli_fetch_assoc($req12);
for ($i=1;$i<=$lig["arr"];$i++){
	$lig1=@mysqli_fetch_assoc($req11);
	
	   $_SESSION["$i"]= $lig1["comment_text"];
	      
	echo " <option value='".  $_SESSION["$i"]."'>" .  $_SESSION[$i]. " </option> "; 
	   
 }
 ?>
 </select></br>
<input id="start" type="datetime-local" name="startdate" size="4">
<input id="end" type="datetime-local" name="enddate" size="4"><br>

<input id="in" type="submit" name="search" value="Search" size="4" >

<button type="button" id="in"  onclick="statistics()">Chart</button>

<button type="button" id="in" onclick="printContents(id)">Print</button>
<button type="button" id="in" onclick="quit()">Quit</button>
</form>
</center>

</div>
</div>

<p id="tr"></p>
<p id="st"></p>






</body>
	
</HTML>
