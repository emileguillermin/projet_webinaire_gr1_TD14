<?php
session_start();
include 'configConnexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Créer une connexion à la base de données
    $conn = get_db_connection();

    // Préparer et exécuter la requête SQL
    $sql = "SELECT ID_client, nom, prenom, mot_de_passe FROM client WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nom, $prenom, $password);
        $stmt->fetch();
        
        // Vérifier le mot de passe en clair
        if ($mot_de_passe === $password) {
            // Démarrer la session et enregistrer les variables de session
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;

            // Rediriger vers la page client
            header("Location: connexionClient.php");
            exit();
        } else {
            $error = "Mot de passe incorrect.";
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
    <title>Sportify - Connexion Client</title>
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
                        <li><a href="accesCoach.html">Coach ou personnel de sport</a></li>
                        <li><a href="accesAdmin.html">Administrateur</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <section>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo "<h2>Bienvenue sur votre compte, " . htmlspecialchars($_SESSION['prenom']) . " !</h2>";
                echo "<p>Vos informations de compte sont les suivantes :</p>";
                echo "<p><strong>Nom :</strong> " . htmlspecialchars($_SESSION['nom']) . "</p>";
                echo "<p><strong>Prénom :</strong> " . htmlspecialchars($_SESSION['prenom']) . "</p>";
                echo '<form action="deconnexionClient.php" method="post">
                        <button type="submit" class="bouton">Déconnexion</button>
                      </form>';
            } else {
                echo '<form action="" method="POST">
                    <div class="event">
                        <h3>Connexion :</h3>
                        <label for="email">Email:</label><br>
                        <input type="email" placeholder="Email" id="email" name="email" required autocomplete="off">

                        <label for="mot_de_passe" >Mot de passe :</label>
                        <input type="password" placeholder="Mot de passe" id="mot_de_passe" name="mot_de_passe" class="tailleBoite" required autocomplete="new-password">

                        <button type="submit" class="bouton">Se connecter</button>
                        <p><a href="inscription.html" style="font-size: 12px; color: black;"><u>Créer un compte</u></a></p>
                    </div>';
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                echo '</form>';
            }
            ?>
        </section>
        <footer>
            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?..."></iframe>
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
