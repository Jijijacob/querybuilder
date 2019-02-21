<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"sql_generator");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_connect("localhost","root","");
mysql_select_db("sql_generator");
?>