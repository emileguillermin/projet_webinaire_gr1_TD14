<?php
session_start(); 

if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== 'client')
{
    header("Location: connexionClient.php"); // Redirige vers la page de connexion
    exit();
}

$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT jour, Heure_debut, Heure_fin, Statut FROM Disponibilite WHERE ID_personnel='1'";
$result = $conn->query($sql);

function generateTimeSlots($start, $end, $interval)
{
    $startTime = strtotime($start);
    $endTime = strtotime($end);
    $timeSlots = [];
    while ($startTime <= $endTime)
    {
        $timeSlots[] = date('H:i', $startTime);
        $startTime = strtotime("+$interval minutes", $startTime);
    }
    return $timeSlots;
}

$timeSlots = generateTimeSlots("09:00", "18:00", 20);
$daysOfWeek = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
$dispo = [];

foreach ($daysOfWeek as $day)
{
    foreach ($timeSlots as $slot)
    {
        $dispo[$day][$slot] = 'Indisponible';
    }
}

if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        $startTime = strtotime($row["Heure_debut"]);
        $endTime = strtotime($row["Heure_fin"]);
        $day = $row["jour"];
        $status = $row["Statut"];
        while ($startTime < $endTime) {
            $slot = date('H:i', $startTime);
            if (in_array($day, $daysOfWeek) && in_array($slot, $timeSlots))
            {
                $dispo[$day][$slot] = $status;
            }
            $startTime = strtotime("+20 minutes", $startTime);
        }
    }
}
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
                <li class="has-sous-nav">
                    <a href="index.html">Tout Parcourir</a>
                    <ul class="sous-nav">
                        <li><a href="activitesSportives.php">Activités sportives</a></li>
                        <li><a href="sportsDeCompetition.html">Les Sports de compétition</a></li>
                        <li><a href="salleDeSportOmnes.html">Salle de sport Omnes</a></li>
                    </ul>
                </li>
                <li class="has-sous-nav"><a href="recherche.html">Recherche</a></li>
                <li class="has-sous-nav"><a href="rendezvous.php">Rendez-vous</a></li>
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
            <h1>Calendrier de Guy Dumais</h1>
            <table>
                <tr>
                    <th>Heure</th>
                    <?php foreach ($daysOfWeek as $day): ?>
                        <th><?php echo $day; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($timeSlots as $slot): ?>
                <tr>
                    <td><?php echo $slot; ?></td>
                    <?php foreach ($daysOfWeek as $day): ?>
                        <?php
                        $status = $dispo[$day][$slot];
                        $class = $status === "Disponible" ? "Disponible" : "indisponible";
                        $link = $status === "Disponible" ? "<a href='reservation.php?day=$day&time=$slot&ID_personnel=1&ID_client=1' class='$class'>$status</a>" : $status;
                        ?>
                        <td class="<?php echo $class; ?>"><?php echo $link; ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
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