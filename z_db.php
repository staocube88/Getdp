<?php
$con = new mysqli("localhost", "root", "", "selfie");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;	
}
?>