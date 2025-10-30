
	<?php
    session_start();
     ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <?php include('head.php'); ?>
      <link rel="stylesheet" href="css/stylei.css">
      <link rel="stylesheet" href="css/stylei2.css">
       
      <link rel="stylesheet" href="css/whatsappButton.css" />
      <script src="js/test371.js"></script>
    
     
      
    <?php 
    
    $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ;
    
    
    
    
    $fichier="CaCallStatus.dat";
    $xml=simplexml_load_file($fichier);
    foreach($xml as $CallRecord){
        $ext=$show->ext;
       $inc=$CallRecord->CallerID;;
       
    }  
    
    
    
    
    
    
    
    
    
    $line = '';
    //$f = fopen("c:\MDR\CallerID2022-09.txt", 'r');
    $f = fopen("$opic", 'r');
    $cursor = -1;
    fseek($f, $cursor, SEEK_END);
    $char = fgetc($f);
    //Trim trailing newline characters in the file
    while ($char === "\n" || $char === "\r") {
       fseek($f, $cursor--, SEEK_END);
       $char = fgetc($f);
    }
    //Read until the next line of the file begins or the first newline char
    while ($char !== false && $char !== "\n" && $char !== "\r") {
       //Prepend the new character
       $line = $char . $line;
       fseek($f, $cursor--, SEEK_END);
       $char = fgetc($f);
    }
      $inc= substr($line,49,8);
      $inc = trim($inc);
     fclose($f);
     
     //$inc="5010";
         
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
       
         
     
    
    
    
    
    
    ?>
    
    
    
    <?php
    
     $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
   // $id=$_GET['id']; 
    
    
    
    $stmt = $idr->prepare("select *  from deals d , client c
    where d.idd = c.id
    AND c.number=? 
    ORDER BY d.idce DESC LIMIT 1
    
    ");
    
       
                        
        
         $stmt->bind_param("s",$id );
    
         $stmt->execute();
         $req2 = $stmt ->get_result();
         
         $stmt->close();
       
     
      while($row=mysqli_fetch_assoc($req2)){ 
        
                 $name =$row['name'];
             $id = $row['idce'];
              
           $stage =$row['stage'];
            $amount =$row['amount'];
           $date=$row['close_date']; 
            $owner=$row['owner']; 	   
            $contact1  =$row['nom']." ".$row['prenom']; 
                   $type=$row['type'];
                   $priority =$row['priority'];
                   $description=$row['description'];
                   $daat =$row['contact_date'];
        
    
            
                
                
             }

             $_SESSION["id"]=$id;
             
             $stmt->close();
    
    
    
    
                 
        
     
    
    
    
    
    
    
    
    
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
        
        fieldval = document.getElementById("na").value;
            
            document.getElementById("nam").value = fieldval;		
        
        
        
    fieldval = document.getElementById("st").value;
            
            document.getElementById("sta").value = fieldval;	
        
        
    
    
            
            
    fieldval = document.getElementById("am").value;
            
            document.getElementById("amo").value = fieldval;	
                            
    
            
    fieldval = document.getElementById("da").value;
            
            document.getElementById("dat").value = fieldval;
    
            
    fieldval = document.getElementById("ow").value;
            
            document.getElementById("own").value = fieldval;	
    
            
    fieldval = document.getElementById("co").value;
            
            document.getElementById("con").value = fieldval;	
    
    
            
    fieldval = document.getElementById("ty").value;
            
            document.getElementById("typ").value = fieldval;	
    
    
            
    fieldval = document.getElementById("pr").value;
            
            document.getElementById("pri").value = fieldval;		
            
            
    
            fieldval = document.getElementById("ded").value;
		
    document.getElementById("dd").value = fieldval;	
    
    fieldval = document.getElementById("daat").value;
		
    document.getElementById("date").value = fieldval;	        
        
        
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
    
    
    
    
    
       
     <table style="width:100%   ";  >
    
    <tr><td  valign="top"   style="align:left"  >  
    <form method="post"  action="<?php echo htmlspecialchars("test415.php");?>" > 
    
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Name</label>
      <input type="text" class="form-control" id="nam" placeholder="" name="nam"    >
    </div><br>
    
    
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Deal description</label>
 

  <textarea   style="  "   class="form-control" id="dd" rows="10"  name="dd"      ></textarea>
  </div>
<br>
    
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Stage</label>
      <input type="text" class="form-control" id="sta" placeholder="" name="sta"     >
    </div><br>
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Amount</label>
      <input type="text" class="form-control" id="amo" placeholder="" name="amo"     >
    </div><br>


    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Contact Date</label>
    <input type="text" class="form-control" id="date" placeholder="" name="date"     >
    </div>
    
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Close Date</label>
      <input type="text" class="form-control" id="dat" placeholder="" name="dat"     >
    </div>
    
    
    
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Owner</label>
      <input type="text" class="form-control" readonly id="own" placeholder="" name="own"     >
    </div>
    
    
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Contact</label>
      <input type="text" class="form-control" readonly id="con" placeholder="" name="con"  >
    </div>
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Type</label>
      <input type="text" class="form-control" id="typ" placeholder="" name="typ"  >
    </div><br>
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Priority</label>
      <input type="text" class="form-control" id="pri" placeholder="" name="pri"  >
    </div><br>
    
    
    
    
    
    <input type="hidden" id="na" value="<?php echo $name?>">
    <input type="hidden" id="st" value="<?php echo $stage?>">
    <input type="hidden" id="am" value="<?php echo $amount?>">
    <input type="hidden" id="da" value="<?php echo $date?>">
    <input type="hidden" id="ow" value="<?php echo $owner?>">
    <input type="hidden" id="co" value="<?php echo $contact1?>">
    <input type="hidden" id="ty" value="<?php echo $type?>">
    <input type="hidden" id="pr" value="<?php echo $priority?>">
    <input type="hidden" id="ded" value="<?php echo $description?>">
    <input type="hidden" id="daat" value="<?php echo $daat?>">
    <div id="printDiv">
    
    <input   class="btn btn-success" type="submit" value="Update" id="form">
    
    
    
    
    </form>
    
    
    
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
    
    
    
    