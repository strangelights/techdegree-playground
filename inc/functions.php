<?php

function display_guitars($limit = null, $offset = 0) {
    include "pdo_connection.php";

    try {
        $sql = "SELECT year, make, model, color, country, image_url 
                FROM guitars
                WHERE title LIKE ?";

        if (is_integer($limit)) {
            $results = $db->prepare($sql . " LIMIT ? OFFSET ?");
            // Bind limit and offset param values to the two ? above
            $results->bindParam(1, $limit, PDO::PARAM_INT);
            $results->bindParam(2, $offset, PDO::PARAM_INT);
        } else {
            $results = $db->prepare($sql);
        }
        $results->execute();
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

function display_amps($limit = null, $offset = 0) {
    include "pdo_connection.php";

    try {
        $sql = "SELECT year, make, model, image_url 
                FROM amps 
                WHERE title LIKE ?";

        if (is_integer($limit)) {
            $results = $db->prepare($sql . " LIMIT ? OFFSET ?");
            // Bind limit and offset param values to the two ? above
            $results->bindParam(1, $limit, PDO::PARAM_INT);
            $results->bindParam(2, $offset, PDO::PARAM_INT);
        } else {
            $results = $db->prepare($sql);
        }
        $results->execute();
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    // $amps = json_encode($results->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
    $amps = $results->fetchAll(PDO::FETCH_ASSOC);
    return $amps;
}


function single_guitar_array($id) {
    include "pdo_connection.php";

    try {
        $results = $db->prepare(
            "SELECT year, make, model, image_url 
             FROM guitars 
             WHERE id = ?");
        $results->bindParam(1,$id,PDO::PARAM_INT);
        $results->execute();
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $item = $results->fetch(PDO::FETCH_ASSOC);
    return $item;
}

function single_amp_array($id) {
    include "pdo_connection.php";

    try {
        $results = $db->prepare(
            "SELECT year, make, model, image_url 
             FROM amps 
             WHERE id = ?");
        $results->bindParam(1,$id,PDO::PARAM_INT);
        $results->execute();
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $item = $results->fetch(PDO::FETCH_ASSOC);
    return $item;
}

function random_guitar_array() {
    include "pdo_connection.php";

    try {
        $results = $db->query(
            "SELECT year, make, model, image_url 
            FROM guitars 
            ORDER BY RAND()
            LIMIT 1"
        );
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $item = $results->fetch(PDO::FETCH_ASSOC);
    return $item;
}

function random_amp_array() {
    include "pdo_connection.php";

    try {
        $results = $db->query(
            "SELECT year, make, model, image_url 
            FROM amps 
            ORDER BY RAND()
            LIMIT 1"
        );
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $item = $results->fetch(PDO::FETCH_ASSOC);
    return $item;
}

// Pagination
function get_catalog_count_guitars($category = null): int {
    $category = strtolower($category);
    include "pdo_connection.php";

    try {
        $sql = "SELECT COUNT(id) FROM guitars";
        if (!empty($search)) {
            $result = $db->prepare(
                $sql . " WHERE title LIKE ?"
            );
            $result->bindValue(1, '%'.$search.'%',PDO::PARAM_STR); 
        } else if (!empty($category)) {
            $result = $db->prepare(
                $sql . " WHERE LOWER(category) = ?"
            );
            $result->bindParam(1, $category, PDO::PARAM_STR);
        } else {
            $result = $db->prepare($sql);
        }
        $result->execute();
    } catch (\Throwable $th) {
        echo "bad query";
    }
    $count = $result->fetchColumn(0);
    return $count;
}

function get_catalog_count_amps($category = null): int {
    $category = strtolower($category);
    include "pdo_connection.php";

    try {
        $sql = "SELECT COUNT(id) FROM amps";
        if (!empty($search)) {
            $result = $db->prepare(
                $sql . " WHERE title LIKE ?"
            );
            $result->bindValue(1, '%'.$search.'%', PDO::PARAM_STR);
        } else if (!empty($category)) {
            $result = $db->prepare(
                $sql . " WHERE LOWER(category) = ?"
            );
            $result->bindParam(1, $category, PDO::PARAM_STR);
        } else {
            $result = $db->prepare($sql);
        }
        $result->execute();
    } catch (\Throwable $th) {
        echo "bad query";
    }
    $count = $result->fetchColumn(0);
    return $count;
}

// Search 

// TODO: Combine these into global search algorithm
// ??? SHIT GOT WEIRD CHECK GIT DIFF AND WHATCH VIDEO CLOSELY
function search_guitars($search, $limit = null, $offset = 0) {
    include "pdo_connection.php";

    try {
        $sql = "SELECT year, make, model, color, country, image_url FROM guitars";
        if (is_integer($limit)) {
            $results = $db->prepare($sql . " LIMIT ? OFFSET ?");
            // Bind search,limit and offset param values to the three ? above
            $results->bindValue(1,"%".$search."%",PDO::PARAM_STR);
            $results->bindParam(1, $limit, PDO::PARAM_INT);
            $results->bindParam(2, $offset, PDO::PARAM_INT);
        } else {
            $results = $db->prepare($sql);
            $results->bindValue(1,"%".$search."%",PDO::PARAM_STR);
        } 
        $results->execute();
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $guitar_search_results = $results->fetchAll(PDO::FETCH_ASSOC);
    return $guitar_search_results;
}


function search_amps($limit = null, $offset = 0) {
    include "pdo_connection.php";

    try {
        $sql = "SELECT year, make, model, image_url FROM amps";
        if (is_integer($limit)) {
            $results = $db->prepare($sql . " LIMIT ? OFFSET ?");
            // Bind search,limit and offset param values to the three ? above
            $results->bindValue(1,"%".$search."%",PDO::PARAM_STR);
            $results->bindParam(1, $limit, PDO::PARAM_INT);
            $results->bindParam(2, $offset, PDO::PARAM_INT);
        } else {
            $results = $db->prepare($sql);
            $results->bindValue(1,"%".$search."%",PDO::PARAM_STR);
        }
        $results->execute();
    } catch (\Throwable $th) {
        echo 'Unable to retrieve results.<br>';
        echo 'Error: ' . $th->getMessage();
        exit;
    }

    $amp_search_results = $results->fetchAll(PDO::FETCH_ASSOC);
    return $amp_search_results;
}