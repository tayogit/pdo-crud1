<?php

require('db.php');
$sql = "select * from employees";
$statement = $connection->prepare($sql);
$statement->execute();
// fetch all data from table using the fetchAll() method
$employees = $statement->fetchAll(PDO::FETCH_OBJ);

/* we can also use 
$statement->fetchAll(PDO::FETCH_BOTH)
$statement->fetchAll(PDO::FETCH_ASSOC)
$statement->fetchAll(PDO::FETCH_NUM)
*/
?>


<?php require('header.php') ?>
<div class="container">
<div class="card mt-5">
<div class="card-header">
<h2>All Employees</h2>
</div>
<div class="card-body">
<table class="table table-dark table-bordered table-hover">
<tr class="text-center">
<th>id</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>
<?php foreach($employees as $employee): ?>
<tr class="text-center">
    <td><?= $employee->id ?></td>
    <td><?= $employee->name ?> </td>
    <td><?= $employee->email ?> </td>
    <td><a href="edit.php?id=<?= $employee->id?>" class='btn btn-info mr-1'> Edit 
            <a onclick="return confirm('Are you sure you want to delete employee record?')" 
             href="delete.php?id=<?= $employee->id?>" class='btn btn-danger'>Delete
    </td>
</tr>
<?php  endforeach; ?>
</table>
</div>
</div>
</div>

<?php require('footer.php') ?>