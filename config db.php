<?php

    // Database connection
    try {
        $db = new PDO('mysql:host=localhost;dbname=deming', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>