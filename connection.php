<?php
$con = new mysqli ("localhost","root","","linkedin_system");
if(!$con){
  die("Connection Failed!!". mysqli_connect_error());
}
else{
  //  echo "Connection Successful!!";
}
?>