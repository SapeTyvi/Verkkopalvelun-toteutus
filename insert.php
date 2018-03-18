<?php
include('functions.php');
error_reporting(E_ALL); 

ini_set('display_errors', 1);
ini_set('log_errors', TRUE); // Error logging
ini_set('error_log', 'error.log'); // Logging file
ini_set('log_errors_max_len', 1024); // Logging file size

    
    // $result on "true", jos se on onnistunut
    // Lisätään heittomerkin ja siistitään lomakkeeltat tullut tieto
    $job = db_quote($_POST['job']);
    $job_subcategory = db_quote($_POST['job_subcategory']);
    $city = db_quote($_POST['city']);
    $zipcode = db_quote($_POST['zipcode']);
    // Encodataan json muodossa tullut teito
    $description = json_encode(stripslashes($_POST['data']), JSON_UNESCAPED_UNICODE);

    // Lisätään tiedot tietokantaan
    $result = db_query("INSERT INTO `jobs` (`job`,`job_subcategory`,`city`,`zipcode`,`description`) VALUES (" . $job . "," . $job_subcategory . "," . $city . "," . $zipcode . "," . $description . ")");
    if($result === false) {
        // Käsitellään errorit jos niitä tulee
        $error = db_error();
        error_log($error);
        echo 'joku virhe';
    } else {
        // Insert onnistui
        $res="Data Inserted Successfully:";
        echo json_encode($res);
    }

?>

