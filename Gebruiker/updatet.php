<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

include("../dbconfig.php");



if(isset($_POST["submit"])){

    $id = $_POST['ID'];

    echo $_POST['ID'];

    $voornaam = ucfirst($_POST["voornaam"]);
    $achternaam = ucfirst($_POST["achternaam"]);
    $adres = ucfirst($_POST["adres"]);
    $postcode = $_POST["postcode"];
    $woonplaats = strtoupper($_POST["woonplaats"]);
    $geboortedatum = $_POST["geboortedatum"];
    $geslacht = $_POST["geslacht"]; 
    $telefoonnummer = $_POST["telefoonnummer"]; 
    $IBAN = $_POST["IBAN"]; 
    $query = "UPDATE persoonsgegevens SET voornaam = ?, achternaam = ? , geboortedatum = ? , geslacht = ?, adres = ?, postcode = ? , woonplaats = ?, IBAN = ?, telefoonnummer = ? WHERE ID = ?";
    $update = $db->prepare($query);
    try {
    $update->execute(array($voornaam, $achternaam, $geboortedatum, $geslacht, $adres, $postcode, $woonplaats, $IBAN, $telefoonnummer, $id));
    header('Location: mijn-inschrijving.php?m=1');
    } catch(PDOException $e) {

        echo "<script>alert('persoonsgegevens niet geupdate');</script>";

    }

} 

if(isset($_POST['delete'])) {

    $id = $_POST['ID'];

    $query = "DELETE FROM chipnummer WHERE pers_id = $id";
    $delete = $db->prepare($query);
    try {
    $delete->execute();

    } catch(PDOException $e) {

        echo "<script>alert('chipnummer niet verwijdert');</script>";

    }


    $query = "DELETE FROM persoonsgegevens WHERE ID = $id";
    $delete = $db->prepare($query);
    try {
    $delete->execute();

    header('Location: inschrijving-verwijdert.php');

    } catch(PDOException $e) {

        echo "<script>alert('persoonsgegevens niet verwijdert');</script>";

    }


} 

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }

?>
