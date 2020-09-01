<?php
 
 session_start();
 if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

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

<div id='main2'><p>Uw inschrijving is verwijderd</p><p><a href='mijn-inschrijving.php'>Terug</a></p>
</div>

<?php 

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }

?>