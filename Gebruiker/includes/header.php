<?php

$gebruiker = $_SESSION['USER'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
  <!--       <div id="pointermenu2">
            <ul>
            <li></li>
            <li><a href="inschrijven.php">Inschrijven</a></li>
            <li><a href="deelnemerslijst.php" >Deelnemerslijst</a></li>
            <li><a href="mijn-inschrijving.php" >Mijn Inschrijving</a></li>
            <li><a href="certificaat.php" >Certificaat</a></li>
            <li><a href="uitloggen.php" >Uitloggen</a></li>
            <li><a href="profiel.php"><?php echo $gebruiker ?></a></li>
            <li><a href="#" id="rightcorner">&nbsp;</a></li>
            </ul> -->
            
            
            <br style="clear: left" />
            <!-- test -->

            <div class="navbar">
  <a href="welkom.php">Home</a>
  <a href="inschrijven.php">Inschrijven</a>
  <a href="deelnemerslijst.php" >Deelnemerslijst</a>
  
  
  <div class="dropdown">
    <button class="dropbtn"><?php echo $gebruiker ?>
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="mijn-inschrijving.php" >Mijn Inschrijving(en)</a>
    <a href="certificaat.php" >Certificaat</a>
    <a href="uitloggen.php" >Uitloggen</a>
    </div>
  </div> 
</div>

      </header>