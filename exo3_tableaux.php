<?php
/*
Auteur : [Votre nom]
Objectif : Gestion des tableaux et statistiques
Date : 30/10/2026
*/

require_once "config.php";
include "includes/entete_inc.php";
include "includes/menu_inc.php";
echo "<h2>EXERCICE 3.1</h2>";


$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];


$modules = ["php", "proba", "java"];


echo "<h3>Affichage avec foreach :</h3>";

foreach ($modules as $module) {
    echo "- " . $module . "<br>";
}


echo "<h3>Affichage par indice :</h3>";

echo "Module 1 : " . $modules[0] . "<br>";
echo "Module 2 : " . $modules[1] . "<br>";
echo "Module 3 : " . $modules[2] . "<br>";



require_once "config.php";

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}


echo "<h2>EXERCICE 3.2</h2>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>";
echo "<th>Nom</th>";
echo "<th>Note</th>";
echo "<th>Mention</th>";
echo "</tr>";

foreach ($notes as $nom => $note) {

    if ($note < SEUIL) {
        echo "<tr style='color:red;'>";
    } else {
        echo "<tr>";
    }

    echo "<td>" . $nom . "</td>";
    echo "<td>" . $note . "</td>";
    echo "<td>" . mention($note) . "</td>";

    echo "</tr>";
}

echo "</table>";

$somme = 0;
$meilleure = 0;
$plusFaible = NOTE_MAX;


foreach ($notes as $nom => $note) {

    $somme = $somme + $note;

    if ($note > $meilleure) {
        $meilleure = $note;
    }

    if ($note < $plusFaible) {
        $plusFaible = $note;
    }
}


$moyenne = $somme / count($notes);


echo "<h3>Statistiques avec foreach :</h3>";
echo "Somme : " . $somme . "<br>";
echo "Moyenne : " . $moyenne . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Plus faible note : " . $plusFaible . "<br>";
echo "<h3>Vérification avec les fonctions PHP :</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre d'apprenants : " . count($notes) . "<br>";
echo "Meilleure note : " . max($notes) . "<br>";
echo "Plus faible note : " . min($notes) . "<br>";
$effectifs = [];

foreach ($notes as $nom => $note) {

    $m = mention($note);

    if (isset($effectifs[$m])) {
        $effectifs[$m]++;
    } else {
        $effectifs[$m] = 1;
    }
}


echo "<h3>Nombre d'apprenants par mention :</h3>";

foreach ($effectifs as $mention => $nombre) {
    echo $mention . " : " . $nombre . "<br>";
}
function afficher($tab) {
    foreach ($tab as $nom => $note) {
        echo $nom . " : " . $note . "<br>";
    }
}

echo "<h3>1. Tri par noms croissants :</h3>";

ksort($notes);
afficher($notes);



echo "<h3>2. Tri par notes décroissantes :</h3>";

arsort($notes);
afficher($notes);



echo "<h3>3. Tri par noms décroissants :</h3>";

krsort($notes);
afficher($notes);


echo "<h3>4. Tri par notes croissantes :</h3>";

asort($notes);
afficher($notes);
//Pour un tableau indexé comme $modules, on utilise la fonction sort()//
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo "<h3>Exercice 3.5</h3>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "Résultat de a + b : ";
var_dump($a + $b);

echo "<br>Résultat de a == b : ";
var_dump($a == $b);

echo "<br>Résultat de a === b : ";
var_dump($a === $b);
include "includes/pied_inc.php";
?>