<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "antighin";

// Cream conexiunea
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// verificam conexiunea
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
