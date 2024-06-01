<?php
$database = "sport";
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $database);

$ID_client=isset($_POST["ID_client"]) ? $_POST["ID_client"] : "";
$ID_coach=isset($_POST["ID_coach"]) ? $_POST["ID_coach"] : "";

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$db_found = $conn->select_db($database);

if(isset($_POST["Annuler"]))
{
    $sql="DELETE FROM reservation WHERE ID_coach='$ID_coach';
    $resultat = mysqli_query($db_handle, $sql1);
}

$conn->close();
?>