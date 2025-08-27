<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>

	<?php
session_start();
 
 
  
	  // $id=$_POST['more'];
	  
	 
 $id=$_GET['id'];     


$_SESSION["id"]=$id;


//$os=$_SESSION["o"];
 
 //$op=$_SESSION["p"];

//$_SESSION["os"]=$os;
 
 //$_SESSION["op"]=$op;
 


?>
<?php

 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 $stmt = $idr->prepare("select * from client c , crm cr where c.id = cr.id  
                    and (idc=?)
					");
  $id=$_GET['id'];               
   
   $stmt->bind_param("i",$id );
   $stmt->execute();

     $req2 = $stmt ->get_result();

     $stmt->close();
   
 
  while($row=mysqli_fetch_assoc($req2)){ 
    
	          $s =$row['category'];
            
            $nom=$row['nom']." ".$row['prenom'];
       $i =$row['reminder'];
	    $ca =$row['category'];
       $oppo=$row['opportunity']; 
        $ta=$row['task']; 	   
			   $t =$row['lcd'];
			   $u =$row['la'];
			   $v =$row['incident'];
			  $w =$row['status'];
			  $x=$row['idfc'];
			 
			   
			$tas=$row['task'];
            $agent=$row['idfc'];
	  }  
 if($s==""){
	
}








?>

<script>
function update(){
location.replace('test55.php');
	 
}
</script>


<script>
function search(){
	
 window.open ("http://192.168.16.103//search.php","","menubar=0,resizable=1,width=480,height=620");
	
}
</script> 

<script>
function size(){
	window.resizeTo(500,900);
}

</script>

<script>	
function printContents(id)
{
    var contents = $("#"+id).html();

    if ($("#printDiv").length == 0)
    {
    var printDiv = null;
    printDiv = document.createElement('div');
    printDiv.setAttribute('id','printDiv');
    printDiv.setAttribute('class','printable');
    $(printDiv).appendTo('body');
    }

    $("#printDiv").html(contents);

    window.print();

    $("#printDiv").remove();


}	
</script>
	

<script>
function test(){
	
    fieldval = document.getElementById("age").value;
		
        document.getElementById("ag").value = fieldval;		
	
	
	
fieldval = document.getElementById("nom").value;
		
        document.getElementById("co").value = fieldval;	
	
	


		
		
fieldval = document.getElementById("tas").value;
		
        document.getElementById("ta").value = fieldval;	
						

		
fieldval = document.getElementById("td").value;
		
        document.getElementById("ap").value = fieldval;	
		
fieldval = document.getElementById("vd").value;
		
        document.getElementById("em").value = fieldval;	
		
fieldval = document.getElementById("wd").value;
		
        document.getElementById("bu").value = fieldval;	


		
fieldval = document.getElementById("ud").value;
		
        document.getElementById("cp").value = fieldval;	


		
fieldval = document.getElementById("urd").value;
		
        document.getElementById("ur").value = fieldval;			



		
	
	
}
</script>

		

</head>

<body onload="test()+size()">


<script>
function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
</script> 

<div class="container text-center">





   <!--legend style="font-size:30px;color:red;background:lightblue"></legend-->
 <table style="width:100%   ";  >

<tr><td  valign="top"   style="align:left"  >  
<form method="post"  action="<?php echo htmlspecialchars("test389.php");?>" > 

<!--p style="color:blue"   >Name   &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp <input style="color:blue" type="text" name="co" id="co" size="32" onclick=""><p><br/-->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="co" placeholder="" name="co"  readonly   >
</div><br>


<!--p style="color:blue">Category  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp <input style="color:blue" type="text" name="nu" id="bp" size="32" onclick="test()"><p><br/>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Category</label>
  <input type="text" class="form-control" id="bp" placeholder="" name="bp"     >
</div><br>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Opportunity</label>
  <input type="text" class="form-control" id="opu" placeholder="" name="opu"     >
</div><br-->


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Task</label>
  <input type="text" class="form-control" id="ta" placeholder="" name="ta"     >
</div><br>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Last Contacted</label>
  <input type="text" class="form-control" id="ap" placeholder="" name="na"     >
</div><br>
<!--p style="color:blue">Last Contacted &nbsp  <input style="color:blue" type="text" name="na" id="ap" size="32" ><p><br/-->
<!--p style="color:blue">Last Activity  &nbsp     <textarea  style="color:blue" name="la" id="cp"  rows="5" cols="32" ></textarea><br/><br/><br/-->
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Last Activity </label>
  <textarea class="form-control" id="cp" rows="3"  name="la"       ></textarea>
</div>

<!--p  style="color:blue">Comment     &nbsp &nbsp    &nbsp <textarea  style="color:blue" name="ur" id="em"  rows="5" cols="32" ></textarea><br/><br/><br/-->

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Complaint</label>
  <textarea class="form-control" id="em" rows="3"  name="ur"       ></textarea>
</div>
<!--p style="color:blue">Status   &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp   <input style="color:blue" type="text" name="bu" id="bu" size="30" ><p><br/-->


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Status</label>
  <input type="text" class="form-control" id="bu" placeholder="" name="bu"  >
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Agent</label>
  <input type="text" class="form-control" id="ag" placeholder="" name="ag"  >
</div><br>

<?php


switch ($agent) {
  case "1":
    $agen="super";
    break;

  case "2":
    $agen="user";
    break;
  
  //default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
?>

<input type="hidden" id="tas" value="<?php echo $ta?>">
<input type="hidden" id="opa" value="<?php echo $oppo?>">
<input type="hidden" id="cat" value="<?php echo $ca?>">
<input type="hidden" id="nom" value="<?php echo $nom?>">
<input type="hidden" id="sd" value="<?php echo $s?>">
<input type="hidden" id="td" value="<?php echo $t?>">
<input type="hidden" id="ina" value="<?php echo $i?>">
<input type="hidden" id="vd" value="<?php echo $v?>">
<input type="hidden" id="wd" value="<?php echo $w?>">
<input type="hidden" id="ud" value="<?php echo $u?>">
<input type="hidden" id="urd" value="<?php echo $ur?>">
<input type="hidden" id="bd" value="<?php echo $x?>">
<input type="hidden" id="age" value="<?php echo $agen?>"-->
<input type="hidden" id="tass" value="<?php echo $tas?>">
<div id="printDiv">

<input   class="btn btn-success" type="submit" value="Update" id="form">




</form>


<!--button  class="btn btn-success"   type="button" id="form" onclick="search()">Search</button-->
<button  class="btn btn-success"   type="button" id="form" onclick="printContents(id)">Print</button>
<button  class="btn btn-success"     type="button" id="form" onclick="quit()">Quit</button>
</div>
</form><br/><br/>
</td>
   <td>
</td></tr>

</table>
</fieldset>


</div>
</body>
</html>



