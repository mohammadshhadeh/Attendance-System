<?php
    /* Database connection settings */
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rfid_database_sys";

	$conn = new mysqli($servername, $username, $password, $dbname);
	global $conn;
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
