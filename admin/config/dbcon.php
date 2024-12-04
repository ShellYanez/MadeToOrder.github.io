<?php

$host= "localhost";
$username ="root";
$password = "root";
$dbname="MadeToOrder";

//Creating db connection
$con= mysqli_connect($host, $username, $password, $dbname);


//check connection
if(!$con){
    die("Connection failed: ".mysqli_connect_error);
}



?>