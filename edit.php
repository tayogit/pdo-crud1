
<?php

    require('db.php');
    $id = $_GET['id'];
    $sql = "select * from employees where id =:id";
    $statement = $connection->prepare($sql);
    $statement->execute([':id'=>$id]);
    $employee = $statement->fetch(PDO::FETCH_OBJ);
    
    if(isset ($_POST['name']) && isset($_POST['email'])) {
        if(!empty($_POST['name']) and !empty($_POST['email'] )) {
       $name = $_POST['name'];
       $email = $_POST['email'];
       $sql = "update  employees set name=:name,email =:email where id =:id";
       // create a statement object to prepare the sql statement
       $statement = $connection->prepare($sql);
       // execute query against database
      if( $statement->execute([':id'=>$id ,':name' =>$name,':email'=>$email])) {
       header('location:index.php');
      }
        
    } 
}
?>

<?php require('header.php') ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update an Employee</h2>
        </div>
        <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success alert-dismissible">
                    <button data-dismiss="alert" class="close">&times;</button>
                        <?= $message ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($error_message)): ?>
                    <div class="alert alert-danger alert-dismissible">
                    <button data-dismiss="alert" class="close">&times;</button>
                        <?= $error_message ?>
                    </div>
                <?php endif; ?>
        
            
            <form method="post" autocomplete="off">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"
                    value="<?= $employee->name ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"
                    value="<?= $employee->email ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit" style="cursor:pointer;">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('footer.php') ?>