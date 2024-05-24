<?php
 include 'menu.php';
include 'db.php';

// Vérification si un ID est passé en paramètre
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupération des détails de l'administrateur
    $sql = "SELECT * FROM ADMIN WHERE ID_ADMIN = $id";
    $result = mysqli_query($con, $sql);
    $admin = mysqli_fetch_assoc($result);

    if(!$admin) {
        echo "Administrateur non trouvé.";
        exit();
    }
} else {
    echo "ID d'administrateur non spécifié.";
    exit();
}

// Traitement du formulaire d'édition
if(isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];

    // Requête SQL pour mettre à jour les détails de l'administrateur
    $sql = "UPDATE ADMIN SET NOMA = '$nom', PRENOMA = '$prenom', ADRESSEA = '$adresse', TEL = '$tel' WHERE ID_ADMIN = $id";
    if(mysqli_query($con, $sql)) {
        echo "Administrateur modifié avec succès.";
        // Redirection vers form.php
        header("Location: form.php");
        exit();
    } else {
        echo "Erreur lors de la modification de l'administrateur.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un administrateur</title>
</head>
<link rel='stylesheet' type='text/css' media='screen' href='admin.css'>
<body>


<h2>Modifier un administrateur</h2>

<form method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo $admin['NOMA']; ?>"><br><br>
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo $admin['PRENOMA']; ?>"><br><br>
    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" value="<?php echo $admin['ADRESSEA']; ?>"><br><br>
    <label for="tel">Téléphone :</label>
    <input type="tel" id="tel" name="tel" value="<?php echo $admin['TEL']; ?>"><br><br>

    <button type="submit" name="modifier">Modifier</button>
</form>

</body>
</html>
