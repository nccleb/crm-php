<?php
  
  $con = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
if(isset($_POST['view'])){
// $con = mysqli_connect("192.168.16.103", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE posts SET post_status = 1 WHERE post_status=0";
   mysqli_query($con, $update_query);
}
/*
$query = "SELECT * FROM crm cr , form_element fl 
 where cr.idfc = fl.idf
 ORDER BY idc DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["num"]."\n".$row["name"].'</strong><br />
  <small><em>'.$row["incident"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Notifications Found</a></li>';
}
*/
$status_query = "SELECT * FROM posts WHERE post_status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>