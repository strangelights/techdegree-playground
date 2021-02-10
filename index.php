<?php

// Testing sandbox
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require './views/views.head.php';
require './views/views.body.php';
include_once './inc/functions.php';
// include_once './inc/pdo_connection.php';  // Moved to inc/functions.php
// include_once './inc/mysqli_connection.php';
include_once './models/models.class.php';
include_once './views/views.class.php';

if (isset($_GET['number'])) {
    $test = $_GET['number'];
    echo 'Number: ', $test;
}

$guitars = display_guitars();
$amps = display_amps();

foreach ($guitars as $guitar) {
    echo "<h5>",
         $guitar["year"] . " " ,
         $guitar["make"] . " ",
         $guitar["model"],
         " - " . $guitar["color"],
         ", Made in " . $guitar["country"] . "</h5><br>",     
         '<img src="',
         $guitar["image_url"],
         '" class="img-thumbnail" width="300" alt="',
         $guitar["year"] . " " ,
         $guitar["model"], 
         '">' . "<br><br>"; 
}

foreach ($amps as $amp) {
    echo "<h5>",
         $amp["year"] . " " ,
         $amp["make"] . " ",
         $amp["model"] . "</h5><br>",
         '<img src="',
         $amp["image_url"],
         '" class="img-thumbnail" width="300" alt="',
         '">' . "<br><br>"; 
}
