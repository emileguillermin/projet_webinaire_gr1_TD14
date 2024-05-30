<?php
$database = "sport";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_handle->connect_error)
{
    die("Connection failed: " . $db_handle->connect_error);
}

// Supposons que l'ID du coach soit passé en paramètre GET
$id_coach = isset($_GET['id_coach']) ? $_GET['id_coach'] : 1;  // Exemple ID coach par défaut

$sql = "SELECT date, heure FROM Reservation WHERE id_coach = $id_coach";
$result = $db_handle->query($sql);

$rdv_pris = [];
if ($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        $rdv_pris[] = $row['date'] . ' ' . $row['heure'];
    }
}

// Exemple de création d'un calendrier de la semaine avec des créneaux horaires
$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
$heures = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00'];
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
    <style>
        .creneau-disponible { background-color: white; cursor: pointer; }
        .creneau-indisponible { background-color: blue; color: white; }
        .creneau { padding: 10px; border: 1px solid #ccc; text-align: center; }
    </style>
    <script>
        function reserverCreneau(date, heure) {
            if (confirm(`Voulez-vous réserver le créneau ${date} à ${heure} ?`)) {
                fetch('reserver_rdv.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `date=${date}&heure=${heure}&id_coach=<?php echo $id_coach; ?>`
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('Le créneau a été réservé avec succès.');
                        location.reload();  // Recharger la page pour mettre à jour le calendrier
                    } else {
                        alert('Erreur lors de la réservation du créneau.');
                    }
                });
            }
        }
    </script>
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
                    <a href="rendezvousCoach.php">Rendez-vous</a>
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
            <h2>Calendrier des créneaux disponibles</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <?php foreach ($jours as $jour) {
                            echo "<th>$jour</th>";
                        } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($heures as $heure)
                    {
                        echo "<tr><td>$heure</td>";
                        foreach ($jours as $jour) {
                            $date = date('Y-m-d', strtotime("next $jour"));
                            $datetime = "$date $heure";
                            if (in_array($datetime, $rdv_pris)) {
                                echo "<td class='creneau creneau-indisponible'>$heure</td>";
                            } else {
                                echo "<td class='creneau creneau-disponible' onclick=\"reserverCreneau('$date', '$heure')\">$heure</td>";
                            }
                        }
                        echo "</tr>";
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
<?php $db_handle->close(); ?>
?>

