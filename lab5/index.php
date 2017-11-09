<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            if($_GET['task'] == 'delete')
                echo 'You have successfully deleted a record from the table!';
            elseif($_GET['task'] == 'update')
                echo 'You have successfully updated a record from the table!';
            elseif($_GET['task'] == 'create')
                echo 'You have successfully created a new record!';
        ?>
        <br />
        <a href="/lab5/create.php">Create a record</a><br />
        <a href="/lab5/read.php">Find a record</a><br />
        <a href="/lab5/update.php">Update a record</a><br />
        <a href="/lab5/delete.php">Delete a record</a>
    </body>
</html>