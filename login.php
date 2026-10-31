
<?php
/*
Auteur : [Votre nom]
Objectif : Traitement POST et enregistrement CSV
Date : 30/10/2026
*/

require_once "config.php";
require_once "includes/entete_inc.php";
require_once "includes/menu_inc.php";

echo "<h2>Traitement des notes</h2>";

// Vérification de l'existence des champs
if (
    isset($_POST["nom"]) &&
    isset($_POST["note_info"]) &&
    isset($_POST["note_math"])
) {

    $nom = trim($_POST["nom"]);
    $note_info = $_POST["note_info"];
    $note_math = $_POST["note_math"];

    // Vérification des champs vides
    if (
        empty($nom) ||
        $note_info === "" ||
        $note_math === ""
    ) {

        echo "<p style='color:red'>Erreur : champs obligatoires.</p>";

    }

    // Vérification numérique
    elseif (
        !is_numeric($note_info) ||
        !is_numeric($note_math)
    ) {

        echo "<p style='color:red'>Les notes doivent être numériques.</p>";

    }

    else {

        $note_info = (float)$note_info;
        $note_math = (float)$note_math;

        // Vérification des limites
        if (
            $note_info < NOTE_MIN ||
            $note_info > NOTE_MAX ||
            $note_math < NOTE_MIN ||
            $note_math > NOTE_MAX
        ) {

            echo "<p style='color:red'>Les notes doivent être entre 0 et 20.</p>";

        } else {

            $moyenne = ($note_info + $note_math) / 2;

            // Protection contre les injections HTML
            $nom_affiche = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");

            echo "<h3>Récapitulatif</h3>";

            echo "Nom : $nom_affiche<br>";
            echo "Note Informatique : $note_info<br>";
            echo "Note Mathématiques : $note_math<br>";
            echo "Moyenne : " . round($moyenne, 2) . "<br>";

            // Création du dossier data si nécessaire
            if (!is_dir(DATA_DIR)) {
                mkdir(DATA_DIR, 0775, true);
            }

            // Enregistrement dans le fichier CSV
            $fichier = fopen(CSV_FILE, "a");

            if ($fichier === false) {

                echo "<p style='color:red'>Erreur d'ouverture du fichier CSV.</p>";

            } else {

                fputcsv(
                    $fichier,
                    [$nom, $note_info, $note_math],
                    ";",
                    '"',
                    ""
                );

                fclose($fichier);

                echo "<p style='color:green'>Apprenant enregistré avec succès !</p>";

            }
        }
    }

} else {

    echo "<p style='color:red'>Formulaire incomplet.</p>";

}

echo '<br><a href="saisie.html">Retour au formulaire</a>';
echo '<br><a href="liste.php">Voir la liste des apprenants</a>';

include_once "includes/pied_inc.php";
?>
