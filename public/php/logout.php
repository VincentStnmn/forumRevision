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
session_destroy();
header("Location:index.php");

