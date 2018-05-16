<?php
    $dsn = 'mysql:host=localhost;dbname=guest_tracker';
    $username = 'guest_tracker_user';
    $password = 'aHYn5aj6wHrC06mK';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>