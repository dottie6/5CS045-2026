<?php
$mysqli = new mysqli("localhost", "2325154", "Strawberry06@_", "db2325154");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>