<?php

function display_results() {

    try {
    $results = $db->query("SELECT year, make, model FROM guitars");
} catch (\Throwable $th) {
    echo 'Unable to retrieve results.<br>';
    echo 'Error: ' . $th->getMessage();
    exit;
}



$results->fetchAll(PDO::FETCH_ASSOC)

}