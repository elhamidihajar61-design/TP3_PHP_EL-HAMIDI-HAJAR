<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['login'] = $_POST['login'];

    $login = $_POST['login']; 
    setcookie("dernier_login", $login, time() + 86400, "/"); 
    $login = $_POST['login'];

    $infos = [
        "login" => $login,
        "date_connexion" => date("Y-m-d H:i:s")
    ];

    setcookie("infos_connexion", json_encode($infos), time() + 86400, "/");

    header("Location: profil.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

    <h2>Connexion</h2>

    <form action="login.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login"
        value="<?= htmlspecialchars($_COOKIE['dernier_login'] ?? '') ?>" required>

        <button type="submit">Se connecter</button>
    </form>

<?php
if (isset($_COOKIE['infos_connexion'])) {
    $infos_lues = json_decode($_COOKIE['infos_connexion'], true);
}
/*
1. La session est stockée sur le serveur.
   Le cookie est stocké dans le navigateur du client.

2. setcookie() et header() doivent être appelés avant tout affichage,
   car ils envoient des en-têtes HTTP au navigateur.
   Si on affiche du HTML avant, une erreur peut se produire.
*/
?>

</body>
</html>
