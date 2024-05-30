<?php
$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID_reservation, ID_client, ID_coach, Specialité, nomCoach, date, heure FROM Reservation";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="body.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">   Permet d'afficher les photos horizontales
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>               Permet d'ajouter les boutons du carrousel
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>            Permet d'ajouter les différentes flèches  
    <title>Appointments</title>
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
                        <li><a href="activitesSportives.html">Activités sportives</a></li>
                        <li><a href="sportsDeCompetition.html">Les Sports de compétition</a></li>
                        <li><a href="salleDeSportOmnes.html">Salle de sport Omnes</a></li>
                    </ul>
                </li>
                <li class="has-sous-nav">
                    <a href="recherche.html">Recherche</a>
                </li>
                <li class="has-sous-nav">
                    <a href="rendezvous.php">Rendez-vous</a>
                </li>
                <li class="has-sous-nav">
                    <a href="index.html">Votre Compte</a>
                    <ul class="sous-nav">
                        <li><a href="client.html">Client</a></li>
                        <li><a href="accesCoach.html">Coach ou personnel de sport</a></li>
                        <li><a href="accesAdmin.html">Administrateur</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <section>
        <h1>Rendez-Vous</h1>
        <table>
            <tr>
                <th>ID_reservation</th>
                <th>ID_client</th>
                <th>ID_coach</th>
                <th>Specialité</th>
                <th>Nom du Coach</th>
                <th>DATE</th>
                <th>TIME</th>
            </tr>
            <?php
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo"<tr>
                            <td>" . htmlspecialchars($row["ID_reservation"]). "</td>
                            <td>" . htmlspecialchars($row["ID_client"]). "</td>
                            <td>" . htmlspecialchars($row["ID_coach"]). "</td>
                            <td>" . htmlspecialchars($row["Specialité"]). "</td>
                            <td>" . htmlspecialchars($row["nomCoach"]). "</td>
                            <td>" . htmlspecialchars($row["date"]). "</td>
                            <td>" . htmlspecialchars($row["heure"]). "</td>
                            <td><form method='post' action='annulerRDV.php' onsubmit=\"return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');\">
                                <input type='hidden' name='ID_reservation' value='" . htmlspecialchars($row["ID_reservation"]) . "'>
                                <button type="submit" class="bouton">Annuler</button>
                                <input type='submit' name='soumettre' value='Annuler' class='btn btn-danger'>
                            </form></td>
                        </tr>";
                }
            }
            else
            {
                echo "<tr><td colspan='5'>No appointments found</td></tr>";
            }
            $conn->close();
            ?>
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