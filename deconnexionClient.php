<?php
//deconnecter client
session_start();
session_unset();
session_destroy();
header("Location: connexionClient.php");
exit();
?>
