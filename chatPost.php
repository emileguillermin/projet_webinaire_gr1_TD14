<?php
//demarer une session
session_start();
include "db.php";
//si client pas connecté, on le redirige sur la page de connexion
if (!isset($_SESSION['loggedin']) && !isset($_SESSION['coach_loggedin'])) {
    echo "<h3>Veuillez vous connecter pour envoyer des messages</h3>";
    exit();
}

//vérifie si le paramètre 'msg' est présent dans la chaîne de requête URL
$message = isset($_GET["msg"]) ? mysqli_real_escape_string($db, $_GET["msg"]) : '';

//impossibilité d'envoyer un message vide
if ($message === '') {
    echo "<h3>Message vide</h3>";
    exit();
}
//vérifie si le type d'utilisateur est défini dans la session
$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
//récupère l'identifiant de la conversation à partir de la session
$conversation_id = $_SESSION['conversation_id'];
//lie, execute et ferme la requête préparée
$q = "INSERT INTO chatroom (conversation_id, sender_type, message) VALUES (?, ?, ?)";
$stmt = $db->prepare($q);
$stmt->bind_param("iss", $conversation_id, $user_type, $message);
$stmt->execute();
$stmt->close();

echo "<h3>Message envoyé</h3>";
?>
