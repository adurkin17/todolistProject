<?php
require('database.php');


$query = 'SELECT * FROM todolist' ;

$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor(); 

$newTitle = filter_input(INPUT_POST, "Title", FILTER_SANITIZE_STRING);
$newDescription = filter_input(INPUT_POST,  "Description", FILTER_SANITIZE_STRING);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header><h1>To-Do List</h1></header>
    <main>
        <form action = "<?php echo $_SERVER['PHP_SELF'] ?>" method "POST" >
        <input type = "text" id = "Title" name = "Title">
        <br>
        <input type = "text" id = "Desctiption" name = "Description">
        <button type = "button">Enter!</button>
        </form>
        <?php require ("database.php");?>

        <?php 
        if($newTitle && $newDescription)
        {
            $query = 'INSERT INTO todolist (Title,Description) VALUES (:newTitle, :newDescription)';

            $statement = $db->prepare($query);
            $statement->bindValue(':newTitle', $newTitle);
            $statement->bindValue(':newDescription', $newDescription);
            $statement ->execute();
            $statement-> closeCursor();
        }
        ?>
        <?php
        if(empty($results)){?>
        
            <h1>No To Do List</h1>
        <?php } ?>
        <?php else {?>
        
        <?php}?>
    </main>
</body>
</html>