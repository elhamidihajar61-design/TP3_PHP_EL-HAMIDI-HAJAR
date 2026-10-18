<?php echo 'Hello PHP'; ?>
//comantaire
#comantaire sur une ligne
/* comantaire sur une ligne
sur 
plusieurs
lignes */
<?php
// Fichier : exo1_bases.php

/* ==========================================
   Exercice 1.1 : Noms de variables
   ========================================== */

/*
 * Justifications :
 * - $x       : VALIDE. Débute par une lettre alphabétique.
 * - $_x      : VALIDE. Débute par un tiret bas (underscore).
 * - $2x      : INVALIDE. Un nom de variable ne peut pas commencer par un chiffre.
 * - $x-y     : INVALIDE. Le tiret '-' est interprété comme l'opérateur de soustraction.
 * - $Prix_HT : VALIDE. Contient des lettres et un underscore.
 * - $prix ht : INVALIDE. Contient un espace (non autorisé).
 * - $état    : VALIDE. PHP accepte les caractères ASCII étendus / Unicode (accentués), bien qu'il soit préférable de les éviter par convention.
 */

// Déclaration uniquement des variables valides :
$x = 10;
$_x = 20;
$Prix_HT = 100;
$état = "Actif";

// Démonstration de la sensibilité à la casse (Case Sensitivity)
$a = "Valeur de \$a (minuscule)";
$A = "Valeur de \$A (majuscule)";

echo $a . "<br>";
echo $A . "<br>";
// Résultat : $a et$A sont deux variables distinctes avec leurs propres valeurs.

echo "<hr>";

/* ==========================================
   Exercice 1.2 : Constantes
   ========================================== */

// Inclusion du fichier de configuration
require 'config.php';

// Affichage de chaque constante
echo "Établissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil : " . SEUIL . "<br><br>";

// Test avec defined()
if (defined('SEUIL')) {
    echo "La constante 'SEUIL' est bien définie.<br>";
} else {
    echo "La constante 'SEUIL' n'est pas définie.<br>";
}

if (defined('INCONNUE')) {
    echo "La constante 'INCONNUE' est bien définie.<br>";
} else {
    echo "La constante 'INCONNUE' n'est pas définie.<br>";
}

/*
 * Réponses aux questions sur les constantes :
 *
 * 1. Que se passe-t-il si vous affichez une constante non définie ?
 *    - En PHP 8+, une erreur fatale `Error: Undefined constant "..."` est levée et interrompt le script.
 *    - (En PHP 7.3 et antérieur, cela générait un Warning/Notice et traitait le nom de la constante comme une chaîne).
 *
 * 2. Quelle différence y a-t-il entre `const` et `define()` ?
 *    - `const` : Évaluée à la **compilation**. Elle ne peut pas être utilisée à l'intérieur d'un bloc conditionnel (if), d'une boucle ou d'une fonction.
 *    - `define()` : Évaluée à l'**exécution**. Elle est dynamique et peut être appelée n'importe où (dans des structures conditionnelles, fonctions, etc.).
 */

echo "<hr>";

/* ==========================================
   Exercice 1.3 : Calcul
   ========================================== */

$prix_ht = 60;
$tva = 20;

// Calcul dynamique du prix TTC
$prix_ttc = $prix_ht * (1 +$tva / 100);

// Affichage sans aucune valeur écrite en dur
echo "Le prix TTC du produit est de {$prix_ttc} €.<br>";

echo "<hr>";

/* ==========================================
   Exercice 1.4 : Types et conversions
   ========================================== */

// 1. Cast vers string
$test = 42;
$test = (string)$test;
echo "<strong>1. Conversion de \$test :</strong><br>";
var_dump($test); 
echo "<br><br>";

// 2. Prédictions et vérification booléenne
/*
 * Prédictions (bool) :
 * - 0        => false
 * - 0.0      => false
 * - "0"      => false
 * - ""       => false
 * - "abc"    => true (chaîne non vide et différente de "0")
 * - []       => false (tableau vide)
 * - null     => false
 */
echo "<strong>2. Conversions en booléen :</strong><br>";
var_dump((bool) 0); echo " (0)<br>";
var_dump((bool) 0.0); echo " (0.0)<br>";
var_dump((bool) "0"); echo " (\"0\")<br>";
var_dump((bool) ""); echo " (\"\")<br>";
var_dump((bool) "abc"); echo " (\"abc\")<br>";
var_dump((bool) []); echo " ([])<br>";
var_dump((bool) null); echo " (null)<br><br>";

// 3. Prédictions et vérification des conversions
/*
 * Prédictions :
 * - (int) 3.9     => 3 (troncature de la partie décimale)
 * - (int) "12abc" => 12 (extrait le début numérique de la chaîne)
 * - (float) "1.5e3" => 1500 (notation scientifique 1.5 * 10^3)
 * - (int) true    => 1
 */
echo "<strong>3. Conversions mixtes :</strong><br>";
var_dump((int) 3.9); echo " ((int) 3.9)<br>";
var_dump((int) "12abc"); echo " ((int) \"12abc\")<br>";
var_dump((float) "1.5e3"); echo " ((float) \"1.5e3\")<br>";
var_dump((int) true); echo " ((int) true)<br><br>";

// 4. Écriture du nombre 255 dans différentes bases
$dec = 255;       // Décimal
$hex = 0xFF;      // Hexadécimal (préfixe 0x)
$oct = 0o377;     // Octal (préfixe 0o)
$bin = 0b11111111; // Binaire (préfixe 0b)

echo "<strong>4. Représentations de 255 :</strong><br>";
echo "Décimal : $dec<br>";
echo "Hexadécimal (0xFF) : $hex<br>";
echo "Octal (0o377) : $oct<br>";
echo "Binaire (0b11111111) : $bin<br>";

echo "<hr>";

/* ==========================================
   Exercice 1.5 : Chaînes de caractères
   ========================================== */

$traitees = "égales à";
$ici = 2;

// 1. Ahmed a dit : "J'ai réussi" (échappement des guillemets ou utilisation d'apostrophes)
echo "1. Ahmed a dit : \"J'ai réussi\"<br>";

// 2. Voulez-vous supprimer C:\*.*? (échappement de l'antislash)
echo "2. Voulez-vous supprimer C:\\*.*?<br>";

// 3. Ceci n'affichera pas \n de nouvelle ligne (utilisation des guillemets simples ou échappement)
echo '3. Ceci n\'affichera pas \n de nouvelle ligne<br>';

// 4. Les variables ne seront pas $traitees$ici (guillemets simples pour empêcher l'interprétation)
echo '4. Les variables ne seront pas $traitees$ici<br>';

// 5. Les variables seront égales à 2 (guillemets doubles pour interpréter les variables)
echo "5. Les variables seront $traitees$ici<br><br>";

// Suppression des astérisques avec trim()
$chaine = "*Bonjour les développeurs*";
$chaine_nettoyee = trim($chaine, "*");
echo "<strong>Chaîne nettoyée :</strong> $chaine_nettoyee<br><br>";

// Affichage de chaque lettre sur une nouvelle ligne avec strlen() et boucle for
echo "<strong>Affichage lettre par lettre :</strong><br>";
$texte = "Bonjour";
for ($i = 0; $i < strlen($texte);$i++) {
    echo $texte[$i] . "<br>";
}