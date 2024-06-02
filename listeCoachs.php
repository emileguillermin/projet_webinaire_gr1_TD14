<?php
session_start();
include 'configConnexion.php';

if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    header("Location: connexionAdmin.php");
    exit();
}

$conn = get_db_connection();

// Récupérer la liste des coachs
$sql = "SELECT ID_personnel, nom, prenom, email FROM personnelsport";
$result = $conn->query($sql);
$sql2 = "SELECT ID_sport, nom, prenom, email FROM sportdecompetition";
$result2 = $conn->query($sql2);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_coach_id'])) {
    $coach_id = $_POST['delete_coach_id'];

    // Supprimer les enregistrements dépendants dans la table chatroom
    $delete_chatroom_sql = "DELETE FROM chatroom WHERE conversation_id IN (SELECT conversation_id FROM conversations WHERE ID_coach = ?)";
    $delete_chatroom_stmt = $conn->prepare($delete_chatroom_sql);
    $delete_chatroom_stmt->bind_param("i", $coach_id);
    $delete_chatroom_stmt->execute();
    $delete_chatroom_stmt->close();

    // Supprimer les enregistrements dépendants dans la table conversations
    $delete_conversations_sql = "DELETE FROM conversations WHERE ID_coach = ?";
    $delete_conversations_stmt = $conn->prepare($delete_conversations_sql);
    $delete_conversations_stmt->bind_param("i", $coach_id);
    $delete_conversations_stmt->execute();
    $delete_conversations_stmt->close();

    // Supprimer le coach de la base de données
    $delete_coach_sql = "DELETE FROM personnelsport WHERE ID_personnel = ?";
    $delete_coach_stmt = $conn->prepare($delete_coach_sql);
    $delete_coach_stmt->bind_param("i", $coach_id);
    $delete_coach_stmt->execute();
    $delete_coach_stmt->close();

    // Supprimer le coach de la base de données
    $delete_coach_sql = "DELETE FROM sportdecompetition WHERE ID_sport = ?";
    $delete_coach_stmt = $conn->prepare($delete_coach_sql);
    $delete_coach_stmt->bind_param("i", $coach_id);
    $delete_coach_stmt->execute();
    $delete_coach_stmt->close();

    header("Location: listeCoachs.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Coachs</title>
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1><span>Sportify :</span> Consultation Sportive</h1>
            <img src="photo/logo.png" alt="Sportify Logo">
        </header>
        <section>
            <h2>Liste des Coachs</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['ID_personnel']) . "</td>
                                    <td>" . htmlspecialchars($row['nom']) . "</td>
                                    <td>" . htmlspecialchars($row['prenom']) . "</td>
                                    <td>" . htmlspecialchars($row['email']) . "</td>
                                    <td>
                                        <form method='post'>
                                            <input type='hidden' name='delete_coach_id' value='" . htmlspecialchars($row['ID_personnel']) . "'>
                                            <button type='submit' class='btn btn-danger'>Supprimer</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucun coach trouvé</td></tr>";
                    }
                    if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['ID_sport']) . "</td>
                                    <td>" . htmlspecialchars($row['nom']) . "</td>
                                    <td>" . htmlspecialchars($row['prenom']) . "</td>
                                    <td>" . htmlspecialchars($row['email']) . "</td>
                                    <td>
                                        <form method='post'>
                                            <input type='hidden' name='delete_coach_id' value='" . htmlspecialchars($row['ID_sport']) . "'>
                                            <button type='submit' class='btn btn-danger'>Supprimer</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucun coach trouvé</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="connexionAdmin.php" class="btn btn-primary">Retour</a>
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
