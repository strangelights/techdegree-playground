<?php

// Connect to MAMP MYSQL db via PDO Driver
// https://www.w3schools.com/php/php_mysql_connect.asp

try {
    $db = new PDO("mysql:host=localhost;dbname=playground;port=3306","root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Throwable $th) {
    echo '<h5>Unable to connect.</h5>';
    echo 'Error: ' . $th->getMessage();
    exit;
}