<?php
$database = "sport";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_handle->connect_error)
{
    die("Connection failed: " . $db_handle->connect_error);
}

/*$ID_coach=$_GET['ID_coach'];
$ID_client=$_GET['ID_client'];
$sql="SELECT date, heure FROM reservation WHERE ID_coach = $ID_coach";
$result=$db_handle->query($sql);*/
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
            <table id="calendar">
            <thead>
                <tr>
                    <th>Heure</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <th>10:00 - 11:00</th>
            </tr>
            <tr>
                <th>11:00 - 12:00</th>
            </tr>
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
<?php $db_handle->close();

