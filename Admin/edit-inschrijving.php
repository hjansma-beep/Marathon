<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('includes/header2.php');
include("../dbconfig.php");

$id = $_GET['id'];

$sql = "SELECT * FROM persoonsgegevens WHERE ID = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array($id));
$deelnemers = $stmt->fetch(PDO::FETCH_ASSOC);
$geslacht = $deelnemers['geslacht'];
$postcode = $deelnemers["postcode"];

?>

<main>

<form id="form1" method="POST" action="updatetDeelnemers.php">

  <input type='hidden' id='inp4' name='id' value="<?php echo $id; ?>"/>

   <p>Voornaam: <input id = "inp4" required type="text" name="voornaam"
    value="<?php echo $deelnemers['voornaam'];?>"/></p>

    <p>Achternaam: <input id = "inp4" required type="text" name="achternaam"
    value="<?php echo $deelnemers['achternaam'];?>"/></p>

    <p>Adres: <input id = "inp4" required type="text" name="adres"
    value="<?php echo $deelnemers['adres'];?>"/></p>

    <p>Postcode: <input id = "inp4" oninput="this.value = this.value.toUpperCase() maxlength="6" pattern = "[1-9][0-9]{3}\s?[a-zA-Z]{2}"   required type="text" name="postcode"
    value="<?php echo $postcode;?>"/>
   </p>

    <p>Woonplaats: <input id = "inp4" required type="text" name="woonplaats"
    value="<?php echo $deelnemers['woonplaats'];?>"/></p>

    <p>Geboortedatum: <input id = "inpDatum" min="1919-01-01" max="2003-01-01" required type="date" name="geboortedatum"
    value="<?php echo $deelnemers['geboortedatum'];?>"/></p>

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
    value="<?php echo $deelnemers['telefoonnummer'];?>"/></p>
    
    <p>IBAN nummer: <input id = "inp4" minlength = "18" maxlength="18" required type="text" name="IBAN"
    value="<?php echo $deelnemers['IBAN'];?>"/></p>

    <p>Gebruikers ID: <input id = "inp4" required type="number" name="gebr_ID"
    value="<?php echo $deelnemers['gebr_ID'];?>"/></p>

     <input id="inp5" type="submit" name="submit" value=" Update "/>

     <input id="inp6" type="submit" name="delete" value=" Delete "/>

</form>

</main>

<?php

include('includes/footer.php');

} else {
    
  echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";

}

?>