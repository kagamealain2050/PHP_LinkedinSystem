<?php
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";
if($con->query($sql) == TRUE){
   echo "Deletion Successful.";
}else{
    echo "Error deleting record: ". $con->error;
}
$con->close();
header("location:select.php");
?>