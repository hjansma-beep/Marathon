<?php
    
    include("../dbconfig.php");

    session_start();

    if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

    $id = $_SESSION['gebruiker_ID'];

    if (isset($_POST['submit'])){

            $voornaam = ucfirst($_POST['voornaam']);
            $achternaam = ucfirst($_POST['achternaam']); 
            $adres = ucfirst($_POST['adres']);
            $postcode = $_POST['postcode'];
            $woonplaats = strtoupper($_POST['woonplaats']);
            $geboortedatum = $_POST['geboortedatum'];
            $geslacht = $_POST['geslacht'];
            $telefoon = $_POST['telefoon'];
            $IBAN = $_POST['IBAN'];
            $datum = date('Y/m/d h:i:s', time());

            $query = "INSERT INTO persoonsgegevens(voornaam, achternaam, geboortedatum, geslacht, gebr_ID, datum_inschrijving, telefoonnummer, IBAN,adres, postcode,woonplaats)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $insert = $db->prepare($query);
              $data = array($voornaam,$achternaam,$geboortedatum,$geslacht,$id,$datum,$telefoon, $IBAN,$adres,$postcode,$woonplaats);
              try {
                 $insert->execute($data);
                 
              } catch(PDOException $e) {
                 echo "<script>alert('gebruiker niet toegevoegd');</script>";
              }

                $last_id = $db->lastInsertId();
                $rand1 = rand(2,6);
                $rand2 = rand(0,60);
                $rand3 = rand(0,60);
                $tijd = $rand1 . ':' . $rand2 . ':' . $rand3;

                $query = "INSERT INTO chipnummer(pers_id, tijd) VALUES (?, ?)";
                $insert = $db->prepare($query);
                $data = array($last_id, $tijd);
                $insert->execute($data);
          
        }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div id='main2'><p><a id='alignLeft' href='welkom.php'>Terug</a>U hebt zich ingeschreven voor de marathon.</p><p><a href='mijn-inschrijving.php'>Bekijk inschrijving</a></p>
</div>

<?php 

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }

?>

