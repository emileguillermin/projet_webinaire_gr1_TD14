<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sport";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Requête SQL pour récupérer les spécialités distinctes
$sql_specialities = "SELECT DISTINCT specialite FROM PersonnelSport";
$result_specialities = $conn->query($sql_specialities);

// Requête SQL pour récupérer les données des coaches
$sql_coaches = "SELECT * FROM PersonnelSport";
$result_coaches = $conn->query($sql_coaches);
?>

<!DOCTYPE html>
<html lang="fr"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="body.css"> 
    <link rel="stylesheet" href="chat.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>              
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>           
</head>
<body>
    <div class="wrapper">
        <header>
            <h1><span>Sportify :</span> Consultation Sportive <img src="photo/logo.png" alt="Sportify Logo"></h1> 
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
                    <a href="rendezvousCoach.php">Rendez-vous</a>
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
            <?php
            // Affichage des boutons des spécialités
            if ($result_specialities->num_rows > 0) {
                while($row = $result_specialities->fetch_assoc()) {
                    $speciality = strtolower($row['specialite']);
                    echo "<button type='button' class='bouton' id='bouton-$speciality'>".$row['specialite']."</button>";
                }
            } else {
                echo "Aucune spécialité trouvée.";
            }
            ?>
        </section>

        <section>
            <?php
            // Affichage des cartes des coaches
            if ($result_coaches->num_rows > 0)
            {
                while ($row = $result_coaches->fetch_assoc())
                {
                    $speciality = strtolower($row['specialite']);
                    // Chemin de l'image par défaut pour l'exemple
                    $photo = "photo_de_coach/coach_musculation.jpg"; 
                    echo "<div id='$speciality' class='carteCoach' style='display:none;'>";
<<<<<<< HEAD
                    echo "<img src='".$row['photo']."' alt='Coach Image'>";
                    echo "<div class='coach-info'>";
                    echo "<h2 id='coach-name'>".$row['prenom']." ".$row['nom']."</h2>";
                    echo "<p id='coach-speciality'>Coach, ".$row['specialite']."</p>";
                    echo "<p id='coach-phone'>Téléphone: ".$row['telephone']."</p>";
                    echo "<p id='coach-email'>Email: ".$row['email']."</p>";
                    echo "</div>";
                    echo "<div class='btn-container'>";
                    echo "<button class='bouton' id='rdv'>Prendre un RDV</button>";
                    echo "<button class='bouton' id='communiquer' onclick='showCommunicationOptions(this)'>Communiquer avec le coach</button>";
                    echo "<button class='bouton_2' id='cv-$speciality' data-cvurl='" . $row['CV'] . "'>Voir son CV</button>";
                    echo "<div class='communication-options' style='display:none;'>";
                    echo "<button class='bouton' onclick=\"envoyerEmail('".$row['email']."')\">Email</button>";
                    echo "<button class='bouton' onclick='ouvrirchat()'>Chat</button>";
                    echo "<button class='bouton'>Audio</button>";
                    echo "<button class='bouton' onclick=\"visioconf('".$row['video']."')\">Visio</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
=======
                        echo "<img src='".$row['photo']."' alt='Coach Image'>";
                        echo "<div class='coach-info'>";
                        echo "<h2 id='coach-name'>".$row['prenom']." ".$row['nom']."</h2>";
                        echo "<p id='coach-speciality'>Coach, ".$row['specialite']."</p>";
                        echo "<p id='coach-phone'>Téléphone: ".$row['telephone']."</p>";
                        echo "<p id='coach-email'>Email: ".$row['email']."</p>";
                        echo "</div>";
                        echo "<div class='btn-container'>";
                            echo "<button class='bouton' id='rdv'>Prendre un RDV</button>";
                            echo "<button class='bouton' id='communiquer' onclick='showCommunicationOptions(this)'>Communiquer avec le coach</button>";
                            echo "<button class='bouton' id='cv-$speciality'>Voir son CV</button>";
                            echo "<div class='communication-options' style='display:none;'>";
                                echo "<button class='bouton' onclick=\"envoyerEmail('".$row['email']."')\">Email</button>";
                                echo "<button class='bouton' onclick=\"ouvrirchat('".$row['ID_personnel']."')\">Chat</button>";
                                echo "<button class='bouton'>Audio</button>";
                                echo "<button class='bouton' onclick=\"visioconf('".$row['video']."')\">Visio</button>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>"; 
>>>>>>> 5c4487d7669545222542bd7a1f181836161f67a4
                }
            } else {
                echo "Aucun coach trouvé.";
            }
            $conn->close();
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
    <script src="activitesSportives_V2.js"></script>
</body>
</html>
