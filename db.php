<?php

$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "login";


$conn = new mysqli($server_name,$username, $password, $db_name);

if($conn->connect_error){

    die('Connection error' . $conn->connect_error);
}

?>