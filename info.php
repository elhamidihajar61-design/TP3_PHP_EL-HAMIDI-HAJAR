<?php
$nom = htmlspecialchars($_GET['nom'], ENT_QUOTES, 'UTF-8');
$prenom = htmlspecialchars($_GET['prenom'], ENT_QUOTES, 'UTF-8');
$sexe = $_GET['sexe'];

if ($sexe == "M") {
    echo "Bonjour Monsieur " . $prenom . " " . $nom;
} elseif ($sexe == "F") {
    echo "Bonjour Madame " . $prenom . " " . $nom;
} else {
    echo "Erreur : sexe invalide.";
}
?>
