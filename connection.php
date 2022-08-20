<?php

const PORT = "localhost";
const USERNAME = "root";
const PASSWORD = "root";
const DBNAME = "students";

// Соединение с базой данных
function connect(){

	$connection = new mysqli(PORT, USERNAME, PASSWORD, DBNAME);
	
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	$connection->set_charset("utf8");

	return $connection;
}

?>