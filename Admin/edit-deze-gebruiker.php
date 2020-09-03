<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('includes/header2.php');
include("../dbconfig.php");

$message = '';
$msg = '';

$id = $_GET['id'];
if(!empty($_GET['m'])) {

  if($_GET['m'] === '1') {

    $message = 'Gebruiker geupdate';

  }

} else {

  $message = '';

}

if(!empty($_GET['m'])) {

  if($_GET['m'] === '2') {

    echo '<style>
    #form1 {
        display: none;
    }
    #msg2 {
      display: block;
    }
    </style>';
    $msg = 'Gebruiker + inschrijvingen verwijdert';
 
  } else if($_GET['m'] === '3') {

    echo '<style>
    #form1 {
        display: none;
    }
    #msg3 {
      display: block;
    }
    </style>';
    $msg = 'Inschrijving verwijdert!';

  }

} 


$sql = "SELECT * FROM gebruiker WHERE gebruiker.ID = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array($id));
$gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM persoonsgegevens WHERE gebr_ID = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array($id));
$deelnemers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>

<p id = 'msg2' > <?php echo $msg ?><br><a style='color:white; text-align: center;' href='gebruikers.php'>Terug naar gebruikers.</a></p>

<p id = 'msg3' > <?php echo $msg ?><br><a style='color:white; text-align: center;' href='inschrijvingen.php'>Terug naar inschrijvingen.</a></p>

<form id="form1" method="POST" action="updatet.php">

<p id='message'><?php echo $message ?></p>
<input type='hidden' id='inp4' name='id' value="<?php echo $id; ?>"/>
<p style='padding-left: 10px; margin-top: 5px;'>Gebruikersnaam: 
<input id = "inp4" required type="text" name="gebruikersnaam"
    value="<?php echo $gebruiker['gebruikersnaam'];?>"/></p>
    
  <p style='padding-left: 10px;'>Email: <input id = "inp4" required type="text" name="email"
    value="<?php echo $gebruiker['email'];?>"/></p>

<input id="inp5" type="submit" name="submit" value=" Update "/>

<input id="inp6" type="submit" name="delete" value=" Delete "/>

<hr>

<p style='margin: 0px; text-align: center; color: lightyellow '>Inschrijvingen van deze gebruiker : </p>

<?php echo "<table id = 'tabel2' style='padding-left: 10px;'><tr><th>Voornaam</th><th>Achternaam</th><th>Geboortedatum</th></tr>";

foreach($deelnemers as $d){ 

    echo "<tr id='vaca'><td>" . $d['voornaam']  . "</td><td>" . $d['achternaam'] . "</td><td>" . $d['geboortedatum'] .  "</td><tr>";

  }

echo '</table>' 
?>

</form><br>



</main>

<?php

include('includes/footer.php');

} else {
    
  echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";

}

?>