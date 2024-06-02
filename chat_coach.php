<?php
session_start();
include "db.php";

if (!isset($_SESSION['coach_loggedin']) || $_SESSION['coach_loggedin'] !== true) {
    header("Location: connexionCoach.php");
    exit();
}

if (!isset($_GET['conversation_id'])) {
    echo "Veuillez sélectionner une conversation.";
    exit();
}

$conversation_id = $_GET['conversation_id'];
$_SESSION['conversation_id'] = $conversation_id;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify - ChatRoom Coach</title>
    <link rel="stylesheet" href="chat.css">
    
</head>
<body>
    <h1>ChatRoom pour Coach</h1>
    <div class="chat">
        <h2>Bienvenue, <span><?= htmlspecialchars($_SESSION["prenom"]) ?></span></h2>
        <div class="msg" id="msg"></div>
        <div class="input_msg">
          <input type="text" placeholder="Écrire un message" id="input_msg">
          <button onclick="sendMessage()">Envoyer</button>
        </div>
    </div>
    <script src="chat_coach.js"></script>
</body>
</html>
