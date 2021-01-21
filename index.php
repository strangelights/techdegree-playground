<?php

// Testing sandbox
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require './views/views.head.php';
require './views/views.body.php';
include_once './inc/pdo_connection.php';
// include_once './inc/mysqli_connection.php';
include_once './models/models.class.php';
include_once './views/views.class.php';

if (isset($_GET['number'])) {
    $test = $_GET['number'];
    echo 'Number: ', $test;
}





