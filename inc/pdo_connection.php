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

echo 'Success: A proper connection to MySQL was made using PDO.';
echo '<br><br>';

try {
    $results = $db->query("SELECT year, make, model FROM guitars");
} catch (\Throwable $th) {
    echo 'Unable to retrieve results.<br>';
    echo 'Error: ' . $th->getMessage();
    exit;
}

// Return query results 
// https://www.php.net/manual/en/class.pdostatement.php
// echo '<pre>', json_encode($results->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT), '</pre><br>';

//TO-DO: Add 'color' column to DB, add 'Amps' DB

// Git token testing