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

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
$valide = filter_input(INPUT_POST, "valide");

if (!isset($_SESSION["new"])) {
    $_SESSION["new"] = FALSE;
}
if (!isset($_SESSION["id"])) {
    $_SESSION["id"] = NULL;
}
if (!isset($_SESSION["pwd"])) {
    $_SESSION["pwd"] = NULL;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
<?php
if ($valide && $id == $_SESSION["id"] && $pwd == $_SESSION["pwd"])
{
    echo 'Bienvenue' . $_SESSION["prenom"] . " " . $_SESSION["nom"];
    echo '<br/>';
    echo '<a href="logout.php">Log out</a>';
}
else {
    if ($_SESSION['new'] == TRUE)
    {
        $message = 'Vous vous êtes bien inscrit';
    }
    if ($valide && $id != $_SESSION["id"])
    {
        $_SESSION['new'] = FALSE;
        $message = 'Id inconnu';
    }
    elseif ($valide && $id == $_SESSION["id"] && $pwd != $_SESSION["pwd"])
    {
        $_SESSION['new'] = FALSE;
        $message = "Mot de pass faux";
    }
    echo $message;
    echo '<form method="post" action="index.php">';
    echo '<fieldset>';
    echo '<legend>Connexion</legend>';
    echo '<label>Identifiant</label>';
    echo '<br/>';
    echo '<input type="text" name="id" required="" value="' . $id . '"/>';
    echo '<br/>';
    echo '<label>Mot de passe:</label>';
    echo '<br/>';
    echo '<input type="password" name="pwd" required=""/>';
    echo '<br/>';
    echo '<input type="submit" value="Valider" name="valide">';
    echo '</fieldset>';
    echo '</form>';
    echo '<a href="signup.php">Pas encore inscrit?</a>';
}
?>
    </body>
</html>
