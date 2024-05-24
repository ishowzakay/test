<?php include 'menu.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des administrateurs</title>
</head>

<link rel='stylesheet' type='text/css' media='screen' href='admin.css'>
<body>

<h2>Liste des administrateurs</h2>

<!-- Lien pour ajouter un administrateur -->
<a  class='add' href="ajout.php">Ajouter un administrateur</a>
<br><br>

<!-- Affichage de la liste des administrateurs -->
<!-- Affichage de la liste des administrateurs -->
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Actions</th>
    </tr>
    <?php

    // Inclusion du fichier de connexion à la base de données
    include 'db.php';

    // Récupération de tous les administrateurs
    global $con;
    $sql = "SELECT * FROM ADMIN";
    $result = mysqli_query($con, $sql);

    // Affichage des administrateurs
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['NOMA']."</td>";
        echo "<td>".$row['PRENOMA']."</td>";
        echo "<td>".$row['ADRESSEA']."</td>";
        echo "<td>".$row['TEL']."</td>";
        echo "<td>";
        // Lien pour éditer l'administrateur avec classe 'edit'
        echo "<a class='edit' href='edit.php?id=".$row['ID_ADMIN']."'>Modifier</a> | ";
        // Lien pour supprimer l'administrateur avec classe 'delete'
        echo "<a class='delete' href='delete.php?id=".$row['ID_ADMIN']."' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet administrateur ?\")'>Supprimer</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
