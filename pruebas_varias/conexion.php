<?php
function Conectarse()  
{ 
$servername="127.0.0.1";
$username="tpweb";
$password="tpweb999";
$dbname="tpweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

return $conn;
}
?>
