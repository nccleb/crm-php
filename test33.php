<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>







<title></title>
</head>
<body>
<?php
$idr = mysqli_connect("192.168.22.105", "root", "1Sys9Admeen72", "nccleb_test");
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
      
	$id=$file[0];
	$nom=$file[2];
	$prenom=$file[3];
  $filename=$file[4];
  $category=$file[5];
  $source=$file[6];
	$company=$file[7];
  $job=$file[8];
  
	$number=$file[9];
	$inumber=$file[10];
	$email=$file[11];
	$url=$file[12];
	$business=$file[13];  
  $grade=$file[14];
	$payment=$file[15];
	$card=$file[16]; 
  $community=$file[17];
  $telmobile=$file[18];
  $telother=$file[19];
  $city=$file[20];
	$street=$file[21];
	
	$apartment=$file[22];
	$building=$file[23];
	$zone=$file[24];
  $floor=$file[25];
  $near=$file[26];
	$remark=$file[27];
	$address=$file[28];
	$address2=$file[29];
	
  $idf=$file[30];
	$idx=$file[31];
	
  
	
	
	
	  
	
	


	

	
	 if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$id)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Id format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
	   
	   
	   
   
   
   
    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$nom)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Name format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

 if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$prenom)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Name format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$filename)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Filename format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$category)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Company format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$source)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Company format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$company)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Company format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$job)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Company format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$number)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Number format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$inumber)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid INumber format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$email)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid email format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$url)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid email format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$business)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid business format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }


   if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$grade)) {
    echo "<p style=\"color:red;font-size:28px\">Invalid grade format!</p>"."<br/>";
    echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  

   }


   if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$payment)) {
    echo "<p style=\"color:red;font-size:28px\">Invalid payment format!</p>"."<br/>";
    echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
     }

   if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$card)) {
      echo "<p style=\"color:red;font-size:28px\">Invalid card format!</p>"."<br/>";
      echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
      exit();  
       }


       if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$community)) {
        echo "<p style=\"color:red;font-size:28px\">Invalid card format!</p>"."<br/>";
        echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
        exit();  
         }
          
    

     if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$telmobile)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Telmobile format !</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }
   
	   
    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$telother)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Telother format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }

  
	  	
   
   
   



  

    
  


     




   
    
   
    
   
   
    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$city)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid City format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



    if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$street)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid street format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

   


    if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$apartment)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Apartment format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

    if (!preg_match("/^[0-9a-zA-Z'?;~+%`\[\]()$*|:.,#&_\s- ]*$/",$building)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Building format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }
	   	   
    if (!preg_match("/^[0-9a-zA-Z'?;~+%`\[\]()$*|:.,#&_\s- ]*$/",$zone)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Zone format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }


   if (!preg_match("/^[0-9a-zA-Z()=%`#_?*;\[\]~&'+-\.\p{Arabic} ]*$/u",$floor)) {
    echo "<p style=\"color:red;font-size:28px\">Invalid Floor format!</p>"."<br/>";
    echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
  }
   
    if (!preg_match("/^[0-9a-zA-Z'?;~+%`\[\]()$*|:.,#&_\s- ]*$/",$near)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Near format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }  
   
   if (!preg_match("/^[0-9a-zA-Z'?;~+%`\[\]()$*|:.,#&_\s- ]*$/",$remark)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Remark format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }  
    
    if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$address)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Address format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }  
   
   
   if (!preg_match("/^[0-9a-zA-Z'?!=@;~+%`\[\]()$*|:.,#&_\s-\p{Arabic} ]*$/u",$address2)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Address2 format!</p>"."<br/>";
  echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
   }  
   
   
   if (!preg_match("/^[0-9a-zA-Z'?;~+%`\[\]()$*|:.,#&_\s- ]*$/",$idf)) {
    echo "<p style=\"color:red;font-size:28px\">Invalid idf format!</p>"."<br/>";
    echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
     } 
     
     if (!preg_match("/^[0-9a-zA-Z'?;~+%`\[\]()$*|:.,#&_\s- ]*$/",$idx)) {
      echo "<p style=\"color:red;font-size:28px\">Invalid idx format!</p>"."<br/>";
      echo "<button  id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
      exit();  
       } 
     
   
   
   
   $req = $idr->prepare("INSERT INTO client (id ,nom,prenom,filename,category,source,company,job,number,inumber,email,url,business,grade,payment,card,community,telmobile,telother,city,street,apartment,building,zone,floor,near,remark,address,address_two,idf,idx) VALUES (?,?,?,?,?,?,?,?,?,?,?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

   $req->bind_param("isssssssssssssssssssssssissssii", $id, $nom,$prenom,$filename,$category,$source,$company,$job,$number,$inumber,$email,$url,$business,$grade,$payment,$card,$community,$telmobile,$telother,$city,$street,$apartment,$building,$zone,$floor,$near,$remark,$address,$address2,$idf,$idx);


   $req->execute();


   $req->close();
   
   
   
   



    
 

   
	
	
   }
   
    $req1=mysqli_query($idr,"select * from client");
	
	
	
	   if(mysqli_num_rows($req1)>0){
		   echo "<p style=\"color:red;font-size:28px\">data is well inserted</p>";
		   echo "<button id=\"id\"   type=\"button\" onclick=\"quit()\">Quit</button>";
		   fclose($handle);
		   mysqli_close($idr);
	   }
	   else{
		   
		   echo "<p style=\"color:red;font-size:28px\">data was not inserted</p>";
		   echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
   }
   
      
	


	

?>	
</body>
</html>			
			
	