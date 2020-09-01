<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('includes/header2.php');
include("../dbconfig.php");

$sql = "SELECT * FROM persoonsgegevens";
$stmt = $db->prepare($sql);
$stmt->execute(array());
$deelnemers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<script>

$(document).ready(function (){

    $(document.body).on("click", "tr[data-href]", function () {

        window.location.href = this.dataset.href;

    });

});

</script>

<main>

<div>

<?php echo "<table id = 'tabel3'><tr><th>ID</th><th>Voornaam</th><th>Achternaam</th><th>Geboortedatum</th><th>Geslacht</th><th>gebr_ID</th><th>Telefoonnummer</th><th>IBAN</th><th>Adres</th><th>Postcode</th><th>Woonplaats</th></tr>";

  foreach($deelnemers as $d){ 

    $href = "edit-inschrijving.php?id=" . $d["ID"];

    echo "<tr id='vaca2' data-href='$href'><td>" . $d['ID']  . "</td><td>" . $d['voornaam'] . "</td><td>" . $d['achternaam'] . "</td><td>" . $d['geboortedatum'] . "</td><td>" .  $d['geslacht'] . "</td><td>" . $d['gebr_ID'] . "</td><td>" . $d['telefoonnummer'] . "</td><td>" . $d['IBAN'] . "</td><td>" . $d['adres'] . "</td><td>" . $d['postcode'] . "</td><td>" . $d['woonplaats'] . "</td><tr>";

  }

echo '</table>'

    ?>
    </div>

</main>

<?php

include('includes/footer.php');


} else {
    
  echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";

}

?>