<?php

session_start();

if(isset($_SESSION["ID"]) && $_SESSION["admin_STATUS"] === 1) {

include('includes/header2.php');
include("../dbconfig.php");
if( isset($_POST['sub'])) {

    print_r($_POST);
    $uploads_dir = 'uploads/';
    $tmp_name = $_FILES["file"]["tmp_name"];
    $name = basename($_FILES["file"]["name"]);

    // check of het te uploaden bestand al bestaat

    if(file_exists($uploads_dir . $name)) {
        echo "dit bestand bestaat al<br>";
    }  else {

    // upload naar uploads map    
 
    if(move_uploaded_file($tmp_name, "$uploads_dir/$name")) {

    echo 'uploaded';

    } 
        $filez = $uploads_dir . $name;

        $file = fopen($filez, 'r');

        // check welk scheidingsteken er word gebruikt

        function getFileDelimiter($file, $checkLines = 2){
            $file = new SplFileObject($file);
            $delimiters = array(
              ',',
              '\t',
              ';',
              '|',
              ':'
            );
            $results = array();
            $i = 0;
             while($file->valid() && $i <= $checkLines){
                $line = $file->fgets();
                foreach ($delimiters as $delimiter){
                    $regExp = '/['.$delimiter.']/';
                    $fields = preg_split($regExp, $line);
                    if(count($fields) > 1){
                        if(!empty($results[$delimiter])){
                            $results[$delimiter]++;
                        } else {
                            $results[$delimiter] = 1;
                        }   
                    }
                }
               $i++;
            }
            print_r($results);
            $results = array_keys($results, max($results));
            return $results[0];
        }

        $delimiter = getFileDelimiter($filez, 5);
   
        // bij komma

        if($delimiter === ',') {

        

            $filez = $uploads_dir . $name;
    
            $csvAsArray = array_map('str_getcsv', file($filez));
            print_r($csvAsArray);

            fclose($file);
    
            foreach($csvAsArray as $a) {

                if(empty($a)) { break; } else {
                
                $gebr_ID = $_POST['id'];
                $datum = date('Y/m/d h:i:s', time());
    
                $voornaam = $a[0];
                $achternaam = $a[1];
                $geboortedatum = $a[2];
                $geslacht = trim($a[3]);
                $telefoonnummer = trim($a[4]);
                $IBAN = trim($a[5]);
                $adres = $a[6];
                $postcode = trim($a[7]);
                $woonplaats = $a[8];
                

                $query = "INSERT INTO persoonsgegevens(voornaam,achternaam, geboortedatum, geslacht, gebr_ID, datum_inschrijving, telefoonnummer, IBAN, adres, postcode, woonplaats) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $insert = $db->prepare($query);
            $data = array($voornaam,$achternaam,$geboortedatum,$geslacht,  $gebr_ID, $datum, $telefoonnummer, $IBAN , $adres, $postcode , $woonplaats);
            try {
                echo "deelnemers toegevoegd";
                $insert->execute($data);
            } catch(PDOException $e) {
                echo "<script>alert('deelnemers niet toegevoegd');</script>";
            }
        
            }
            } 

        // bij dubbele punt    
    
        } elseif ($delimiter === ';') {

            $filez = $uploads_dir . $name;
            $csvAsArray = array_map(function($row) { return str_getcsv($row, ';'); }, file($filez)); 
            print_r($csvAsArray);
    
             foreach($csvAsArray as $a) {
                
                if(empty($a[1])) { break; } else {

                $gebr_ID = $_POST['id'];
                $datum = date('Y/m/d h:i:s', time());
    
                $voornaam = $a[0];
                $achternaam = $a[1];
                $geboortedatum = $a[2];
                $date = strtotime($geboortedatum);
                $newFormat = date('Y-m-d', $date);
                $geslacht = $a[3];
                $telefoonnummer = $a[4];
                $IBAN = $a[5];
                $adres = $a[6];
                $postcode = $a[7];
                $woonplaats = strtoupper($a[8]);
                

                $query = "INSERT INTO persoonsgegevens(voornaam,achternaam, geboortedatum, geslacht, gebr_ID, datum_inschrijving, telefoonnummer, IBAN, adres, postcode, woonplaats) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $insert = $db->prepare($query);
            $data = array($voornaam,$achternaam,$newFormat,$geslacht,  $gebr_ID, $datum, $telefoonnummer, $IBAN , $adres, $postcode , $woonplaats);
            try {
                echo "deelnemers toegevoegd";
                $insert->execute($data);
            } catch(PDOException $e) {
                echo "<script>alert('deelnemers niet toegevoegd');</script>";
            }
        
        }
    
    }

        // bij ander scheidingsteken    

        } else {

            echo 'unknown delimiter';

        }

    }
    


    



    }

      





?>

<main>
<form id='upload' method='post' enctype='multipart/form-data'>
    Voeg hier het gebruikers ID toe om bestand op te importeren:<br><input type='text' name='id'/><br><br>
    <input type='file' name='file'/><br><br>
    <input type='submit' name='sub' value='Import'/>
</form>
</main>

<?php

include('includes/footer.php');

} else {
    
    echo"<script>alert('U moet ingelogd zijn om deze pagina te bekijken.');location.href ='../inloggen.php';</script>";
  
  }
  

?>