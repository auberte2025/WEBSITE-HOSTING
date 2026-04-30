<?php
require_once "dbcon.php";
$id=$_GET["id"];
$result="select * from students where student_id=$id";
$sql=mysqli_query($connection, $sql);
if($sql)
    {
        
    }
?>