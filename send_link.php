<!DOCTYPE html>
<html lang="en">
<head>

<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>






</head>

<body>

<div class="jumbotron"> 








<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
 

    $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
           $email=$_POST['email'];
          
           $select=mysqli_query($idr,"select name,eemail,password from form_element where eemail='$email'"); 
          
           if(mysqli_num_rows($select)==1)

           {
          while($row=mysqli_fetch_assoc($select)){ 
            $name=$row['name']; 
            $email=$row['eemail'];
            $pass=md5($row['password']);
          }


    
         

    echo "<a href='reset2_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('phpmail/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "$email";
    // GMAIL password
    $mail->Password = "$pass";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='$email';
    $mail->FromName='$name';
    $mail->AddAddress('$email', '$name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	

  else{

    echo "<p id=\"form\">MISSING ENTRY ! "."</br>";
    
    echo "<button id=\"form\" class=\" whatsappbutton\"  onclick=\"subm2()\" type=\"button\"  >Login</button>";
    
    }


}

?>



</div>
</body>
</html>
