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
include_once './controllers/controllers.pagination.php';

// TODO Add flexbox container around results
// TODO Templateize the html blow to clean up this file

// id query string value sanitized to prevent possible SQL injection
if (!empty($_GET["guitar_id"])) {
    $id = filter_input(INPUT_GET, "guitar_id", FILTER_SANITIZE_NUMBER_INT);
    $item = single_guitar_array($id);
     echo "<h5>",
          $item["year"] . " " ,
          $item["make"] . " ",
          $item["model"] . "</h5><br>",
          '<img src="',
          $item["image_url"],
          '" class="img-thumbnail" width="300" alt="',
          '">' . "<br><br><br><br>"; 
}
if (!empty($_GET["amp_id"])) {
    $id = filter_input(INPUT_GET, "amp_id", FILTER_SANITIZE_NUMBER_INT);
    $item = single_amp_array($id);
     echo "<h5>",
          $item["year"] . " " ,
          $item["make"] . " ",
          $item["model"] . "</h5><br>",
          '<img src="',
          $item["image_url"],
          '" class="img-thumbnail" width="300" alt="',
          '">' . "<br><br><br><br>"; 
}

// Clicking Show All button displays all Guitars and Amps in database
if (isset($_GET["show_all"])) {
    $guitars = display_guitars($items_per_page, $offset);
    $amps = display_amps($items_per_page, $offset);
    echo $pagination . "<br>";

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
}
   
// Clicking RAND button displays random Guitar from database
if (isset($_GET["random"])) {
    $rand_guitar = random_guitar_array();
    echo "<h5>",
          $rand_guitar["year"] . " " ,
          $rand_guitar["make"] . " ",
          $rand_guitar["model"] . "</h5><br>",
          '<img src="',
          $rand_guitar["image_url"],
          '" class="img-thumbnail" width="300" alt="',
          '">' . "<br><br>"; 

    $rand_amp = random_amp_array();
    echo "<h5>",
          $rand_amp["year"] . " " ,
          $rand_amp["make"] . " ",
          $rand_amp["model"] . "</h5><br>",
          '<img src="',
          $rand_amp["image_url"],
          '" class="img-thumbnail" width="300" alt="',
          '">' . "<br><br>"; 
    
}
