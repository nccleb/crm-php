
<?php

session_start();
$num=$_GET["page"];
$idf=$_GET["page1"];
 

$_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;

$ace=$_POST['ace'];




?>



<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])&&isset($_POST['name'])){
	 $y=$_POST['name'];
	 $z=$_POST['nam'];
	
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req8=mysqli_query($idr,"select * from deals 
 where owner = '$y'
 and contact = '$z'
 and contact_date between \"$startdate\" and\"$enddate\" 
 order by close_date	

");
  $count=mysqli_num_rows($req8);
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

<p>DEALS REPORT</p>
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
    <th>Pipeline</th>
    <th>Name</th>
  
	
	<th> Description</th>
	<th> Stage</th>
	
	<th>Amount</th>
	<th>Contact Date</th>
	<th>Close Date</th>
    <th>Owner</th>
	<th>Contact</th>
	<th>Type </th>
    <th>Priority</th>

  </tr>
  







<?php



if($idf=="1" OR $idf=="2"){


//echo $y;
 if($ace=="@" ){



	
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $t=$_POST['task'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
  $req82=mysqli_query($idr,"select * from deals
  where name = \"$t\"
and  contact_date between \"$startdate\" and\"$enddate\" 
	

order by contact_date DESC");
 


 "count is". $count=mysqli_num_rows($req82);
}


	
	
	
	
	
	
	
	while($row=mysqli_fetch_array($req82)){
		$id = $row['idce'];
		$pipeline = $row['pipe'];
		$name=$row['name'] ;
	   
		$description=$row['description'];
		
		$contact_date=$row['contact_date'];
		$stage=$row['stage'];
		$amount=$row['amount'];
		$close_date=$row['close_date'];
		$owner=$row['owner'];
		$contact=$row['contact'];
	 	$type=$row['type'];
		$priority=$row['priority'];
		

    


		
		echo "<tr>";
		
	echo "<td>".$row['pipe']."</td>";	
    echo "<td>".$row['name']."</td>";
    echo"<td>".$row['description']."</td>";
	 
	 echo"<td>".$row['stage']."</td>";
	 

	  echo "<td>".$row['amount']."</td>";
	  echo"<td>".$row['contact_date']."</td>";
	 
	  
	 
	echo"<td>".$row['close_date']."</td>";
	echo"<td>".$row['owner']."</td>";
	echo"<td>".$row['contact']."</td>";
	 
	  echo "<td>".$row['type']."</td>";


	 
	echo"<td>".$row['priority']."</td>";
	//echo '<a href="mycgi?foo=', urlencode($description), '">';
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";

    echo "</tr>";
    
    
	
	 

		
	

		
		
}
$count=mysqli_num_rows($req82);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 
	

}

elseif($ace=="*#"){

	if(isset($_POST['search'])){
		$t=$_POST['task'];
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
	 $req282=mysqli_query($idr,"select *  from deals d , client c
   where d.idd  = c.id
	 and contact_date between \"$startdate\" and\"$enddate\" 
    
	   
   
   order by contact_date DESC");
	
   
   
	"count is". $count=mysqli_num_rows($req82);
   }
   
   
   
	   
	   
	   
	   
	   
	   
	   while($row=mysqli_fetch_array($req282)){
		   $id = $row['idce'];
		   $pipeline = $row['pipe'];
		   $name=$row['name'] ;
		  
		   $description=$row['description'];
		   
		   $contact_date=$row['contact_date'];
		   $stage=$row['stage'];
		   $amount=$row['amount'];
		   $close_date=$row['close_date'];
		   $owner=$row['owner'];
		   $contact=$row['contact'];
		   $type=$row['type'];
		   $priority=$row['priority'];
		   
   
	   
   
   
		   
		   echo "<tr>";
		   
	   echo "<td>".$row['pipe']."</td>";	
	   echo "<td>".$row['name']."</td>";
	   echo"<td>".$row['description']."</td>";
		
		echo"<td>".$row['stage']."</td>";
		
   
		 echo "<td>".$row['amount']."</td>";
		 echo"<td>".$row['contact_date']."</td>";
		
		 
		
	   echo"<td>".$row['close_date']."</td>";
	   echo"<td>".$row['owner']."</td>";
	   echo"<td>".$row['contact']."</td>";
		
		 echo "<td>".$row['type']."</td>";
   
   
		
	   echo"<td>".$row['priority']."</td>";
	   //echo '<a href="mycgi?foo=', urlencode($description), '">';
	   echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";
   
	   echo "</tr>";
	   
	   
	   
		
   
		   
	   
   
		   
		   
   }
   $count=mysqli_num_rows($req282);	
   echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}






elseif($ace=="!"){

	if(isset($_POST['search'])){
		$t=$_POST['task'];
		$a=$_POST['name'];
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
		$req382=mysqli_query($idr,"select * from deals
		where name = \"$t\"
		and owner = \"$a\"
	  and  contact_date between \"$startdate\" and\"$enddate\" 
		  
	  
	  order by contact_date DESC");
	
   
   
	"count is". $count=mysqli_num_rows($req82);
   }
   
   
	   
	   
	   
	   
	   
	   
	   
	   while($row=mysqli_fetch_array($req382)){
		   $id = $row['idce'];
		   $pipeline = $row['pipe'];
		   $name=$row['name'] ;
		  
		   $description=$row['description'];
		   
		   $contact_date=$row['contact_date'];
		   $stage=$row['stage'];
		   $amount=$row['amount'];
		   $close_date=$row['close_date'];
		   $owner=$row['owner'];
		   $contact=$row['contact'];
		   $type=$row['type'];
		   $priority=$row['priority'];
		   
   
	   
   
   
		   
		   echo "<tr>";
		   
	   echo "<td>".$row['pipe']."</td>";	
	   echo "<td>".$row['name']."</td>";
	   echo"<td>".$row['description']."</td>";
		
		echo"<td>".$row['stage']."</td>";
		
   
		 echo "<td>".$row['amount']."</td>";
		 echo"<td>".$row['contact_date']."</td>";
		
		 
		
	   echo"<td>".$row['close_date']."</td>";
	   echo"<td>".$row['owner']."</td>";
	   echo"<td>".$row['contact']."</td>";
		
		 echo "<td>".$row['type']."</td>";
   
   
		
	   echo"<td>".$row['priority']."</td>";
	   //echo '<a href="mycgi?foo=', urlencode($description), '">';
	   echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";
   
	   echo "</tr>";
	   
	   
	   
		
   
		   
	   
   
		   
		   
   }
   $count=mysqli_num_rows($req382);	
   echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}


elseif($ace=="#*"){

	if(isset($_POST['search'])){
		$t=$_POST['task'];
		$c=$_POST['nam'];
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
	 $req482=mysqli_query($idr,"select * from deals
     where name = \"$t\"
		and contact = \"$c\"
	  and  contact_date between \"$startdate\" and\"$enddate\" 
		  
	  
	  order by contact_date DESC");
	
   
   
	"count is". $count=mysqli_num_rows($req482);
   }
   
   
	   
	   
	   
	   
	   
	   
	   
	   while($row=mysqli_fetch_array($req482)){
		   $id = $row['idce'];
		   $pipeline = $row['pipe'];
		   $name=$row['name'] ;
		  
		   $description=$row['description'];
		   
		   $contact_date=$row['contact_date'];
		   $stage=$row['stage'];
		   $amount=$row['amount'];
		   $close_date=$row['close_date'];
		   $owner=$row['owner'];
		   $contact=$row['contact'];
		   $type=$row['type'];
		   $priority=$row['priority'];
		   
   
	   
   
   
		   
		   echo "<tr>";
		   
	   echo "<td>".$row['pipe']."</td>";	
	   echo "<td>".$row['name']."</td>";
	   echo"<td>".$row['description']."</td>";
		
		echo"<td>".$row['stage']."</td>";
		
   
		 echo "<td>".$row['amount']."</td>";
		 echo"<td>".$row['contact_date']."</td>";
		
		 
		
	   echo"<td>".$row['close_date']."</td>";
	   echo"<td>".$row['owner']."</td>";
	   echo"<td>".$row['contact']."</td>";
		
		 echo "<td>".$row['type']."</td>";
   
   
		
	   echo"<td>".$row['priority']."</td>";
	   //echo '<a href="mycgi?foo=', urlencode($description), '">';
	   echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";
   
	   echo "</tr>";
	   
	   
	   
		
   
		   
	   
   
		   
		   
   }
   $count=mysqli_num_rows($req482);	
   echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}

elseif($ace=="*"){
	

	if(isset($_POST['search'])){
		 $t=$_POST['task'];
		 $c=$_POST['nam'];
		 $a=$_POST['name'];
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
	 $req582=mysqli_query($idr,"select * from deals
     where name = '$t'
		and contact = '$c'
		and owner = '$a'
	  and  contact_date between '$startdate' and '$enddate'
		  
	  
	  order by contact_date DESC");
	
   
   
	"count is". $count=mysqli_num_rows($req582);
   }
   
   
	   
	   
	   
	   
	   
	   
	   
	   while($row=mysqli_fetch_array($req582)){
		   $id = $row['idce'];
		   $pipeline = $row['pipe'];
		   $name=$row['name'] ;
		  
		   $description=$row['description'];
		   
		   $contact_date=$row['contact_date'];
		   $stage=$row['stage'];
		   $amount=$row['amount'];
		   $close_date=$row['close_date'];
		   $owner=$row['owner'];
		   $contact=$row['contact'];
		   $type=$row['type'];
		   $priority=$row['priority'];
		   
   
	   
   
   
		   
		   echo "<tr>";
		   
	   echo "<td>".$row['pipe']."</td>";	
	   echo "<td>".$row['name']."</td>";
	   echo"<td>".$row['description']."</td>";
		
		echo"<td>".$row['stage']."</td>";
		
   
		 echo "<td>".$row['amount']."</td>";
		 echo"<td>".$row['contact_date']."</td>";
		
		 
		
	   echo"<td>".$row['close_date']."</td>";
	   echo"<td>".$row['owner']."</td>";
	   echo"<td>".$row['contact']."</td>";
		
		 echo "<td>".$row['type']."</td>";
   
   
		
	   echo"<td>".$row['priority']."</td>";
	   //echo '<a href="mycgi?foo=', urlencode($description), '">';
	   echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";
   
	   echo "</tr>";
	   
	   
	   
		
   
		   
	   
   
		   
		   
   }
   $count=mysqli_num_rows($req582);	
   echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}

elseif($ace=="##"){
	

	if(isset($_POST['search'])){
		 $p=$_POST['priority'];
		 
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
	 $req682=mysqli_query($idr,"select * from deals
     where priority = '$p'
		
	  and  contact_date between '$startdate' and '$enddate'
		  
	  
	  order by contact_date DESC");
	
   
   
	"count is". $count=mysqli_num_rows($req682);
   }
   
   
	   
	   
	   
	   
	   
	   
	   
	   while($row=mysqli_fetch_array($req682)){
		   $id = $row['idce'];
		   $pipeline = $row['pipe'];
		   $name=$row['name'] ;
		  
		   $description=$row['description'];
		   
		   $contact_date=$row['contact_date'];
		   $stage=$row['stage'];
		   $amount=$row['amount'];
		   $close_date=$row['close_date'];
		   $owner=$row['owner'];
		   $contact=$row['contact'];
		   $type=$row['type'];
		   $priority=$row['priority'];
		   
   
	   
   
   
		   
		   echo "<tr>";
		   
	   echo "<td>".$row['pipe']."</td>";	
	   echo "<td>".$row['name']."</td>";
	   echo"<td>".$row['description']."</td>";
		
		echo"<td>".$row['stage']."</td>";
		
   
		 echo "<td>".$row['amount']."</td>";
		 echo"<td>".$row['contact_date']."</td>";
		
		 
		
	   echo"<td>".$row['close_date']."</td>";
	   echo"<td>".$row['owner']."</td>";
	   echo"<td>".$row['contact']."</td>";
		
		 echo "<td>".$row['type']."</td>";
   
   
		
	   echo"<td>".$row['priority']."</td>";
	   //echo '<a href="mycgi?foo=', urlencode($description), '">';
	   echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";
   
	   echo "</tr>";
	   
	   
	   
		
   
		   
	   
   
		   
		   
   }
   $count=mysqli_num_rows($req682);	
   echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}


}
else
	{
		echo"<h2>YOU DON'T HAVE ENOUGH PERMISSIONS!</h2>";
		
		
	}
	
	
	
	?>
	</table>
	
	</div>
	<div  id="printDiv">
	<center>
	<form method="post" >
    <p> 
<select      name="ace">

<option value=""  selected>Select something...</option>
<option value="*#"      >All </option>
<option value="@"      >All->Deal Name</option>
<option value="!"> Agent->Deal Name</option>
<option value="#*"> Contact->Deal Name</option>
<option value="*"> Agent->Contact->Deal Name</option>

<option  value="##"      >Priority Calls</option>


</select>
<p>	


Agent

<select     name="name">

<option value=""  selected> Select something...</option>
<?php
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
	Contact<input id="in" type="text" placeholder="Enter value... " name="nam" size="8">
	Name<input id="in" type="text" placeholder="Enter value..." name="task" size="8">
	Stage<input id="in" type="text" placeholder="Enter value..." name="stage" size="8">
	Priority
<select    name="priority">

<option value=""  selected>Select something...</option>

<option>Low</option>
<option>Medium</option>
<option>High</option>


</select><br>

	
	<input id="start" type="date" name="startdate" size="4">
	<input id="end" type="date" name="enddate" size="4"><br>
	
	<input id="in" type="submit" name="search" value="Search" size="4" >
	
	
	<button type="button" id="in" onclick="quit()">Quit</button>
	<button type="button" id="in" onclick="printContents(id)">Print</button>
	
	</form>
	</center>
	
	</div>
	</div>
	
	<p id="tr"></p>
	
	
	</body>
		
	</HTML>
	




















	
	
	
	
	


		

			
		
		


	















































	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	






