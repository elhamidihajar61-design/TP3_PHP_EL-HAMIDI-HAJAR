<?php
require "config.php";

$fichier = "data/notes.csv";

if (file_exists($fichier)) {

    $fp = fopen($fichier, "r");

    if ($fp === false) {
        echo "Erreur : impossible d'ouvrir le fichier.";
        exit;
    }

    $sommeMoyennes = 0;
    $nombreEtudiants = 0;

    echo "<table border='1'>";
    echo "<tr>
            <th>Nom</th>
            <th>Info</th>
            <th>Math</th>
            <th>Moyenne</th>
            <th>Mention</th>
          </tr>";

    while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

        $nom = $ligne[0];
        $info = (float) $ligne[1];
        $math = (float) $ligne[2];

        $moyenne = ($info + $math) / 2;

        if ($moyenne >= SEUIL) {
            $mention = "Admis";
        } else {
            $mention = "Ajourné";
        }

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nom) . "</td>";
        echo "<td>$info</td>";
        echo "<td>$math</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>$mention</td>";
        echo "</tr>";

        $sommeMoyennes += $moyenne;
        $nombreEtudiants++;
    }

    echo "</table>";

    if ($nombreEtudiants > 0) {
        $moyenneClasse = $sommeMoyennes / $nombreEtudiants;

        echo "<p>Moyenne générale de la classe : "
             . number_format($moyenneClasse, 2)
             . "</p>";
    } else {
        echo "<p>Aucun étudiant dans le fichier.</p>";
    }

    fclose($fp);

} else {
    echo "Erreur : le fichier n'existe pas.";
    exit;
}
?>
