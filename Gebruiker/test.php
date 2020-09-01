<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] === 1) {

include('includes/header.php');
require('simple_html_dom.php');

?>

<main>

<form action='test.php' method='POST'>
<input type="text" maxlength="7" pattern = "[1-9][0-9]{3}\s?[a-zA-Z]{2}" name="postcode" placeholder="Postcode" required  />
<input type='submit' name='submit'>
</form>

</main>

<?php 
    
    if(isset($_POST['submit'])) {
            $postcode = $_POST['postcode'];
            $url = "https://www.zoekplaats.nl/postcode/".$postcode; 
            // echo $url;

            $html = file_get_html($url);
            foreach($html->find('h2') as $element) 
            echo $element->plaintext;
            $adres = explode(" ", $element);
           
            
         } else {
            echo "<pre>ongeldige postcode</pre>";
        } 

    } else {
    
        echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
      
      }
    
?>