<?php
    // Set data source name, username, and password to access database
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'root';
    $password = 'sesame';

    // Login to the data, database connection fails display error page
    try {
        $db = new PDO ($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }
