<?php //Fonction principal de client qui permet le commencement des chats
session_start();
include "db.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== 'client') {
    header("Location: connexionClient.php");
    exit();
}

// Récupérer l'ID du coach à partir de l'URL
$coach_id = isset($_GET['coach_id']) ? $_GET['coach_id'] : null;
if (!$coach_id) {
    echo "Veuillez sélectionner un coach pour commencer le chat.";
    exit();
}

// Créer une nouvelle conversation ou récupérer une conversation existante
$q = "SELECT conversation_id FROM Conversations WHERE ID_client = ? AND ID_coach = ?";
$stmt = $db->prepare($q);
$stmt->bind_param("ii", $_SESSION['client_id'], $coach_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($conversation_id);
    $stmt->fetch();
} else {
    $q = "INSERT INTO Conversations (ID_client, ID_coach) VALUES (?, ?)";
    $stmt = $db->prepare($q);
    $stmt->bind_param("ii", $_SESSION['client_id'], $coach_id);
    $stmt->execute();
    $conversation_id = $stmt->insert_id;
}

$stmt->close();

$_SESSION['conversation_id'] = $conversation_id;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sportify - ChatRoom</title>
  <link rel="stylesheet" href="chat.css">
</head>
<body>
  <h1>ChatRoom</h1>
  <div class="chat">
    <h2>Bienvenue, <span><?= htmlspecialchars($_SESSION["prenom"]) ?></span></h2>
    <div class="msg" id="msg"></div>
    <div class="input_msg">
      <input type="text" placeholder="Écrire un message" id="input_msg">
      <button onclick="sendMessage()">Envoyer</button>
    </div>
  </div>
  <script src="chat.js"></script>
</body>
</html>
