<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"]===1) {

    $_SESSION["ID"] = "";
    $_SESSION["USER"] = "";
    $_SESSION["EMAIL"] = "";
    $_SESSION["STATUS"] = 0; $_SESSION["admin_STATUS"] = 0; $_SESSION["gebruiker_ID"] = "";
    #close the connection
    $db = null;
    session_destroy();
    header('Location: ../home.php');
   
    // echo "<script>location.href='index.php?page=inloggen';</script>";

} else {

    header('Location: ../home.php');

}

?>