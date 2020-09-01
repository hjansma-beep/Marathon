<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('includes/header2.php');
include("../dbconfig.php");

$sql = "SELECT * FROM gebruiker";
$stmt = $db->prepare($sql);
$stmt->execute(array());
$gebruikers = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<?php echo "<table id = 'tabel1'><tr><th>ID</th><th>Gebruikersnaam</th><th>Email</th></tr>";

  foreach($gebruikers as $g){ 

    $href = "edit-deze-gebruiker.php?id=" . $g["ID"];

    echo "<tr id='vaca2' data-href='$href'><td>" . $g['ID']  . "</td><td>" . $g['gebruikersnaam'] . "</td><td>" . $g['email'] .  "</td><tr>";

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