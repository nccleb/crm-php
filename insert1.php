
<!--?php

  
$con = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$subject =  $_POST["subject"];
$comment =  $_POST["comment"];
$query = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
mysqli_query($con, $query);

?-->


<?php
if(isset($_POST["subject"]))
{
    $con = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
$subject = mysqli_real_escape_string($con, $_POST["subject"]);
$comment = mysqli_real_escape_string($con, $_POST["comment"]);
$query = "INSERT INTO comment(comment_subject, comment_text,comment_status)VALUES ('$subject', '$comment','0')";
mysqli_query($con, $query);
}
?>