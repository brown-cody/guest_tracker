<?php
    $dsn = 'mysql:host=localhost;dbname=pickinio_guest_tracker';
    $username = 'pickinio_iClient';
    $password = 'guitarpassword99';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>