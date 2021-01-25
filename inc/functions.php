<?php

function display_results() {
    include "pdo_connection.php";

    try {
        $results = $db->query("SELECT year, make, model, image_url FROM guitars");
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