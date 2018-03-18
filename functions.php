<?php
 error_reporting(E_ALL);
 
 ini_set('display_errors', 1);
 ini_set('log_errors', TRUE); // Error logging
 ini_set('error_log', 'error.log'); // Logging file
 ini_set('log_errors_max_len', 1024); // Logging file size


function db_connect() {

// Staattinen muuttuja jotta yhteys avataan vain kerran
static $connection;

// Yritä muodostaa yhteys tietokantaan, jos yhteyttä ei ole vielä luotu
if(!isset($connection)) {
     // Ladataan config.ini tiedostosta teidot
    $config = parse_ini_file('config.ini'); 
    $connection = mysqli_connect($config['url'],$config['username'],$config['password'],$config['dbname']);
    mysqli_set_charset($connection,"utf8");

    

}

if($connection === false) {
    // Jos yhteys epäonnistuu lokitetaan teidot
    $error = mysqli_connect_error($connection);
    lwrite("db_error: error in connection");
    error_log($error);
    
    return mysqli_connect_error(); 
}

lwrite("connection: true");
return $connection;
}

 // Tietokanta kysely
 // parametrina $query string
function db_query($query) {
    // Yhdistetään tietokantaan
    $connection = db_connect();
    lwrite("db_query: " . $query );
    // Tietonkata kysely
  
    $result = mysqli_query($connection,$query);
    

    if($result === false) {
        lwrite("result === false: " . $result);      
        
    }
    
    return $result;

}


// Select lause
// parametrina $query string
// palauttaa false jos epäonnistuu, muuten tulos palautuu array taulukkona $rows
function db_select($query) {
    $rows = array();
    $result = db_query($query);
    
    // Jos epäonnistuu palautetaan false arvo

    if($result === false) {
        lwrite("result === false: " . $result);
         die(" tapahtui virhe");
        //mysql_error($result);
    }
    // Jos kysely onnistuu lisätään kaikki rivit array taulukkoon $rows
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Haetaan virheet tietokannasta
// Palauttaa tietokannan virheet string muodossa
function db_error() {
    $connection = db_connect();
    lwrite("db_error: " . $connection);
    error_log(mysqli_error($connection));
}

// Lisätään heittomerkit ja siistitään arvot tietokanta kyselyä varten
// Palauttaa stringin heittomerkeillä ja siistittynä
// mysqli_real_escape_string — Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
function db_quote($value) {
    $connection = db_connect();
    lwrite("db_quote: " . $value);    
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

function lwrite($message) {

    date_default_timezone_set("Europe/Helsinki");
    $date = date("h:i:sa"); 
    $path = 'logs.txt';

    $log = "[".$date."]". "-" . $message;
    return file_put_contents($path, $log . PHP_EOL, FILE_APPEND);
}


?>