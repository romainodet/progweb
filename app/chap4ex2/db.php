<?php
$mysqli = "";
// Configuration des paramètres de la base de données
$db_config = [
    "host" => "localhost",
    "dbname" => "cv_db",
    "login" => "root",
    "password" => "toortoor",
];

// Fonction de connexion à la base.
function _db_connect() {
    global $mysqli, $db_config;
    $mysqli = new mysqli($db_config["host"], $db_config["login"], $db_config["password"], $db_config["dbname"]);
    // Check connection
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $mysqli;
}

// Fonction de sélection dans la base de données.
function db_select($sql, $debug = false) {
    $mysqli = _db_connect();
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) { //mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    } else {
        $rows = [];
    }
    if ($debug) {
        print_r($rows);
    }
    return $rows;
}

// Fonction d'execution d'un ordre SQL DML : Insert/Update/delete
function db_insert($sql) {
    $mysqli = _db_connect();
    if ($mysqli->query($sql) === TRUE) {
        return $mysqli->affected_rows;
    } else {
        die ("Error: " . $sql . "<br>" . $mysqli->error);
    }
}
