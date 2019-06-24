<?php 
// get the connection object 
require 'db.php';
// get the record's id
$id = $_GET['id'];
// create sql statement
$sql = "delete from employees where id =:id";
// run the query against the table using the prepare method 
$statement = $connection->prepare($sql);
if($statement->execute([':id' =>$id]))
header('location:index.php');
?>