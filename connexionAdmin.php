<?php
session_start();
include 'configCoach.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    // Créer une connexion à la base de données
    $conn = get_db_connection();

    // Préparer et exécuter la requête SQL
    $sql = "SELECT nom, prenom, email FROM Administrateur WHERE email = ? AND nom = ? AND prenom = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0)
    {
        $stmt->bind_result($nom, $prenom, $email);
        $stmt->fetch();
        // Vérifier le mot de passe en clair
        if ($nom === $nom)
        {
            if ($prenom === $prenom)
            {
                // Démarrer la session et enregistrer les variables de session
                $_SESSION['admin_loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;

                // Rediriger vers la page client
                header("Location: connexionAdmin.php");
                exit();
            }
            else {
                $error = "Prenom incorrect.";
            }
        } else {
            $error = "Nom incorrect.";
        }
    } else {
        $error = "Aucun compte trouvé avec cet email.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify - Connexion Admin</title>
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1><span>Sportify :</span> Consultation Sportive</h1>
            <img src="photo/logo.png" alt="Sportify Logo">
        </header>
        <div class="nav">
            <ul>
                <li class="has-sous-nav">
                    <a href="index.html">Accueil</a>
                </li>
                <li class="has-sous-nav">
                    <a href="index.html">Tout Parcourir</a>
                    <ul class="sous-nav">
                        <li><a href="activitesSportives.html">Activités sportives</a></li>
                        <li><a href="sportsDeCompetition.html">Les Sports de compétition</a></li>
                        <li><a href="salleDeSportOmnes.html">Salle de sport Omnes</a></li>
                    </ul>
                </li>
                <li class="has-sous-nav">
                    <a href="recherche.html">Recherche</a>
                </li>
                <li class="has-sous-nav">
                    <a href="rendezVous.html">Rendez-vous</a>
                </li>
                <li class="has-sous-nav">
                    <a href="index.html">Votre Compte</a>
                    <ul class="sous-nav">
                        <li><a href="connexionClient.php">Client</a></li>
                        <li><a href="connexionCoach.php">Coach ou personnel de sport</a></li>
                        <li><a href="accesAdmin.html">Administrateur</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <section>
            <?php
            if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] === true) {
                echo "<h2>Bienvenue sur votre compte admin, " . htmlspecialchars($_SESSION['prenom']) . " !</h2>";
                echo "<p>Vos informations de compte admin sont les suivantes :</p>";
                echo "<p><strong>Nom :</strong> " . htmlspecialchars($_SESSION['nom']) . "</p>";
                echo "<p><strong>Prénom :</strong> " . htmlspecialchars($_SESSION['prenom']) . "</p>";
                echo '<form action="deconnexionAdmin.php" method="post">
                        <button type="submit" class="bouton">Déconnexion</button>
                      </form>';
            }
            else
            {
                echo '<form action="" method="POST">
                    <div class="event">
                        <h3>Connexion admin:</h3>
                        <label for="nom" >Nom :</label>
                        <input type="text" placeholder="Nom" id="nom" name="nom" class="tailleBoite" required autocomplete="off">
                        
                        <label for="prenom" >prenom :</label>
                        <input type="text" placeholder="Prenom" id="prenom" name="prenom" class="tailleBoite" required autocomplete="off">

                        <label for="email">Email:</label><br>
                        <input type="email" placeholder="Email" id="email" name="email" required autocomplete="off">

                        <button type="submit" class="bouton">Se connecter</button>
                    </div>';
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                echo '</form>';
            }
            ?>
        </section>
        <footer>
            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.317662740615!2d2.328770915673154!3d48.87925167928907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f273f4f31ad%3A0x78e9c368389ea84a!2sBlanche%2C%2075009%20Paris%2C%20France!5e0!3m2!1sen!2sfr!4v1624543145632!5m2!1sen!2sfr"></iframe>
            <h3>Contact</h3>
            <p><strong>Adresse :</strong> 21 rue Blanche, 75009 Paris, France</p>
            <p><strong>Téléphone :</strong> +33 1 23 45 67 89</p>
            <p><strong>E-mail :</strong> sportify@gmail.com</p>
            <p><strong>Horaires :</strong></p>
            <p><strong>Du lundi au vendredi :</strong> 7h - 23h</p>
            <p><strong>Samedi, dimanche et jours fériés :</strong> 8h - 20h</p>
        </footer>
    </div>
</body>
</html>
