    <?php
    $server = "127.0.0.1";
    $name = "root";
    $password = "";
    $db = "l4sod";
    $connection = mysqli_connect($server, $name, $password, $db);
    if(!$connection)
        {
            die("connection failed:") .mysqli_connect_error($connection);
        }
        else{
            print "connection successfull";
        }
    ?>