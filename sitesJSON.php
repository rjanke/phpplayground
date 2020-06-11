<?php

// Get DB connection info
require_once("db_connection.php");

// Make the PDO query
$query = $dbcon->prepare('SELECT * FROM cool_websites');
$query->execute();

// Put all of the results into an array
$cool_websites = $query->fetchAll();

header("Content-type: application/json");
echo(json_encode($cool_websites));