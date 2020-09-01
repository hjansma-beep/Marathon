<?php

include("../dbconfig.php");
session_start();

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

include('includes/header2.php');

$id = $_SESSION['gebruiker_ID'];

$query = "SELECT persoonsgegevens.voornaam, persoonsgegevens.achternaam FROM persoonsgegevens WHERE persoonsgegevens.gebr_ID = $id";
$stmt = $db->prepare($query);
$stmt->execute();
$d = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fullName = $d[0]['voornaam'] . " " . $d[0]['achternaam'];
// print_r($d);

?>
<script> 

$(document).ready(function (){

$( "main" ).css( "background", "black" );

});

</script>

<main>


<style>
.signature, .title { 
float:left;
  border-top: 1px solid #000;
  width: 200px; 
  text-align: center;
}
</style>
<div id='certificaat'>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificaat van deelname</span>
       <br><br>
       <span style="font-size:25px"><i>Hierbij verklaren wij dat</i></span>
       <br><br>
       <span style="font-size:30px"><b><?php echo $fullName; ?></b></span><br/><br/>
       <span style="font-size:25px"><i>Mee gedaan en voltooid heeft de</i></span> <br/><br/>
       <span style="font-size:30px">US Airforce Marathon</span> <br/><br/>
       <span style="font-size:20px">Met een tijd van <b>5 minuten</b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>Datum</i></span><br>
       <span style="font-size:25px"><i>01-06-2018</i></span><br>
<table style="margin-top:40px;float:left">
<tr>
<td><span><b></b></td>
</tr>
<tr>
<td style="width:200px;float:left;border:0;border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td style="text-align:center"><span><b>Handtekening USAF</b></td>
</tr>
</table>
<table style="margin-top:40px;float:right">
<tr>
<td><span><b></b></td>
</tr>
<tr>
<td style="width:200px;float:right;border:0;border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td style="text-align:center"><span><b>Handtekening deelnemer</b></td>
</tr>
</table>
</div>
</div>
</div>

</main>

<?php

include('includes/footer.php');

} else {
    
  echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";

}

?>