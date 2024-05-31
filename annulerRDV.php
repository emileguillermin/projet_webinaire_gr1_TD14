<?php
$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$db_found = $conn->select_db($database);

if($db_found && isset($_POST["soumettre"]))
{
    $ID_reservation = $_POST['ID_reservation'];
    $sql = "DELETE FROM Reservation WHERE ID_reservation = $ID_reservation'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ID_reservation);

    if ($stmt->execute())
    {
        header("Location: rendezvous.php"); 
    }
    else
    {
        echo "Erreur annulation: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>