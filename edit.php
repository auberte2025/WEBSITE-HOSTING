<?php
require_once "dbcon.php";
$id=$_GET["id"];
$sql="select from students where Student_id=$id ";
$result=mysqli_query($connection,$sql);
if($result)
    {
        header("location:add.php");
    }
    else{
        print "sql failed:".mysqli_error($connection);
    }
?>