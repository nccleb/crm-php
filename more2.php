









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
  $uif=urldecode($_GET['page2']);
 
  if(isset($_POST['more'])&&!empty($_POST['more'])){ 
	   $id=$_POST['more'];
	  }
	 else if($uif!==""){
		  
		   $id=$uif;
	  }
	  else {
      echo	  "<script>
    
      alert(\"Missing Entry!  \");
      quit();
     
      
      
    
    </script>";
         
         
      
      
        }
  


$_SESSION["id"]=$id;


$os=$_SESSION["o"];
 
 $op=$_SESSION["p"];

$_SESSION["os"]=$os;
 
 $_SESSION["op"]=$op;
 


?>
<?php

 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 $stmt = $idr->prepare("select * from client c , crm cr where c.id = cr.id  
                    and (number=? or inumber=? or telmobile=? or telother=?)
					");
   
   $stmt->bind_param("iiii",$id,$id,$id,$id );
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
	
 window.open ("http://192.168.0.106//search.php","","menubar=0,resizable=1,width=480,height=620");
	
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





   <!legend style="font-size:30px;color:red;background:lightblue"></legend>
 <table style="width:100%   ";  >

<tr><td  valign="top"   style="align:left"  >  
<form method="post"  action="<?php echo htmlspecialchars("test75.php");?>" > 


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="co" placeholder=""  readonly name="co"     >
</div><br>




<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Task</label>
  <input type="text" class="form-control" id="ta" placeholder="" name="ta"     >
</div><br>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Last Contacted</label>
  <input type="text" class="form-control" id="ap" placeholder="" name="na"     >
</div><br>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Last Activity </label>
  <textarea class="form-control" id="cp" rows="3"  name="la"       ></textarea>
</div>



<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Complaint</label>
  <textarea class="form-control" id="em" rows="3"  name="ur"       ></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Status</label>
  <input type="text" class="form-control" id="bu" placeholder="" name="bu"     >
</div><br>



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
<!--input type="hidden" id="opp" value="<?php echo $op?>"-->
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



