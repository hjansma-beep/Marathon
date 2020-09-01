<?php

session_start();
include("includes/header2.php");
$error = "";
$error2 = "";

?>


<?php


include("dbconfig.php");

if(isset($_POST["submit"])) {
   
    $gebruikersnaam = htmlspecialchars($_POST["gebruikersnaam"]);
    $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
    try {
        $sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = ? OR email = ?";
        $stmt = $db->prepare($sql); $stmt->execute(array($gebruikersnaam, $gebruikersnaam));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            
            $hash = $result["wachtwoord"];
            
            if(password_verify($wachtwoord, $hash)) {
                session_start();
                $mijnSession = session_id();
               $_SESSION["ID"] = $mijnSession;
                $_SESSION["USER"] = $result["gebruikersnaam"];
                $_SESSION["EMAIL"] = $result["email"];
                $_SESSION["STATUS"] = 1; $_SESSION["gebruiker_ID"] = $result["ID"];
                print_r($_SESSION);
                if($result["gebruikersnaam"] === "Admin"){
                
                    $_SESSION['admin_STATUS'] = 1;
                    header("Location:Admin/welkom.php");

                } else {

                    header("Location:Gebruiker/welkom.php");

                }
         } else {
                 $error =  'Verkeerd wachtwoord.';
            }
        }   else {
            $error2 =  'Deze gebruiker bestaat niet.';
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}



?>

<main>
<form class="form10" action="" method="POST">

<input id="inp1" type="text" name="gebruikersnaam"  placeholder="Gebruikersnaam" required/>

<?php echo "<p id='error2'>" . $error2 . "</p>" ?>

<input id="inp3" type="password" name="wachtwoord"  placeholder="Wachtwoord" required/>

<?php echo "<p id='error3'>" . $error . "</p>" ?>

<input id="inp2"   type="submit" name="submit" value="Inloggen" />

</form>

        </main>

<?php

include("includes/footer.php");

?>
