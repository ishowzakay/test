<?php
include 'menu.php';
// Inclusion du fichier de connexion à la base de données
include 'db.php';

// Définition des variables et initialisation à des valeurs par défaut
$nom = $prenom = $adresse = $tel = '';

// Traitement du formulaire d'ajout
if (isset($_POST['ajouter'])) {
    // Récupération des valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];

    // Insertion des données dans la base de données
    $sql = "INSERT INTO ADMIN (NOMA, PRENOMA, ADRESSEA, TEL) VALUES ('$nom', '$prenom', '$adresse', '$tel')";
    mysqli_query($con, $sql);

    // Redirection vers la page d'affichage des administrateurs
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un administrateur</title>
</head>
<link rel='stylesheet' type='text/css' media='screen' href='admin.css'>
<body>

<h2>Ajouter un administrateur</h2>

<!-- Formulaire pour ajouter un administrateur -->
<form method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>"><br><br>
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>"><br><br>
    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" value="<?php echo $adresse; ?>"><br><br>
    <label for="tel">Téléphone :</label>
    <input type="tel" id="tel" name="tel" value="<?php echo $tel; ?>"><br><br>

    <!-- Bouton pour ajouter un administrateur -->
    <button type="submit" name="ajouter">Ajouter</button>
</form>

</body>
</html>
