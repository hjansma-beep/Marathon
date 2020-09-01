<?php
session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('includes/header.php');


?>

<?php

include('includes/footer.php');

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }
  

?>