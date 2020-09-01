<?php


include("../dbconfig.php");
session_start();
if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {
include("includes/header.php");
$id = $_SESSION["gebruiker_ID"];

?>
    <main>

    <p onclick="window.location.href='mijn-inschrijving.php'" id='p2'></p>
    <div id = 'inschrijfForm'>
    <form  class="form-style-9" action="inschrijving.php" method="POST">
<ul>
<li>
    <input type="text" name="voornaam" class="field-style field-split align-left" placeholder="Voornaam" required/>
    <input type="text" name="achternaam" class="field-style field-split align-center" placeholder="Achternaam" required/>
    <input type="text" name="adres" class="field-style field-split align-right" placeholder="Adres" required/>
</li>
<li>
    
    <input type="text" maxlength="6" pattern = "[1-9][0-9]{3}\s?[a-zA-Z]{2}" name="postcode" class="field-style field-split align-center" placeholder="Postcode" required oninput="this.value = this.value.toUpperCase()" />
    <input type="text"  name="woonplaats" class="field-style field-split align-center" placeholder="Woonplaats" required/>
    <input placeholder="Geboortedatum" min="1919-01-01" max="2003-01-01" name="geboortedatum" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date"class="field-style field-split align-right"required/>
</li>
<li>
    <select name="geslacht" class="field-style field-split align-leftA">
    <option value="" disabled selected>Geslacht</option>
    <option value="M">Man</option>
    <option value="V">Vrouw</option>
    </select>
    <input type="tel" name="telefoon" minlength="10" maxlength="10" pattern = "[0-9]{7,10}" class="field-style field-split align-center" placeholder="Telefoonnummer" required/>
    <input type="text" minlength = "18" maxlength="18" name="IBAN" class="field-style field-split align-centerB" placeholder="IBAN" required/>
</li>
<li>
    
    <input type="submit" name="submit" value="Inschrijven"  class="field-style field-split align-center"/>
</li>
</ul>
</form>
</div>
        </main>
        <aside id='sidebar'>De marathon zal gehouden worden op 26 Juni 2019, u kunt meerdere deelnemers opgeven.</aside>
  
<?php


?>
<?php

include("includes/footer.php");

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }

?>      
