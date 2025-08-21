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
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
        
        
        
  $select=mysqli_query($idr,"select eemail,password from form_element where eemail='$email' and md5(password)='$pass'");
  if(mysqli_num_rows($select)==1)
  {
    ?>
    <form id="form" method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
}
?>


</div>
</body>
</html>