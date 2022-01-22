<?php

$server ="localhost";
$username="root";
$password="";
$database="GRIP_Bank";

$conn=mysqli_connect($server,$username,$password,$database);

if($conn)
{
    //Connection successful
}
else
{
    //die("Connection To This Database Failed Due To ".mysqli_connect_error());
}

?>