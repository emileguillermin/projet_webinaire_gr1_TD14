<?php
session_start();
include "db.php";

if (!isset($_SESSION['loggedin']) && !isset($_SESSION['coach_loggedin'])) {
    echo "<h3>Veuillez vous connecter pour voir les messages</h3>";
    exit();
}

$conversation_id = $_SESSION['conversation_id'];

$q = "SELECT * FROM chatroom WHERE conversation_id = ? ORDER BY timestamp ASC";
$stmt = $db->prepare($q);
$stmt->bind_param("i", $conversation_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $class = ($row["sender_type"] == $_SESSION['user_type']) ? 'sender' : 'receiver';
        echo "<p class='$class'><span>{$row['sender_type']}</span>{$row['message']}</p>";
    }
} else {
    echo "<h3>Le chat est vide pour le moment.</h3>";
}

$stmt->close();
?>
