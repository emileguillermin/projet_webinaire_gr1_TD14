<?php
$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection échouée: " . $conn->connect_error);
}

// Ajouter une réservation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Confirmer']))
{
    $day = $_POST['day'];
    $time = $_POST['time'];
    $ID_personnel = $_POST['ID_personnel'];
    $ID_client = $_POST['ID_client'];

    $sql = "INSERT INTO Reservation (ID_client, ID_personnel, Jour, heure) VALUES ('$ID_client', '$ID_personnel', '$day', '$time')";
    if ($conn->query($sql) === TRUE)
    {
        echo "<h2>Votre réservation est confirmée</h2>";
        $sql2 = "UPDATE Disponibilite SET Statut='Indisponible' WHERE Jour='$day' AND Heure_debut='$time' AND ID_personnel='$ID_personnel'";
        $conn->query($sql2);
    }
    else
    {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// On récupère les différentes réservations des différents champs
$sql2 = "SELECT ID_reservation, ID_client, ID_personnel, Jour, heure FROM Reservation";
$resultatReservation = $conn->query($sql2);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="body.css">
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
            <li class="has-sous-nav"><a href="index.html">Accueil</a></li>
            <li class="has-sous-nav"><a href="index.html">Tout Parcourir</a>
                <ul class="sous-nav">
                    <li><a href="activitesSportives.php">Activités sportives</a></li>
                    <li><a href="sportsDeCompetition.php">Les Sports de compétition</a></li>
                    <li><a href="salleDeSportOmnes.html">Salle de sport Omnes</a></li>
                </ul>
            </li>
            <li class="has-sous-nav"><a href="recherche.html">Recherche</a></li>
            <li class="has-sous-nav"><a href="AfficheRDV.php">Rendez-vous</a></li>
            <li class="has-sous-nav"><a href="index.html">Votre Compte</a>
                <ul class="sous-nav">
                    <li><a href="connexionClient.php">Client</a></li>
                    <li><a href="connexionCoach.php">Coach ou personnel de sport</a></li>
                    <li><a href="connexionAdmin.php">Administrateur</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <section>
        <h1>Mes Rendez-Vous prévus</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID Réservation</th>
                <th>ID Client</th>
                <th>ID Personnel</th>
                <th>Jour</th>
                <th>Heure</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if($resultatReservation->num_rows>0)
            {
                while ($row_res=$resultatReservation->fetch_assoc())
                {
                        echo "<tr>
                                <td>" . htmlspecialchars($row_res["ID_reservation"]) . "</td>
                                <td>" . htmlspecialchars($row_res["ID_client"]) . "</td>
                                <td>" . htmlspecialchars($row_res["ID_personnel"]) . "</td>
                                <td>" . htmlspecialchars($row_res["Jour"]) . "</td>
                                <td>" . htmlspecialchars($row_res["heure"]) . "</td>
                                <td>
                                <form method='POST' action='annulerRDV.php'>
                                    <input type='hidden' name='reservation_id' value='" . htmlspecialchars($row_res["ID_reservation"]) . "'>
                                    <button type='submit' name='annuler' class='btn btn-danger'>Annuler</button>
                                </form>
                            </td>
                            </td>
                          </tr>";    
                }
            }
            else
            {
                echo "<tr><td colspan='5'>Pas de rendez-vous trouvé</td></tr>";
            }
            ?>
            </tbody>
        </table>
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
<?php
$conn->close();
?>