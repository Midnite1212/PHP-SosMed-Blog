<?php
global $conn;
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "dumet_blog";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>