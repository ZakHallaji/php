<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout Produit</title>
    <link rel="stylesheet" href="style.css">
    <style>
    
    form {
        display: flex;
        flex-wrap: wrap;
        margin-left: 100px;
        
    }
    h2{
            text-align: center;
            margin: 20px;
            color: #000000;
            text-shadow: 2px 2px #10efff ;
            font-size: 50px;
        }
    
    form label {
        width: 20%;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    form input[type="text"],
    form input[type="number"],
    form textarea,
    form input[type="file"] {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    

    form input[type="Radio"]{
        margin-top: 20px;
    }
    form textarea {
        height: 100px;
    }
    
    select{
        margin-bottom: 20px;
    }
    
    form input[type="submit"] {
        width: 90%;
        padding: 10px;
        background: #333;
        color: #fff;
        border: 0;
        border-radius: 5px;
        cursor: pointer;
    }
    .aj{
        margin-left: 10px;
        
        
    }
    
    form input[type="submit"]:hover {
        background-color: #10efff ;
        color: #000000;
    }</style>
</head>
<body>
<nav class="nav__bar">

<span class="logo">
     <a href="inscription.php" style="color: white;"><i> ZAWAS</i><span style="color: #0fdacf;">.OTRE</span></a>  
</span>

<div class="nav__links">
    
    <a href="Gestion_boutique" target="_blank" class="link"> <b>
        Gestion de la boutique
    </b></a>

    <a href="profil.php" target="_blank" class="link" >
        <b>Voir votre profil</b>
    </a>

    <a href="boutique" target="_blank" class="link"> <b>Accés a la boutique </b>
    </a>

    <a href="#" target="_blank" class="link"> <b>Voir votre panier </b>
    </a>

    <a href="#" target="_blank" class="link"> <b>Déconnecter </b>
    </a>
</div>
</nav>
            <h2>Formulaire Produits</h2>
            <form action="ajout_produit.php" method="post" enctype="multipart/form-data">
                <label for="reference">Reference:</label>
                <input type="text" id="reference" name="reference" required>

                <label for="categorie">Categorie:</label>
                <input type="text" id="categorie" name="categorie" required>

                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="couleur">Couleur:</label>
                <input type="text" id="couleur" name="couleur" required> <br>

                <label for="taille">Taille:</label>
                <select id="taille" name="taille" required>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select> 
                <br>
                <label for="public">Public:</label>
                <label for="homme">Homme</label>
                <input type="radio" id="homme" name="public" value="Homme" required>
                <label for="femme">Femme</label>
                <input type="radio" id="femme" name="public" value="Femme" required>
                <input type="file" id="photo" name="photo" accept="image/*" required><br>

                <label for="prix">Prix:</label>
                <input type="number" id="prix" name="prix"  required> <br>

                <label for="stock">Quantité en stock:</label>
                <input type="number" id="stock" name="quantite" required><br>

                <input type="submit" value="Enregistrement">
            </form>
        </main>
    </div>
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // GJW9 Récupération des données du formulaire
        $reference = $_POST['reference'];
        $categorie = $_POST['categorie'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $couleur = $_POST['couleur'];
        $taille = $_POST['taille'];
        $public = $_POST['public'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
    
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo_tmp = $_FILES['photo']['tmp_name'];
            $photo_name = $_FILES['photo']['name'];
            $photo_path = 'C:\xampp\htdocs\e-commerce/' . $photo_name; 
            move_uploaded_file($photo_tmp, $photo_path);
        } else {
            echo "<script>alert('Erreur lors de l'upload de la photo.')</script>";
        }
    
        if(require 'connectesql.php'){
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "INSERT INTO Produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock)
                    VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :quantite)";
            
            $statement = $connect->prepare($sql);
    
            $statement->bindParam(':reference', $reference);
            $statement->bindParam(':categorie', $categorie);
            $statement->bindParam(':titre', $titre);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':couleur', $couleur);
            $statement->bindParam(':taille', $taille);
            $statement->bindParam(':public', $public);
            $statement->bindParam(':photo', $photo_path);
            $statement->bindParam(':prix', $prix);
            $statement->bindParam(':quantite', $quantite);
    
            $statement->execute();

            echo "<script>alert('Produit ajouté avec succès!')</script>";
        } 
        else{
            echo "<script>alert('Erreur de connexion à la base de données:') </script>";
            header('Location: ajout_produit.php');
        }
    }
?>
