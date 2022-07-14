<?php
session_start();

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "office";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);


?>