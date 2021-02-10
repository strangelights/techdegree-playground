<?php

function display_guitars() {
    include "pdo_connection.php";

    try {
        $results = $db->query("SELECT year, make, model, color, country, image_url FROM guitars");
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    // $guitars = json_encode($results->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
    $guitars = $results->fetchAll(PDO::FETCH_ASSOC);
    return $guitars;
}

// To do: Create Amps DB and use JOIN statements and WHERE clause to compbine with Guitars and build function to retrieve specific guitar / amp that meets given criteria.


function display_amps() {
    include "pdo_connection.php";

    try {
        $results = $db->query("SELECT year, make, model, image_url FROM amps");
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    // $amps = json_encode($results->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
    $amps = $results->fetchAll(PDO::FETCH_ASSOC);
    return $amps;
}