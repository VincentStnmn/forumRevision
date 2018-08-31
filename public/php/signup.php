<!-----
Title: recap
Author: Vincent Steinmann
Date: 30.08.2018
Desc.: Site to test our knowledge
------>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$prenom = filter_input(INPUT_POST,"firstName", FILTER_SANITIZE_STRING);
$nom = filter_input(INPUT_POST,"lastName", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST,"id", FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST,"pwd", FILTER_SANITIZE_STRING);
$pwd2 = filter_input(INPUT_POST,"pwd2", FILTER_SANITIZE_STRING);
$valide = filter_input(INPUT_POST,"valide");

$message = "";
$new = FALSE;

if($valide)
{
    if ($pwd === $pwd2)
    {
        $new = TRUE;
        $_SESSION['new'] = $new;
        $_SESSION["prenom"] = $prenom; 
        $_SESSION["nom"] = $nom; 
        $_SESSION["id"] = $id; 
        $_SESSION["pwd"] = $pwd; 
        header("Location:index.php");
    }
    else
    {
      $message = "Les mots de passes ne correspondent pas"; 
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form method="post" action="signup.php">
            <fieldset>
                <?php
                echo '<legend>Inscription</legend>
                <label>Prénom</label>
                <br/>
                <input type="text" name="firstName" required="" value="'. $prenom .'"/>
                <br/>
                <label>Nom</label>
                <br/>
                <input type="text" name="lastName" required="" value="'. $nom .'"/>
                <br/>
                <label>Identifiant</label>
                <br/>
                <input type="text" name="id" required="" value="'. $id .'"/>
                <br/>
                <label>Mot de passe:</label>
                <br/>
                <input type="password" name="pwd" required=""/>
                <br/>
                <label>Validation du mot de passe:</label>
                <br/>
                <input type="password" name="pwd2" required=""/>
                <br/>
                <input type="submit" value="Valider" name="valide">
            </fieldset>';
            
            if($message != "")
            {
                echo $message;
            }
            ?>
        </form>
    </body>
</html>
