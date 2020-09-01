<?php


session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('../dbconfig.php');


if(isset($_POST['submit'])) {

$id = $_POST['id'];
$sql = "SELECT * FROM persoonsgegevens WHERE persoonsgegevens.ID = $id";
$stmt = $db->prepare($sql);
$stmt->execute(array());
$deelnemer = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($deelnemer);

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$geboortedatum = $_POST['geboortedatum'];
$geslacht = $_POST['geslacht'];
$gebr_ID = $_POST['gebr_ID'];
$telefoonnummer = $_POST['telefoonnummer'];
$IBAN = $_POST['IBAN'];
$adres = $_POST['adres'];
$postcode = $_POST['postcode'];
$woonplaats = $_POST['woonplaats'];

if($voornaam != $deelnemer['voornaam'] || $achternaam != $deelnemer['achternaam'] || $geboortedatum != $deelnemer['geboortedatum'] || $geslacht != $deelnemer['geslacht'] || $gebr_ID != $deelnemer['gebr_ID'] ||$telefoonnummer != $deelnemer['telefoonnummer'] || $IBAN != $deelnemer['IBAN'] || $adres != $deelnemer['adres'] || $postcode != $deelnemer['postcode'] || $woonplaats != $deelnemer['woonplaats']) { 

$query = "UPDATE persoonsgegevens SET voornaam = ?, achternaam = ?, geboortedatum = ?, geslacht = ?, gebr_ID = ?, telefoonnummer = ?, IBAN = ?, adres = ?, postcode = ?, woonplaats = ? WHERE ID = ?";
    $update = $db->prepare($query);
    try {
    $update->execute(array($voornaam, $achternaam, $geboortedatum , $geslacht , $gebr_ID , $telefoonnummer , $IBAN , $adres , $postcode , $woonplaats, $id));
    header('Location: edit-inschrijving.php?id=' . $id . '&m=1');
    } catch(PDOException $e) {

        echo "<script>alert('persoonsgegevens niet geupdate');</script>";

    }

} else {

    header('Location: edit-inschrijving.php?id=' . $id);

}

}

if(isset($_POST['delete'])){

    $id = $_POST['id'];
    $query = "DELETE FROM gebruiker WHERE ID = ?";
    $delete = $db->prepare($query);
    try {
    $delete->execute(array($id));

    } catch(PDOException $e) {

        echo "<script>alert('persoonsgegevens niet verwijdert');</script>";

    }

    $id = $_POST['id'];
    $query = "DELETE FROM persoonsgegevens WHERE gebr_ID = ?";
    $delete = $db->prepare($query);
    try {
    $delete->execute(array($id));
    header('Location: edit-deze-gebruiker.php?id=' . $id . '&m=2');

    } catch(PDOException $e) {

        echo "<script>alert('persoonsgegevens niet verwijdert');</script>";

    }




}


} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }

?>