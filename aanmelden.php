<?php

include("includes/header2.php");
include("dbconfig.php");

?>

<main>
<form class="form9" action="" method="POST">

<input id="inp1" type="text" name="gebruikersnaam"  placeholder="Gebruikersnaam" required/>

<input id="inp1" type="email" name="email"  placeholder="Email" required/>

<input id="inp1" type="password" name="wachtwoord"  placeholder="Wachtwoord" required/>

<input id="inp2" style='margin-top: 15px'   type="submit" name="submit" value="Aanmelden" />

</form>
        </main>

<?php

include("includes/footer.php");

if(isset($_POST['submit'])) {

  $gebruikersnaam = $_POST['gebruikersnaam'];
  $email = $_POST['email'];
  $password = $_POST['wachtwoord'];
  $hash_password = password_hash($password, PASSWORD_BCRYPT);

  // check of email al gebruikt is
  $query = $db->prepare( "SELECT `email` FROM `gebruiker` WHERE `email` = ?" );
  $query->bindValue( 1, $email );
  $query->execute();

  if( $query->rowCount() > 0 ) { # If rows are found for query
  echo "deze email is al gebruikt";
  
  } else {

  // check of gebruikersnaam al gebruikt is
  $query = $db->prepare( "SELECT `gebruikersnaam` FROM `gebruiker` WHERE `gebruikersnaam` = ?" );
  $query->bindValue( 1, $gebruikersnaam );
  $query->execute();

  if($query->rowCount() > 0 ) {

      echo "Gebruiker bestaat al";
      
  } else {

  // gebruiker toevoegen
  $query = "INSERT INTO gebruiker(gebruikersnaam, email, wachtwoord)VALUES(?,?,?)";
  $insert = $db->prepare($query);
    $data = array($gebruikersnaam,$email,$hash_password);
    try {
       $insert->execute($data);
       header("Location: aangemeld.php");
    } catch(PDOException $e) {
       echo "<script>alert('gebruiker niet toegevoegd');</script>";
    }

    } 

  }

};

?>
