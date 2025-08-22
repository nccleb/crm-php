<?php
session_start();
 $mapo=$_SESSION["mapi"];

?>

<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>


<?php














$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
   $inc=$CallRecord->CallerID;;
   
}  

$inc = "81721326";






/*
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
 

 

 include('test449.php');

 */
 
 
 
	$idr = mysqli_connect("192.168.22.105", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}




	
	          
		$stmt = $idr->prepare("SELECT  * FROM client 
      
       	where (number=? or inumber=? or telmobile=? or telother=? )   ");
	  
 
$stmt->bind_param("iiii",$inc,$inc,$inc,$inc );

$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){

	  
	          
			  
	         
              $num=$row['number'];
			  
              if(strlen($num)==7){
              $num="0".$num;
			  }			  
			  
			  
			  $inum=$row['inumber'];
			  
              if(strlen($inum)==7){
              $inum="0".$inum;
			  }			  
             $name=$row['nom']; 
			  $id=$row['id'];
		      $_SESSION["id"]=$id;
              $company=$row['company'];
			  $email=$row['email'];
			  $business=$row['business'];
			  $grade=$row['grade'];
			  $address=$row['address'];
			  $url=$row['url'];
			  $url = substr($url, 7);
			  $idf=$row['idf'];
			  $city=$row['city'];
			  $street=$row['street'];
			  $floor=$row['floor'];
			  $building=$row['building'];
			  $zone=$row['zone'];
			  $near=$row['near'];
			  $remark=$row['remark'];
			  $idf=$row['idf'];
			  $telmobile=$row['telmobile'];
			  if(strlen($telmobile)==7){
              $telmobile="0".$telmobile;
			  }			  
			  
			  $telother=$row['telother'];
			  if(strlen($telother)==7){
              $telother="0".$telother;
			  }			  
			  
			 $apartment=$row['apartment'];
			  
			  
		}
	 
	  
	  
// SIMPLE VERSION - Just add this to your test204.php after the existing client query

// Build full address from existing variables (you already have these)
 
			  
			 $simple_address = "";
if(isset($city) && $city) $simple_address .= $city. ", ";
if(isset($zone) && $zone) $simple_address .="Zone " . $zone. ", ";       
if(isset($street) && $street) $simple_address .="Street " . $street . ", ";
if(isset($building) && $building) $simple_address .= "Building " . $building . ", ";
 if(isset($apartment) && $apartment) $simple_address .="Apartment " . $apartment . ", ";
if(isset($floor) && $floor) $simple_address .= "Floor " . $floor . ", ";
if(isset($near) && $near) $simple_address .="Near " . $near. ", ";
if(isset($address) && $address) $simple_address .= "address1 " . $address . ", ";
if(isset($address2) && $address2) $simple_address .= "address2 " . $address2;
?>
	 
	
	  
	 
		  
 

<?php
 $_SESSION["ses"]=$_POST['bp'];
  $s=$_SESSION["ses"];
