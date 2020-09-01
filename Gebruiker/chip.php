<?php

// pagina om chipnummer en tijd toe te voegen aan al bestaande personen/ deelnemers 

include('../dbconfig.php');
session_start();

$id  = $_SESSION['ID'];

/* 2:01.39
4:41.33 */

$sql = "SELECT * FROM persoonsgegevens";
$query = $db->prepare($sql);
$query->execute();
$personen = $query->fetchALL(PDO::FETCH_ASSOC);

foreach ($personen as $p) {

    $rand1 = rand(2,6);
    $rand2 = rand(0,60);
    $rand3 = rand(0,60);

    $tijd = $rand1 . ':' . $rand2 . ':' . $rand3;

    echo $tijd;

    

    $pers_id = $p['ID'];
    $sql = "INSERT INTO chipnummer(pers_id, tijd) VALUES (?, ?)";
    // // persoons id en random tijd toevoegen !
    $insert = $db->prepare($sql);
    $data = array($pers_id,$tijd);
    try {
       $insert->execute($data);
      echo "database updatet";
    } catch(PDOException $e) {
       echo "<script>alert('gebruiker niet toegevoegd');</script>";
    }

}



?>