<?php
$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

$ID_client=isset($_POST["ID_client"]) ? $_POST["ID_client"] : "";
$ID_personnel=isset($_POST["ID_personnel"]) ? $_POST["ID_personnel"] : "";

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$db_found = $conn->select_db($database);

if(isset($_POST["Annuler"]))
{
    $sql="DELETE FROM reservation WHERE ID_personnel='$ID_personnel';
    $resultat = mysqli_query($db_handle, $sql1);
}

$conn->close();
?>