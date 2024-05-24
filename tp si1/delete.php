<?php
// Inclusion du fichier de connexion à la base de données
include 'db.php';

// Vérification si un ID est passé en paramètre
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête SQL pour supprimer l'administrateur avec l'ID spécifié
    $sql = "DELETE FROM ADMIN WHERE ID_ADMIN = $id";

    // Exécution de la requête
    if(mysqli_query($con, $sql)) {
        // Redirection vers form.php
        header("Location: form.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'administrateur.";
    }
} else {
    echo "ID d'administrateur non spécifié.";
    exit();
}
?>
