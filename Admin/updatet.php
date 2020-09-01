<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('../dbconfig.php');

if(isset($_POST['submit'])) {

    $id = $_POST['id'];
$sql = "SELECT * FROM gebruiker WHERE gebruiker.ID = $id";
$stmt = $db->prepare($sql);
$stmt->execute(array());
$gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($gebruiker);

$gebruikersNaam = $_POST['gebruikersnaam'];
$email = $_POST['email'];

if($gebruikersNaam != $gebruiker['gebruikersnaam'] || $email != $gebruiker['email']) { 

$query = "UPDATE gebruiker SET gebruikersnaam = ?, email = ? WHERE ID = ?";
    $update = $db->prepare($query);
    try {
    $update->execute(array($gebruikersNaam, $email, $id));
    header('Location: edit-deze-gebruiker.php?id=' . $id . '&m=1');
    } catch(PDOException $e) {

        echo "<script>alert('persoonsgegevens niet geupdate');</script>";

    }

} else {

    header('Location: edit-deze-gebruiker.php?id=' . $id);

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