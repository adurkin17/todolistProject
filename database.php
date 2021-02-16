<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $user = 'root';

    try {
        $db = new PDO($dsn, $user);
    }
    catch (PDOException $e) {
        $error_message = "Database Error: ";
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }
?>