$cookie_name = "user";
$cookie_value = $_POST['bp'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 
  
    $nam=$_GET['pag'];
   if($nam == ""){
    exit( "sorry! You have to login first in mypwca!"    );
    
   }
  $idf=$_GET['pag1'];

$_SESSION["oop"]=$nam;
$_SESSION["ooq"]=$idf;


$cookie_name = "oop";
 $cookie_value =$nam;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 

 
$cookie_name = "ooq";
$cookie_value = $idf;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 


?>



<!DOCTYPE html>
<html lang="en">
<head>


<style>
        body {
            background-color: #f8f9fa;
            /*padding: 20px;*/
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .form-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-title {
            color: #1976D2;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
            font-size: 24px;
            border-bottom: 2px solid #e3f2fd;
            padding-bottom: 15px;
        }
        
        .form-group-enhanced {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label-enhanced {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #1565C0;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control-enhanced {
            display: block;
            width: 100%;
            padding: 14px 16px;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
            color: #1976D2;
            background-color: #fff;
            background-clip: padding-box;
            border: 2px solid #BBDEFB;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.03);
        }
        
        .form-control-enhanced:focus {
            color: #0D47A1;
            background-color: #F5FBFF;
            border-color: #64B5F6;
            outline: 0;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.15), inset 0 1px 2px rgba(0, 0, 0, 0.03);
        }
        
        .form-control-enhanced::placeholder {
            color: #90CAF9;
            font-weight: 400;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 40px;
            color: #64B5F6;
            font-size: 18px;
        }
        
        .helper-text {
            display: block;
            margin-top: 6px;
            font-size: 13px;
            color: #546E7A;
            font-style: italic;
        }
        
        .input-highlight {
            display: inline-block;
            background-color: #E3F2FD;
            color: #1976D2;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 5px;
        }
        
        /* Animation for focus */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(33, 150, 243, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(33, 150, 243, 0); }
            100% { box-shadow: 0 0 0 0 rgba(33, 150, 243, 0); }
        }
        
        .form-control-enhanced:focus {
            animation: pulse 1.5s infinite;
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .form-container {
                padding: 20px 15px;
            }
            
            .form-control-enhanced {
                padding: 12px 14px;
            }
        }
    </style>




 <style>
        /* Add these styles to your existing CSS */
        .save-status {
            padding: 8px 12px;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 14px;
            display: none;
            text-align: center;
        }
        
        .save-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .save-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .save-button {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 10px;
            width: 100%;
        }
        
        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .save-button:active {
            transform: translateY(0);
        }
        
        .autosave-indicator {
            font-size: 12px;
            color: #6b7280;
            text-align: right;
            margin-top: 5px;
            display: none;
        }
    </style>








   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>










<script type="text/javascript" src="js/test371.js"></script>
		

<link rel="stylesheet" href="css/stylei.css">
<link rel="stylesheet" href="css/stylei2.css">


<input type="hidden" id="demo" value="<?php echo $nam ?>"></input>
<input type="hidden" id="demo1" value="<?php echo $idf ?>"></input>
<input type="hidden" id="demo2" value="<?php echo $inc ?>"></input>


<script>
const global = document.getElementById("demo").value;
const global1 = document.getElementById("demo1").value;
const global2 = document.getElementById("demo2").value;

</script>


<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Blue navbar styling */
        .navbar-blue {
            background: linear-gradient(135deg, #1976D2 0%, #0D47A1 100%);
            border: none;
            border-radius: 0;
            margin-bottom: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .navbar-blue .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 20px;
        }
        
        .navbar-blue .navbar-nav > li > a {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 15px 20px;
        }
        
        .navbar-blue .navbar-nav > li > a:hover,
        .navbar-blue .navbar-nav > li > a:focus {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .navbar-blue .navbar-toggle {
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        .navbar-blue .navbar-toggle .icon-bar {
            background-color: white;
        }
        
        .navbar-blue .navbar-toggle:hover,
        .navbar-blue .navbar-toggle:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .navbar-blue .dropdown-menu {
            background-color: white;
            border: none;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 0;
        }
        
        .navbar-blue .dropdown-menu > li > a {
            color: #333;
            padding: 12px 20px;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .navbar-blue .dropdown-menu > li > a:hover {
            background-color: #f8f9fa;
            color: #1976D2;
            padding-left: 25px;
        }
        
        .navbar-blue .dropdown-menu > li:last-child > a {
            border-bottom: none;
        }
        
        .navbar-blue .navbar-text {
            color: white;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        
        .navbar-blue .navbar-right > li > a {
            padding: 15px 15px;
        }
        
        /* Special styling for the login info */
        .login-info {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 4px;
            padding: 5px 12px;
            margin: 10px 5px;
            color: white;
            font-weight: 500;
        }
        
        /* Blue submenu headers */
        .blue-subheader {
            background-color: #1976D2;
            color: white !important;
            font-weight: bold;
            padding: 10px 20px !important;
            margin-top: 5px;
            border-bottom: none !important;
        }
        
        .blue-subheader:hover {
            background-color: #1976D2 !important;
            color: white !important;
            cursor: default;
            padding-left: 20px !important;
        }
        
        /* Add some spacing improvements */
        .navbar-blue .dropdown-menu {
            min-width: 220px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767px) {
            .navbar-blue .navbar-nav .open .dropdown-menu > li > a {
                color: #333;
                padding: 12px 20px;
            }
            
            .navbar-blue .navbar-nav .open .dropdown-menu > li > a:hover {
                color: #1976D2;
                background-color: #f8f9fa;
            }
            
            .login-info {
                margin: 5px 15px;
                display: inline-block;
            }
        }
    </style>









 

	





      <style>


        .btn-modern {
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-success-modern {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .btn-warning-modern {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        }

        


        .action-buttons {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 20px;
        }

        
    </style>
 
  
  
  
</head>
<body onload="on(); loadSavedNotes();">
    <!-- Your existing navbar and other content -->

    
   
 <!-- Blue Navigation Bar -->
    <nav class="navbar navbar-blue">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>   
                    <span class="icon-bar"></span>       
                </button>
                <a class="navbar-brand" href="#">
                    <i class="fas fa-headset"></i> NCC
                </a>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <span class="login-info">
                            <i class="fas fa-user"></i> Login as <?php echo $nam ?>
                        </span>
                        <li><a href="login200.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a></li>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-h"></i> More <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="javascript:search5()">First name</a></li>
                            <li><a href="#" onclick="javascript:search15()">Last name</a></li>
                            <li><a href="#" onclick="javascript:search16()">Company</a></li>
                            <li><a href="#" onclick="javascript:search2()">Business</a></li>
                            <li><a href="#" onclick="javascript:del()">Del</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fas fa-tasks"></i> Dispatcher <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="javascript:dispatch()">New Assignment</a></li>
                        </ul>
                    </li>

                    

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fas fa-chart-bar"></i> Reports <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="javascript:list1()">Simple List(Clients)</a></li>
                            <li class="blue-subheader">Tickets</li>  
                            <li><a href="#" onclick="javascript:list79()">Simple List(Tickets)</a></li>
                            <li><a href="#" onclick="javascript:tick79()">Open Tickets</a></li>
                                   
                            <li><a href="#" onclick="javascript:incidents()">Tickets Details</a></li>
                            <li><a href="#" onclick="javascript:incidents2()">Statistics(Tickets)</a></li> 
                        </ul>
                        
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fas fa-cog"></i> System <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="blue-subheader">Users</li>
                            <li><a href="#" onclick="javascript:add3()">Add_user</a></li>
                            <li><a href="#" onclick="javascript:add22()">Users</a></li>
                            
                            <li class="blue-subheader">AGENTS</li>
                            <li><a href="#" onclick="javascript:search10()">Agent</a></li>
                            <?php if($nam=="admin"): ?>
                                <li><a href="#" onclick="javascript:adag()">Add_agent</a></li>
                                <li><a href="#" onclick="javascript:delag()">Del_agent</a></li>
                                <li><a href="#" onclick="javascript:delal()">Del-ALL</a></li>
                            <?php endif; ?>
                            <li class="blue-subheader">Complaints</li>
                            <li> <a href="#" onclick="javascript:add322()">Complaints</a>  </li>
                            <li>  <a href="#" onclick="javascript:add33()">Add-Complaint</a></li>
                            
                            <li>  <a href="#" onclick="javascript:del_ag1()">Delete Complaint</a></li>
                            <li>  <a href="#" onclick="javascript:del_al1()">Delete ALL</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fas fa-database"></i> Data <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="blue-subheader">Import</li>
                            <li><a href="#" onclick="javascript:Import()">Client</a></li>
                            
                            <li class="blue-subheader">Export</li>
                            <li><a href="#" onclick="javascript:Export()">Client(Raw)</a></li>
                            
                            <li class="blue-subheader">Operations</li>
                            <li><a href="#" onclick="javascript:bb()">BACK-UP</a></li>
                            <li><a href="#" onclick="javascript:ImportSql()">RECOVERY</a></li>
                             <?php
         if( $nam=="user"){



         echo " 
        
         <li class=\"blue-subheader\" >DELETE</li>
  
      <li> <a href=\"#\" onclick=\"javascript:delAll()\">Delete All CLIENT</a></li>
      <li> <a href=\"#\" onclick=\"javascript:delAll2()\">Delete All COMPLAINTS</a></li>
      <!--li> <a href=\"#\" onclick=\"javascript:delAll6()\">Delete All DEALS</a></li>
      <li> <a href=\"#\" onclick=\"javascript:delAll5()\">Delete All POSTS</a></li-->
     
              ";
		
	
		  
		  
         }
         ?>
          
                           
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     














<div >


  <table  style="background:#f8f8f8"  class="table"    id="comment_form"  >
  <tr >
 
  <th style="width:20%;background:lightgrey "    >

  <div class="form-container">

        
        <div class="form-group-enhanced">
            <label for="bp" class="form-label-enhanced">
                <i class="fas fa-phone"></i> INCOMING CALL
            </label>
            <input type="text" class="form-control-enhanced" id="bp" placeholder="" name="bp">
            <span class="input-icon"><i class="fas fa-phone-volume"></i></span>
            
           
        </div>
        
        <div class="form-group-enhanced">
            <label for="ap" class="form-label-enhanced">
                <i class="fas fa-user"></i> CUSTOMER NAME
            </label>
            <input type="text" class="form-control-enhanced" id="ap" placeholder="" name="ap">
            <span class="input-icon"><i class="fas fa-user-circle"></i></span>
            
        </div>
        
        


        

   <!--div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Last Contacted</label>
 <input style="font-size:13px;" id="lc" rows="5"  name="lc" ></input>
</div>

  

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Ticket Name</label>
 <input style="font-size:13px;" id="iss" rows="5"  name="iss" ></input>
</div>



   <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Complaint </label>
 <textarea style="font-size:13px;" id="comp" rows="5"  name="comp" ></textarea>
</div>


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Status..</label>
  <input  style="font-size:13px;"   id="stat" rows="5"  name="stat" ></input>
</div-->


 
      </th>

      <th>

   
  
      
   
  
  
   
  
   
  
   

  
  
  
  
  
	  
	    
		


 




<div class="mb-3">
 

  <textarea   style="background: #f1f5f9;"    class="form-control" id="cp" rows="38"  name="cp"      ></textarea>
</div>




</th>

<th  style="width:30%"        >


<!--button   style="color:black"           class="btn btn-success   btn-block "      type="button" id="form" onclick="refresh()">R</button> 
           
              <ul   class="list-group">
              <li      class="list-group-item "><a   style="color:black"       href="#" onclick="javascript:add110()">Add Client</a></li>
                  
			    <li class="list-group-item "><a  style="color:black"     href="#" onclick="javascript:number23()">Edit Client(Actual)</a></li>
               
				<li class="list-group-item "><a  style="color:black"         href="#" onclick="javascript:number22()">Search Client(Number) </a></li-->
 <div class="row">
            <div class="col-lg-8">
        <div class="mb-3">
            <textarea class="form-control form-control-modern" id="notesArea" rows="2" 
                      placeholder="Notes and comments..." style="background: #f1f5f9;"></textarea>
            <div class="autosave-indicator" id="autosaveIndicator">Auto-saved</div>
        </div>
        
        <!-- Add this button below your textarea -->
        <button class="save-button" onclick="saveNotes()">
            <i class="fas fa-save me-2"></i>Save Notes
        </button>
        
        <div class="save-status" id="saveStatus"></div>
    </div>

    <!-- Your existing content -->

    <script>
        // Add this script to handle saving notes
        let notesSaveTimeout;
        let currentClientId = "<?php echo isset($id) ? $id : 'default'; ?>";
        let currentAgent = "<?php echo $nam; ?>";
        
        // Function to save notes
        function saveNotes() {
            const notesText = document.getElementById('notesArea').value;
            
            // Create form data
            const formData = new FormData();
            formData.append('client_id', currentClientId);
            formData.append('agent', currentAgent);
            formData.append('notes', notesText);
            formData.append('action', 'save_notes');
            
            // Send AJAX request
            fetch('save_notes.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const statusElement = document.getElementById('saveStatus');
                if (data.success) {
                    statusElement.className = 'save-status save-success';
                    statusElement.innerHTML = '<i class="fas fa-check-circle"></i> Notes saved successfully!';
                    statusElement.style.display = 'block';
                    
                    // Hide status after 3 seconds
                    setTimeout(() => {
                        statusElement.style.display = 'none';
                    }, 3000);
                } else {
                    statusElement.className = 'save-status save-error';
                    statusElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Error saving notes: ' + data.message;
                    statusElement.style.display = 'block';
                }
            })
            .catch(error => {
                const statusElement = document.getElementById('saveStatus');
                statusElement.className = 'save-status save-error';
                statusElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Network error saving notes';
                statusElement.style.display = 'block';
                console.error('Error:', error);
            });
        }
        
        // Function to load saved notes
        function loadSavedNotes() {
            // Create form data
            const formData = new FormData();
            formData.append('client_id', currentClientId);
            formData.append('action', 'load_notes');
            
            // Send AJAX request
            fetch('save_notes.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.notes) {
                    document.getElementById('notesArea').value = data.notes;
                }
            })
            .catch(error => {
                console.error('Error loading notes:', error);
            });
        }
        
        // Auto-save functionality (optional)
        function setupAutoSave() {
            const notesArea = document.getElementById('notesArea');
            const autosaveIndicator = document.getElementById('autosaveIndicator');
            
            notesArea.addEventListener('input', function() {
                // Clear previous timeout
                clearTimeout(notesSaveTimeout);
                
                // Set new timeout for auto-save (5 seconds after typing stops)
                notesSaveTimeout = setTimeout(function() {
                    saveNotes();
                    
                    // Show auto-save indicator
                    autosaveIndicator.style.display = 'block';
                    setTimeout(() => {
                        autosaveIndicator.style.display = 'none';
                    }, 2000);
                }, 5000);
            });
        }
        
        // Initialize auto-save when page loads
        document.addEventListener('DOMContentLoaded', function() {
            setupAutoSave();
        });
        
        // Also save notes when leaving the page
        window.addEventListener('beforeunload', function() {
            const notesText = document.getElementById('notesArea').value;
            if (notesText.trim() !== '') {
                // Use synchronous AJAX to ensure data is saved before leaving
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'save_notes.php', false);
                
                const formData = new FormData();
                formData.append('client_id', currentClientId);
                formData.append('agent', currentAgent);
                formData.append('notes', notesText);
                formData.append('action', 'save_notes');
                
                xhr.send(formData);
            }
        });
    </script>





   
<div class="col-lg-4">
  <div class="action-buttons">
    <div class="d-grid gap-2">
      <button class="btn btn-success btn-modern" style="width:100%" onclick="refresh()">
        <i class="fas fa-sync-alt me-2"></i>R
      </button>

      <button class="btn btn-primary btn-modern" style="width:100%" onclick="javascript:add110()">
        <i class="fas fa-user-plus me-2"></i>Add Client
      </button>


      <button class="btn btn-warning btn-modern" style="width:100%" onclick="javascript:number22()">
        <i class="fas fa-search me-2"></i>Search Client
      </button>
       <button class="btn btn-primary btn-modern" style="width:100%"onclick="javascript:add()">
        <i class="fas fa-ticket me-2"></i>Complaints
      </button>
      
      <button class="btn btn-warning btn-modern" style="width:100%" onclick="javascript:uro2()">
        <i class="fas fa-search me-2"></i>Search Ticket(Number)
      </button>
      <button class="btn btn-primary btn-modern" style="width:100%" onclick="javascript:uro8()">
        <i class="fas fa-search me-2"></i>Search Ticket
      </button>
       <button class="btn btn-info btn-modern" style="width:100%" onclick="javascript:tick79()">
        <i class="fas fa-search me-2"></i>Open Tickets
      </button>
    </div>
  </div>
</div>



        <!--li class="list-group-item "><a href="#" onclick="javascript:list1()">Simple List </a></li-->

				    </br>          
								

            <!--li class="list-group-item "><a   style="color:black"        href="#" onclick="javascript:add()">Create Ticket</a></li>  
				 <li class="list-group-item "><a   style="color:black"      href="#" onclick="javascript:uro1()">Edit Last Ticket(Actual Number)</a></li>
				   
                <li class="list-group-item "><a   style="color:black"       href="#" onclick="javascript:uro2()">Search Last Ticket(Number)</a></li>
                <li class="list-group-item "><a   style="color:black"        href="#" onclick="javascript:uro8()">Search Ticket</a></li>
                <li class="list-group-item "><a   style="color:black"     href="#" onclick="javascript:tick79()">Open Tickets</a></li-->
                <!--li class="list-group-item "><a href="#" onclick="javascript:list79()">Simple List </a></li-->
				</br>  

        <!--li class="list-group-item "><a href="#" onclick="javascript:search51()">Create Deal</a></li> 
        <li class="list-group-item "><a href="#" onclick="javascript:search52()">Search Last Deal(Actual Number)</a></li> 
        <li class="list-group-item "><a href="#" onclick="javascript:uro3()">Search Last Deal(Number)</a></li> 
        <li class="list-group-item "><a href="#" onclick="javascript:uro9()">Search Deal</a></li--> 
      </br>
 




  

 

  
          
       

 </th>

  </tr>



 
   
 </table>















 





















 







 </div>


 
 <!--script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script-->
<!-- Add this simple version to your existing test204.php -->
<div style="padding: 10px; background: lightgreen; margin: 10px;">
    <h4>📍 Quick Location Send</h4>
    <?php
    //$address = ($street ?? '') . ' ' . ($building ?? '') . ' ' . ($city ?? '');
     $address =  "hazmieh municipality street rahal building floor 3";
    $link = "https://maps.google.com/maps?q=" . urlencode( $simple_address);
    ?>
    <div id="prin">
    <strong>Address:</strong> <?php echo $simple_address; ?>
    </div>
    <input type="text" id="quickLink" value="<?php echo $link; ?>" style="width: 60%;" readonly>
    
    <button onclick="
        document.getElementById('quickLink').select(); 
        document.execCommand('copy'); 
        alert('✅ Link copied! Now open WhatsApp on your PHONE and paste it to the driver.');
        window.open('https://web.whatsapp.com/', '_blank');
    " style="background: green; color: white; padding: 10px; border: none;">
        📱 Copy & Open WhatsApp
    </button>
</div>






<script>
function copyLink() {
    var linkField = document.getElementById('mapsLink');
    linkField.select();
    document.execCommand('copy');
    alert('Link copied!');
}

function sendToWhatsApp() {
    var driverPhone = document.getElementById('driverPhone').value;
    if (!driverPhone) {
        alert('Please select a driver first!');
        return;
    }
    
    // Clean phone number - remove any spaces, dashes, or + signs except leading +
    driverPhone = driverPhone.replace(/[^\d+]/g, '');
    if (!driverPhone.startsWith('+')) {
        // Add Lebanon country code if not present
        if (driverPhone.length === 8) {
            driverPhone = '961' + driverPhone;
        }
    }
    
    var mapsLink = document.getElementById('mapsLink').value;
    var clientName = '<?php echo isset($name) ? preg_replace("/[^\w\s]/", "", $name) : "Client"; ?>';
    var clientPhone = '<?php echo isset($num) ? $num : ""; ?>';
    //var address = '<?php echo isset($simple_address) ? preg_replace("/[^\w\s,.-]/", "", $simple_address) : ""; ?>';
    var address = '<?php echo "hazmieh municipality "; ?>';
    // Simple message without emojis
    var message = 'DELIVERY ORDER\n\n' +
                 'Client: ' + clientName + ' (' + clientPhone + ')\n\n' +
                 'LOCATION:\n' + mapsLink + '\n\n' +
                 'Address: ' + address + '\n\n' +
                 'Time: ' + new Date().toLocaleString();
    
    // Try different WhatsApp URL formats
    try {
        // Method 1: Standard WhatsApp Web
        var whatsappUrl = 'https://wa.me/' + driverPhone + '?text=' + encodeURIComponent(message);
        window.open(whatsappUrl, '_blank');
    } catch(e) {
        // Method 2: Simple fallback
        var simpleMessage = 'Location: ' + mapsLink;
        var fallbackUrl = 'https://wa.me/' + driverPhone + '?text=' + encodeURIComponent(simpleMessage);
        window.open(fallbackUrl, '_blank');
    }
}

// Alternative function - just send the Google Maps link
function sendSimpleLocation() {
    var driverPhone = document.getElementById('driverPhone').value;
    if (!driverPhone) {
        alert('Please select a driver first!');
        return;
    }
    
    // Clean phone number
    driverPhone = driverPhone.replace(/[^\d+]/g, '');
    if (!driverPhone.startsWith('+') && driverPhone.length === 8) {
        driverPhone = '961' + driverPhone;
    }
    
    var mapsLink = document.getElementById('mapsLink').value;
    var message = mapsLink; // Just send the link
    
    var whatsappUrl = 'https://wa.me/' + driverPhone + '?text=' + encodeURIComponent(message);
    window.open(whatsappUrl, '_blank');
}
</script>

  <?php include 'footer.php';?>


<!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        // Add slight animation to dropdowns
        $(document).ready(function() {
            $('.dropdown').on('show.bs.dropdown', function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(200);
            });
            
            $('.dropdown').on('hide.bs.dropdown', function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
            });
        });
    </script>

    

</body>



          
    

        
      


       

       
     


	  
		  
        
      
	






	
	  












</html>









































 



 
 
 
 
 
 

 

 












 
 
 

 
 










		






































 















































































































 





















