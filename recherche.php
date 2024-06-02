<?php
// Start the session
session_start();
?>

<?php
$database = "sport";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$toutesRecherchesCoach = null;
$toutesRecherchesSalle = null;

if ($db_found) {
    if (isset($_GET['rechercheBox']) && !empty($_GET['rechercheBox'])) {
        $rechercheBox = htmlspecialchars($_GET['rechercheBox']);

        // Recherche sql coachs
        $queryCoach = "SELECT ID_personnel, photo, nom, prenom, specialite, email, telephone FROM PersonnelSport 
                       WHERE nom LIKE '%$rechercheBox%' 
                       OR photo LIKE '%$rechercheBox%'
                       OR prenom LIKE '%$rechercheBox%' 
                       OR specialite LIKE '%$rechercheBox%' 
                       OR email LIKE '%$rechercheBox%' 
                       OR telephone LIKE '%$rechercheBox%'";
        $toutesRecherchesCoach = mysqli_query($db_handle, $queryCoach);

        // Recherche sql salles de sport
        $querySalle = "SELECT ID_salle AS ID_personnel, nom, adresse AS prenom, telephone FROM SalleSport 
                       WHERE nom LIKE '%$rechercheBox%' 
                       OR adresse LIKE '%$rechercheBox%' 
                       OR telephone LIKE '%$rechercheBox%'";
        $toutesRecherchesSalle = mysqli_query($db_handle, $querySalle);
    }
    else
    {
        echo "<h3>Veuillez entrer une recherche.</h3>";
    }
} else {
    echo "<h3>Database not found.</h3>";
}

mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sportify - Recherche</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="body.css">
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
                        <li><a href="activitesSportives.php">Activités sportives</a></li>
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
                        <li><a href="connexionAdmin.php">Administrateur</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <section>
            <form method="GET">
                <div class="recherche-container">
                    <div class="recherche-box">
                        <span class="formeRecherche">&#128269;</span> 
                        <input type="text" id="rechercheBox" name="rechercheBox" placeholder="Nom ou Spécialité ou Etablissement" />
                    </div>
                    <button type="submit" id="rechercher" name="rechercher" class="btn btn-primary boutonRecherche">Rechercher</button>
                </div>
            </form>
            <br>
            <?php
            if (isset($toutesRecherchesCoach) || isset($toutesRecherchesSalle)) {
                if ($toutesRecherchesCoach && mysqli_num_rows($toutesRecherchesCoach) > 0) {
                    echo "<h3>Résultats de la recherche (Coach) :</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>ID</th><th>Photo</th><th>Nom</th><th>Prénom</th><th>Spécialité</th><th>Email</th><th>Téléphone</th></tr></thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($toutesRecherchesCoach)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['ID_personnel']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['photo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['specialite']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telephone']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>Aucun coach trouvé pour '" . htmlspecialchars($rechercheBox) . "'</p>";
                }

                if ($toutesRecherchesSalle && mysqli_num_rows($toutesRecherchesSalle) > 0) {
                    echo "<h3>Résultats de la recherche (Salle de sport) :</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>ID</th><th>Nom</th><th>Adresse</th><th>Téléphone</th></tr></thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($toutesRecherchesSalle)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['ID_personnel']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telephone']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>Aucune salle trouvée pour '" . htmlspecialchars($rechercheBox) . "'.</p>";
                }
            }
            ?>
        </section>
        <footer>
            <iframe width="100%" height="300%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.317662740615!2d2.328770915673154!3d48.87925167928907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f273f4f31ad%3A0x78e9c368389ea84a!2sBlanche%2C%2075009%20Paris%2C%20France!5e0!3m2!1sen!2sfr!4v1624543145632!5m2!1sen!2sfr"></iframe>
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
