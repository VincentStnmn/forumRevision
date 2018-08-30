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

$co = FALSE;
$message = "";
$new = TRUE;

if($valide)
{
    if ($pwd === $pwd2)
    {
        $co = TRUE;
        $_SESSION['co'] = $co;
        $_SESSION['new'] = $new;
        header("Location:index.php");
    }
    else
    {
      $message = "Les mots de passes ne correspondent pas"; 
      $_SESSION['msg'] = $message;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="signup.php">
            <fieldset>
                <legend>Inscription</legend>
                <label>Prénom</label>
                <br/>
                <input type="text" name="firstName" required=""/>
                <br/>
                <label>Nom</label>
                <br/>
                <input type="text" name="lastName" required=""/>
                <br/>
                <label>Identifiant</label>
                <br/>
                <input type="text" name="id" required=""/>
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
            </fieldset>
            <?php
            if($message != "")
            {
                echo $message;
            }
            ?>
        </form>
    </body>
</html>
