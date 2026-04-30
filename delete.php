<?php
require_once "dbcon.php";
$id=$_GET["id"];
$sql="delete from students where student_id=$id";
$result= mysqli_query($connection,$sql);
if($result)
{
header("location:databaseconnection by php.php");
}
else{
print "student delation failed" . mysqli_error($connection);
    }
?>