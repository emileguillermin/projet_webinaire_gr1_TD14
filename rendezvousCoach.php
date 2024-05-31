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

$sql = "SELECT * FROM disponibilite";
$result = $conn->query($sql);

$sql = "SELECT jour, Heure FROM disponibilite";
$result = $conn->query($sql);

$dispos=[];
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $dispos[$row['jour']][] = $row['Heure'];
    }
}
else
{
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="body.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  <!-- Permet d'afficher les photos horizontales-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>              <!-- Permet d'ajouter les boutons du carrousel-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>           <!-- Permet d'ajouter les différentes flèches-->  
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
                        <li><a href="connexionClient.php">Client</a></li>
                        <li><a href="connexionCoach.php">Coach ou personnel de sport</a></li>
                        <li><a href="accesAdmin.html">Administrateur</a></li>
                    </ul>
                </li>
            </ul>
        </div>
      <section>
        <h1>Calendrier de Disponibilité</h1>
        <button type="submit" class="bouton" id="bouton">Annuler</button>
            <table id="calendar">
		<?php
		    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
		    $heures = ['07:00:00', '08:00:00', '09:00:00', '09:20:00', '09:40:00', '10:00:00', '10:20:00', '10:40:00', '11:00:00', '11:20:00','11:40:00','12:00:00', '14:00:00', '14:20:00', '14:40:00', '15:00:00', '15:20:00', '15:40:00', '16:00:00', '16:20:00', '16:40:00', '17:00:00','17:20:00','17:40:00','18:00:00','19:00:00','19:30:00','20:00:00'];
               
		    echo '<table>';
            echo '<tr><th></th>';
            foreach ($jours as $jour)
            {
                echo "<th>$jour</th>";
            }
            echo'</tr>';
            foreach ($heures as $heure)
            {
                echo"<tr><th>$heure</th>";
                foreach ($jours as $jour)
                {
                    $class = 'indisponible';
                    if (isset($dispos[$jour]) && in_array($heure, $dispos[$jour]))
                    {
                        $class = 'disponible';
                    }
                    echo "<td class='$class'></td>";
                }
                echo'</tr>';
            }
            echo '</table>';
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
<?php $db_handle->close();