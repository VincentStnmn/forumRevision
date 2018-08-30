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

if($valide)
{
    if ($pwd === $pwd2)
    {
        $co = TRUE;
        $_SESSION['co'] = $co;
        header("Location:index.php");
    }
    else
    {
      $message = "Les mots de passes ne correspondent pas"; 
      $_SESSION['msg'] = $message;
    }
}

