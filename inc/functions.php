<?php

function display_results() {
    include "pdo_connection.php";

    try {
        $results = $db->query("SELECT year, make, model FROM guitars");
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $guitars = json_encode($results->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
    return $guitars;
}