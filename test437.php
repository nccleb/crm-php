
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
   


         
   
 
  if(isset($_POST['pipe'])&&isset($_POST['na'])){ 
    
     $y =  $_POST["pipe"];
     $z =  $_POST["na"];
    
    
	  }
	  else {
      echo	  "<script>
    
      alert(\"Missing Entry!  \");
      quit();
     
      
      
    
    </script>";
         
         
      
      
        }
       
         
     
    
    
    
    
    
    ?>
    
    
    
    
    
    </head>
    
    <body >
    
    <?php
    
     $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
  
    

     $stmt = $idr->prepare("INSERT INTO pipeline ($y) VALUES (?)");
  
  
      $stmt->bind_param("s",$z);

      $stmt->execute();

     $r1 = $stmt ->get_result();

     $stmt->close();
  
    
    


     $stmt = $idr->prepare("select idp  from pipeline WHERE $y=? ");
   
   $stmt->bind_param("i",$z );
   $stmt->execute();

     $result = $stmt ->get_result();

     $stmt->close();
   
   
   
   $lig=@mysqli_fetch_assoc($result);
   $cu=$lig['idp'];
   
    if($cu==""){ 
   
	
	  echo"<script>if (confirm(\"Missing Entry!\") == true) {
  //myw=window.open (\"http://192.168.16.103//test436.php?page=$os&page1=$ps&page2=$inc \",\"\",\"menubar=0,resizable=1,width=600,height=800\");
 // quit();
} else {
 // quit();
}
		</script>";
	
    }else{

      echo "<p id=\"p\">Data is well inserted!</p>";
      echo "<a href=\"test436.php?page=$os&&page1=$ps\">INSERT AGAIN</a>"."<br/>";
     
     



    }
	
	

	
   
	
    mysqli_close($idr); 

 













     
    
    
                        
        
         
                
        
    
            
                
                
          
    
    
                 
        
     
    
    
    
    
    
    
    
    
    ?>
    
    
    
    
    
   
            
   
    
    
  
    
    
    
    
    
    
    </form>
    
    
    
   
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
    
    
    
    