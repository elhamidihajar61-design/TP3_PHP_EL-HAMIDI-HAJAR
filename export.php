<?php
require "config.php";

$fichier = "data/notes.csv";
$fichierJson = "data/notes.json";


$resultats = [];

if (!file_exists($fichier)) {
    echo "Erreur : le fichier notes.csv n'existe pas.";
    exit;
}

$fp = fopen($fichier, "r");

if ($fp === false) {
    echo "Erreur : impossible d'ouvrir le fichier.";
    exit;
}

while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

    if (count($ligne) >= 3) {
        $nom = $ligne[0];
        $info = (float) $ligne[1];
        $math = (float) $ligne[2];

        $moyenne = ($info + $math) / 2;

        $resultats[] = [
            "nom" => $nom,
            "notes" => [
                "Info" => $info,
                "Math" => $math
            ],
            "moyenne" => $moyenne
        ];
    }
}

fclose($fp);

$json = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if ($json === false) {
    echo "Erreur lors de la conversion JSON.";
    exit;
}

if (file_put_contents($fichierJson, $json) === false) {
    echo "Erreur lors de l'écriture du fichier JSON.";
    exit;
}

echo "<h3>1. Tableau associatif des résultats</h3>";
echo "<pre>";
print_r($resultats);
echo "</pre>";

echo "<p>Fichier notes.json créé avec succès.</p>";

$jsonLu = file_get_contents($fichierJson);
$resultatsJson = json_decode($jsonLu, true);

echo "<h3>2. Résultats relus depuis le fichier JSON</h3>";
echo "<pre>";
print_r($resultatsJson);
echo "</pre>";

echo "<h3>3. Résultat de serialize()</h3>";
echo "<pre>";
echo htmlspecialchars(serialize($resultats));
echo "</pre>";

echo "<h3>4. Résultat de json_encode()</h3>";
echo "<pre>";
echo htmlspecialchars(json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
));
echo "</pre>";
?>