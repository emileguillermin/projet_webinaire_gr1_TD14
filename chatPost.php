<?php
session_start();
include "db.php";

if (!isset($_SESSION['loggedin']) && !isset($_SESSION['coach_loggedin'])) {
    echo "<h3>Veuillez vous connecter pour envoyer des messages</h3>";
    exit();
}

$message = isset($_GET["msg"]) ? mysqli_real_escape_string($db, $_GET["msg"]) : '';

if ($message === '') {
    echo "<h3>Message vide</h3>";
    exit();
}

$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';
$conversation_id = $_SESSION['conversation_id'];

$q = "INSERT INTO chatroom (conversation_id, sender_type, message) VALUES (?, ?, ?)";
$stmt = $db->prepare($q);
$stmt->bind_param("iss", $conversation_id, $user_type, $message);
$stmt->execute();
$stmt->close();

echo "<h3>Message envoyé</h3>";
?>
