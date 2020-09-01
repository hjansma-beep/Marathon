<?php 
session_start();

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

  $gewijzigd = '';

if(isset($_GET['m'])) { 

  if($_GET['m'] === '1') {

  $gewijzigd = 'Inschrijving gewijzigd!';
  }

}

include('includes/header2.php');
include('../dbconfig.php');

$id = $_SESSION['gebruiker_ID'];

$sql = "SELECT * FROM persoonsgegevens WHERE gebr_ID = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array($id));
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
<p id='gewijzigd'><?php echo $gewijzigd ?></p>
<p id='inschrijving'>Klik op inschrijving om te wijzigen/verwijderen.</p>
<?php echo "<table id = 'tabel1'><tr><th>Voornaam</th><th>Achternaam</th><th>Geboortedatum</th></tr>";

  foreach($deelnemers as $d){ 

    $href = "bekijk-inschrijving.php?id=" . $d["ID"];

    echo "<tr id='vaca2' data-href='$href'><td>" . $d['voornaam']  . "</td><td>" . $d['achternaam'] . "</td><td>" . $d['geboortedatum'] .  "</td><tr>";

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