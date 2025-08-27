
<!DOCTYPE html>
<html>
<head>
<title>dbf</title>

<?php
$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
   echo  $inc=$CallRecord->CallerID;
    $date=$CallRecord->Date;
	$time=$CallRecord->Time;
}  







?>



<script>
function rep(){
	location.replace("test15.php");
}
function on(){
	y=setInterval("rep()",20000);
}






</script>




</head>
<body onload="">
  <?php
  
  if($inc!=""){
		
			
	sleep(180);		
			
			
 
  
  error_reporting(E_ALL ^ E_DEPRECATED);
  $fr=fopen("C:\ProgramData\WinTariff32\Calls\Calls.dbf","r");
while($ch=fgets($fr)){
	 $ch;
    $tab=explode("RC",$ch);
  print_r($tab);
  }
    	//echo  $cn=count($tab);
        $co=count($tab);
	 $cb=$co-1;
	   $co-=2;
	 $ca=$co-1;
	
	//echo substr($tab[$co],-16)."<br>";
	//echo substr($tab[$ca],-16);
     
		 
      $a=substr($tab[$cb],19,3);
		$a = trim($a);
		
		$s = substr($tab[$cb],-3,-1);
		$s = trim($s);
		
		 $x = substr($tab[$cb],448,2);
		 $x = trim($x);
		
		$du = substr($tab[$cb],-51,-49);
		$du = trim($du);
		
		if(preg_match("/NA/",$tab[$co]))
		{ 
        //$b=trim($tab[$co]," NA ) ");
		//$s="NA";
		$c=substr($tab[$co],-16,-8);
		}
		if(preg_match("/AN/" ,$tab[$co]))
		{ 
		//$b=trim($tab[$co],"/ AN )/" );
		//$s="AN";
		$c=substr($tab[$co],-16,-8);
		}
		if(preg_match("/RC/" ,$tab[$co]))
		{ 
		//$b=trim($tab[$co],"/ RC )/" );
		//$s="";
		$c=substr($tab[$co],-16);
		
		}
		
		else
		{
		$c=substr($tab[$co],-16,-8);	
			
		}

		$c = trim($c);
		
		date_default_timezone_set("Asia/Beirut");
		$d=date("Y/m/d");
		$d = trim($d);
		
		$t=date("h:i:sa");
		$t = trim($t);
		
	    $cb;
		
			
		if(preg_match("/TR/" ,$tab[$cb])){		
				
		
        $str="<show>"."\n"."<date>$d $t</date>"."\n"."<ext>$a</ext>"."\n"."<incomingNumber>$c</incomingNumber>"."\n".
		"<status>$s</status>"."\n"."<duration>$du</duration>"."</show>"."\n" ;
     $fp=fopen("calls.xml","w"); 
        $str1="<?xml version=\"1.0\" encoding=\"utf-8\"?>"."\n";
        $str1.="<program>"."\n";
		$str2="</program>";
        fputs($fp,$str1);
        fputs($fp,$str);
        fputs($fp,$str2);
  fclose($fp);
  
  
  
    
		 
		
	 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	
	$stmt = $idr->prepare("insert into billing (callerId,extension,duration,status) values(?,?,?,?)");
  
  
     $stmt->bind_param("iiis",$c,$a,$du,$s);

     $stmt->execute();

     $r1 = $stmt ->get_result();

     $stmt->close();
	 
	 
	 
	 
	 
	 date_default_timezone_set("Asia/Beirut");
		$d=date("Y/m/d");
		$d = trim($d);
		
		$t=date("h:i:sa");
		$t = trim($t);	
	
$to = "nccleb@gmail.com";
$subject = "My subject";
$txt ="hello".$c;
$headers = "From: nccleb@gmail.com" . "\r\n" .
"CC: ";

mail($to,$subject,$txt,$headers);
	 
	 
	 
	 
	 
  
	}
	 
		}
	 
		//}
    
 
		 




  
  
  
  
  
  
  ?>
</body>
</html>    
        
        
        
       
        
        
        
        




    
             
   

        
        
        
        
        
      
      
        



  
  















