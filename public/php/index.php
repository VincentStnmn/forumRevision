<!-----
Title: recap
Author: Vincent Steinmann
Date: 30.08.2018
Desc.: Site to test our knowledge
------>
<?php
    $id = filter_input(INPUT_POST,"id", FILTER_SANITIZE_STRING);
    $pwd = filter_input(INPUT_POST,"pwd", FILTER_SANITIZE_STRING);
    
    if(!isset($_SESSION['new']))
    {
        $_SESSION['new'] = FALSE;
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
        if(($_SESSION['new'] == TRUE) && ($_SESSION['co'] == TRUE))
        {
            echo 'Vous vous êtes bien inscrit';
        }
        if(($_SESSION['new'] == FALSE) && ($_SESSION['co'] == TRUE))
        {
            echo 'Bienvenue';
        }
        else
        {
            echo '<form method="post" action="index.php">';
                echo '<fieldset>';
                    echo '<legend>Connexion</legend>';
                    echo '<label>Identifiant</label>';
                    echo '<br/>';
                    echo '<input type="text" name="id" required="" ' . ' />';
                    echo '<br/>';
                    echo '<label>Mot de passe:</label>';
                    echo '<br/>';
                    echo '<input type="password" name="pwd required="""/>';
                    echo '<br/>';
                    echo '<input type="submit" value="Valider" name="valider">';
                echo '</fieldset>';
            echo '</form>';
            echo '<a href="signup.php">Pas encore inscrit?</a>';
        }
                ?>
    </body>
</html>
