<?php
session_start();

session_unset();   // Vider les variables de session
session_destroy(); // Détruire la session

header("Location: login.php");
exit;
?>