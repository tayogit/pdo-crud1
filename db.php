<?php
// create a connection to database using pdo
$dsn = "mysql:host=localhost;dbname=company";
$username = "root";
$password = "";
$options =[];
// put the $connection object in a try block
try {
    $connection = new PDO($dsn,$username,$password,$options);
    
} catch (PDOException $ex) {
    echo "Error connecting to the database";
}

?>