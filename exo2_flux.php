
<?php

require_once "config.php";

// Exercice 2.1 : if / elseif / else

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

echo "<h3>Exercice 2.1 : Mentions</h3>";

$notes_test = [18, 15, 13, 10, 8];

foreach ($notes_test as $note) {
    echo "Note : $note - Mention : " . mention($note) . "<br>";
}

// Exercice 2.2 : Switch

echo "<h3>Exercice 2.2 : Mois</h3>";

$mois = date("m");

switch ($mois) {
    case "01": $nom_mois = "Janvier"; break;
    case "02": $nom_mois = "Février"; break;
    case "03": $nom_mois = "Mars"; break;
    case "04": $nom_mois = "Avril"; break;
    case "05": $nom_mois = "Mai"; break;
    case "06": $nom_mois = "Juin"; break;
    case "07": $nom_mois = "Juillet"; break;
    case "08": $nom_mois = "Août"; break;
    case "09": $nom_mois = "Septembre"; break;
    case "10": $nom_mois = "Octobre"; break;
    case "11": $nom_mois = "Novembre"; break;
    case "12": $nom_mois = "Décembre"; break;
    default: $nom_mois = "Mois inconnu";
}

echo "Nous sommes au mois de $nom_mois<br>";

/*
Sans break, PHP continue à exécuter les instructions
des cases suivants jusqu'à rencontrer un break.
*/

// Exercice 2.3 : Boucles

echo "<h3>Triangle</h3>";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}


echo "<h3>Nombres pairs avec while</h3>";

$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
}


echo "<h3>Nombres pairs avec continue</h3>";

for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo "$i<br>";
}


echo "<h3>Switch et break 2</h3>";

$i = 1;

while ($i <= 10) {

    switch ($i) {

        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}


echo "<h3>Do-while</h3>";

$i = 0;

do {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;

} while ($i <= 20);

/*
Différence :
while vérifie la condition avant d'exécuter.
do-while exécute au moins une fois avant de vérifier.
*/
?>

