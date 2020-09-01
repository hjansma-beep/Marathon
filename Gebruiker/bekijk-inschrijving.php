<?php 

include("../dbconfig.php");
session_start();
$id = $_SESSION['gebruiker_ID'];
if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {
include("includes/header2.php");

if(!empty($_GET["m"])) {

    if($_GET["m"]=== "1") {
  
      $error = 'Gegevens geupdate';
  
    } 
  
  } else {

    $error = 0;

}

$id = $_GET["id"];
$sql = "SELECT * FROM persoonsgegevens WHERE ID = $id";
$stmt = $db->prepare($sql);
$stmt->execute(array());
$inschrijving = $stmt->fetch(PDO::FETCH_ASSOC);
$postcode = $inschrijving["postcode"];
$geslacht = $inschrijving['geslacht'];
/* echo $postcodeA;
echo $postcodeB; */
// print_r($inschrijving);

?>

<main>

<p  onclick="window.location.href='inschrijven.php'" id = "p1"></p>


<form id="form1" method="POST" action="updatet.php">

<?php if(!empty($_GET["m"])) {
    
    if($_GET["m"] === '1') { 
        
        echo "<p id='error'>" . $error . "</p>"; 
    
    } 
        
        } ?>
    
    <?php 
    
  
    
    ?>

    <input name='ID' type='hidden' value= "<?php echo $_GET['id'] ?>"/>

   <p>Voornaam: <input id = "inp4" required type="text" name="voornaam"
    value="<?php echo $inschrijving['voornaam'];?>"/></p>

    <p>Achternaam: <input id = "inp4" required type="text" name="achternaam"
    value="<?php echo $inschrijving['achternaam'];?>"/></p>

    <p>Adres: <input id = "inp4" required type="text" name="adres"
    value="<?php echo $inschrijving['adres'];?>"/></p>

    <p>Postcode: <input id = "inp4" oninput="this.value = this.value.toUpperCase() maxlength="6" pattern = "[1-9][0-9]{3}\s?[a-zA-Z]{2}"   required type="text" name="postcode"
    value="<?php echo $postcode;?>"/>
   </p>

    <p>Woonplaats: <input id = "inp4" required type="text" name="woonplaats"
    value="<?php echo $inschrijving['woonplaats'];?>"/></p>

    <p>Geboortedatum: <input id = "inpDatum" min="1919-01-01" max="2003-01-01" required type="date" name="geboortedatum"
    value="<?php echo $inschrijving['geboortedatum'];?>"/></p>

    <p>Geslacht: <select id="geslacht" name="geslacht" class="field-style field-split align-center">
    <option value="M" 
    <?php if($geslacht === 'M') {
        echo 'selected="selected"';
    } ?>
    >Man</option>
    <option value="V" <?php if($geslacht === 'V') {
        echo 'selected="selected"';
    } ?>>Vrouw</option>
    </select></p>
    
    <p>Telefoonnummer: <input id = "inp4" type="tel" required type="text" maxlength="10" pattern = "[0-9]{7,10}" name="telefoonnummer"
    value="<?php echo $inschrijving['telefoonnummer'];?>"/></p>
    
    <p>IBAN nummer: <input id = "inp4" minlength = "18" maxlength="18" required type="text" name="IBAN"
    value="<?php echo $inschrijving['IBAN'];?>"/></p>

     <input id="inp5" type="submit" name="submit" value=" Update "/>

     <input id="inp6" type="submit" name="delete" value=" Delete "/>

   

</form>
<?php

?>
</main>

<?php 

include("includes/footer.php");

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }

?>

