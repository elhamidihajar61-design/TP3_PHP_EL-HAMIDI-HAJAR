<?php
require_once "config.php";


if (
    isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])
) {
  
    if (
        !empty(trim($_POST['nom'])) &&
        $_POST['note_info'] !== '' &&
        $_POST['note_math'] !== ''
    ) {
        $nom = trim($_POST['nom']);
        $note_info = $_POST['note_info'];
        $note_math = $_POST['note_math'];

       
        if (is_numeric($note_info) && is_numeric($note_math)) {
            $note_info = (float) $note_info;
            $note_math = (float) $note_math;

           
            if (
                $note_info >= NOTE_MIN && $note_info <= NOTE_MAX &&
                $note_math >= NOTE_MIN && $note_math <= NOTE_MAX
            ) {
                
                $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');

                echo "<h2>Récapitulatif</h2>";
                echo "Nom : " . $nom . "<br>";
                echo "Note en informatique : " . $note_info . "<br>";
                echo "Note en mathématiques : " . $note_math . "<br>";
            } else {
                echo "Erreur : les notes doivent être comprises entre "
                    . NOTE_MIN . " et " . NOTE_MAX . ".";
            }
        } else {
            echo "Erreur : les notes doivent être numériques.";
        }
    } else {
        echo "Erreur : tous les champs sont obligatoires.";
    }
} else {
    echo "Erreur : veuillez remplir et envoyer le formulaire.";
}
// 1. On préfère POST à GET pour un mot de passe car , le mot de passe n'apparaît pas dans l'URL avec POST.
// Donc POST ne chiffre pas les données ; HTTPS est nécessaire.

// 2. $_REQUEST contient les données provenant de GET, POST et éventuellement des cookies, selon la configuration PHP.
$fichier = fopen("data/notes.csv", "a");

if ($fichier !== false) {
    $ligne = [$nom, $note_info, $note_math];

    fputcsv($fichier, $ligne, ";");

    fclose($fichier);

    echo "<p>Les notes ont été enregistrées avec succès.</p>";
} else {
    echo "<p>impossible d'ouvrir le fichier.</p>";
}
//Le mode "a" ajoute les nouvelles données à la fin du fichier et conserve les anciennes données.
//Le mode "w" vide le fichier dès son ouverture, puis écrit les nouvelles données.

?>
