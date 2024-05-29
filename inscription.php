<?php

$database = "sport";
// Connexion à la base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Récupération des données du formulaire
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$adresseLigne1 = isset($_POST["adresseLigne1"]) ? $_POST["adresseLigne1"] : "";
$adresseLigne2 = isset($_POST["adresseLigne2"]) ? $_POST["adresseLigne2"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$Ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
$codePostal = isset($_POST["codePostal"]) ? $_POST["codePostal"] : "";
$pays = isset($_POST["pays"]) ? $_POST["pays"] : "";
$carte = isset($_POST["carte"]) ? $_POST["carte"] : "";
$telephone = isset($_POST["telephone"]) ? $_POST["telephone"] : "";

 // Vérification si le bouton d'inscription a été cliqué
if(isset($_POST["Soumettre"]))
// Vérification de la connexion à la base de données
{
    if($db_found)
    {
        // Requête SQL pour insérer les données du client dans la base de données
        $sql = "INSERT INTO client (nom, prenom, adresseLigne1, adresseLigne2, email, mdp, Ville, codePostal, pays, telephone, carte) ";
        $sql .= "VALUES ('$nom', '$prenom', '$adresseLigne1', '$adresseLigne2', '$email', '$Ville', '$codePostal', '$pays', '$telephone', '$carte')";

        // Exécution de la requête SQL
        $resultat = mysqli_query($db_handle, $sql);

        // Vérification de l'insertion des données
        if ($resultat){
            echo "Client ajouté avec succès!<br>";
            echo "Nom : $nom <br>";
            echo "Prénom : $prenom <br>";
            echo "Adresse : $adresseLigne1 $adresseLigne2 <br>";
            echo "Email : $email <br>";
            echo "Ville : $Ville <br>";
            echo "Code Postal : $codePostal <br>";
            echo "Pays : $pays <br>";
            echo "Téléphone : $telephone <br>";
            echo "Carte : $carte <br>";
        }
        else
        {
            echo "Erreur lors de l'ajout du client à la base de données.<br>";
        }
    }
}
else
{
    echo "Database not Found";
}

// Fermeture de la connexion à la base de données
mysqli_close($db_handle);
/*sleep(5);*/
// Redirection vers la page d'inscription
header('Location: inscription.html');
exit; // Assurez-vous que le script s'arrête après la redirection
?>