<?php 

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

include("includes/header2.php");
include("../dbconfig.php");

?>
<script>
    function myFunction() {
  var x = document.getElementById("zoekLeeftijd");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

<main>

    <div id="deelnemers">
<form id='zoekForm' action="deelnemerslijst.php" method="POST">
<!-- <p id="head">Zoeken<img id='imgMinimize' src='../img/minimize.png'/> </p> -->
 
<input type="hidden" name="searchValue" value="0" />
<div id='woonplaats'>Zoek op woonplaats<input id="inpWoonplaats" name='woonplaats'/></div>
<input type="hidden" name="searchValue1" value="0" />
<div id='leeftijd'> Zoek op leeftijd tussen;<br>
<input id="inpLeeftijd" min='1' type= 'number' name='lft'/>  en<input id="inpLeeftijd" type='number' name='lft2'/></div>
<input id='submitLeeftijd' type='submit' name='zoek' value='zoeken'></form>

<?php

if(isset($_POST['zoek'])) {

  $query = "SELECT persoonsgegevens.ID, persoonsgegevens.voornaam,  persoonsgegevens.achternaam, persoonsgegevens.geslacht,persoonsgegevens.woonplaats, TIMESTAMPDIFF(YEAR, persoonsgegevens.geboortedatum, CURDATE()) AS age FROM persoonsgegevens"; 
  $stmt = $db->prepare($query);
  $stmt->execute();
  $deelnemers = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['woonplaats']) && isset($_POST['lft']) && isset($_POST['lft2']) && !empty($_POST['woonplaats']) && !empty($_POST['lft']) && !empty($_POST['lft2'])){

  echo "<table id = 'tabel1'><tr><th>Deelnemers</th><th>Leeftijd</th><th>Geslacht</th><th>Woonplaats</th></tr>";

  foreach($deelnemers as $d){

  if($d['age'] > $_POST['lft'] && $d['age'] < $_POST['lft2'] && $d['woonplaats'] === strtoupper($_POST['woonplaats'])) {

    $eersteLetter = $d['voornaam'][0];
    echo "<tr id='vaca' ><td>"    . $eersteLetter . '.' . $d['achternaam']  . "</td><td>" . $d['age'] . "</td><td>" . $d['geslacht'] . "</td><td>" . $d['woonplaats'] . "</td><td>" . "</td><tr>";

  }   } echo '</table>';

} elseif (isset($_POST['lft']) && isset($_POST['lft2']) && !empty($_POST['lft']) && !empty($_POST['lft2']) ) {

  echo "<table id = 'tabel1'><tr><th>Deelnemer</th><th>Leeftijd</th><th>Geslacht</th><th>Woonplaats</th></tr>";


  foreach($deelnemers as $d){

    if($d['age'] > $_POST['lft'] && $d['age'] < $_POST['lft2']) {
  
      $eersteLetter = $d['voornaam'][0];
      echo "<tr id='vaca' ><td>" . $eersteLetter . '.' . $d['achternaam']  . "</td><td>" . $d['age'] . "</td><td>" . $d['geslacht'] . "</td><td>" . $d['woonplaats'] . "</td><td>" . "</td><tr>";
  
    }   } echo '</table>'; 

} elseif (isset($_POST['woonplaats']) && !empty($_POST['woonplaats'])) { 

  echo "<table id = 'tabel1'><tr><th>Deelnemer</th><th>Leeftijd</th><th>Geslacht</th><th>Woonplaats</th></tr>";

  foreach($deelnemers as $d){

    if($d['woonplaats'] === strtoupper($_POST['woonplaats'])) {
  
      $eersteLetter = $d['voornaam'][0];
      echo "<tr id='vaca' ><td>"  . $eersteLetter . '.' . $d['achternaam']  . "</td><td>" . $d['age'] . "</td><td>" . $d['geslacht'] . "</td><td>" . $d['woonplaats'] . "</td><td>" . "</td><tr>";
  
    }   } echo '</table>';

 }/*  else {

echo "<p id='resultaat'>Geen resultaten gevonden</p>";

 }  */

} 

if(!isset($_POST['zoek'])) {

  $query = "SELECT persoonsgegevens.ID, persoonsgegevens.voornaam,  persoonsgegevens.achternaam, persoonsgegevens.geslacht,persoonsgegevens.woonplaats, TIMESTAMPDIFF(YEAR, persoonsgegevens.geboortedatum, CURDATE()) AS age FROM persoonsgegevens";
$stmt = $db->prepare($query);
$stmt->execute();
$deelnemers = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo "<table id = 'tabel1'><tr><th>Deelnemer</th><th>Leeftijd</th><th>Geslacht</th><th>Woonplaats</th></tr>";

foreach($deelnemers as $d){

     $eersteLetter = $d['voornaam'][0];
     echo "<tr id='vaca'><td>" . $eersteLetter . '.' . $d['achternaam']  . "</td><td>" . $d['age'] . "</td><td>" . $d['geslacht'] . "</td><td>" . $d['woonplaats'] . "</td><tr>";


    } 


echo "</table>";

}

?>
</div>

</main>

<?php 
// print_r($_POST);
// print_r($deelnemers);
include("includes/footer.php");

} else {
    
  echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";

}

?>
