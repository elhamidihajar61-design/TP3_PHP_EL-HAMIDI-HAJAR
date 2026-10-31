
<footer>
    <hr>
    <p>&copy; <?php echo date("d/m/Y"); ?> - TP3.</p>
</footer>
<?php
$dateActuelle = new DateTime();
$dateFin = new DateTime("2027-01-31");

$difference = $dateActuelle->diff($dateFin);

echo "Il reste " . $difference->days . " jours avant la fin du semestre.";
?>
<?php
$jour = 31;
$mois = 2;
$annee = 2026;

if (checkdate($mois, $jour, $annee)) {
    echo "La date est valide.";
} else {
    echo "La date est invalide.";
}
?>