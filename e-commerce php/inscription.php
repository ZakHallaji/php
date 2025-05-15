<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>inscription</title>
</head>
<style>
body{
    margin: 0;
}
#form{
    margin-top: 40px;
    margin-right: 0;
}
h2{
            text-align: center;
            margin: 20px;
            color: #000000;
            text-shadow: 2px 2px #10efff ;
            font-size: 50px;
        }
label{
    font-size: large;
    margin-left: 50px;

}
#s{
    margin-top: 0%;
    margin-left: 10px;
}
.s{
    margin-left: 50px;
}
input{
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 50px;
    width: 100%;
    padding: 10px;
    border-radius: 2px 2px black ;
}
input[type="submit"]{
    width: 60%;
    padding: 10px;
    background: #10efff;
    color: #fff;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
    
}
form input[type="submit"]:hover {
    background-color: gray ;
    color: #000000;
    width: 100%;
    
    }

textarea{
    margin-left: 50px;
    width: 100%;
}

#img{
    display: flex;
    justify-content: space-around;
}
#t{
        margin-right: 0px;
        margin-top: 20px;
        margin-left: 50px;
        >img{
            width: 100%;
            height: 70%;
        }
        >h3{
            color: #000000;
            text-shadow: 2px 2px #10efff ;
            font-size: 50px;
            text-align: center;
            margin-bottom: 30px;
        }
        
    }
    footer{
    height: 20;
    display: flex;
    justify-content: space-around;
    background-color: #000000;
    >p{
        color: #fff;
        text-align: center;
        font-weight: bold;
        margin: 10px;
    }
    }
</style>
<body>

<nav class="nav__bar">

<span class="logo">
     <a href="inscription.php" style="color: white;"><i> ZAWAS</i><span style="color: #0fdacf;">.OTRE</span></a>
    
</span>

<div class="nav__links">
    
    <a href="inscription.php" target="_blank" class="link" > <b>
        inscription
    </b></a>

    <a href="connexion.php" target="_blank" class="link" >
        <b>connexion</b>
    </a>

    <a href="#" target="_blank" class="link"> <b>Accés a la boutique </b>
    </a>

    <a href="#" target="_blank" class="link"> <b>Voir votre panier </b>
    </a>
</div>
</nav>

<?php require 'connectesql.php'?>
   <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $pseudo = $_POST['pseudo'];
           $pass = $_POST['mdp'];
           $nom = $_POST['nom'];
           $prenom = $_POST['prenom'];
           $email = $_POST['email'];
           $civilite = $_POST['s'];
           $ville = $_POST['ville'];
           $code_postal = $_POST['cp'];
           $adresse = $_POST['adresse'];
   
           $sql = "INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) 
                   VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse)";
           $preparation = $connect->prepare($sql);
           $preparation->execute(array(
               ":pseudo" => $pseudo,
               ":mdp" => $pass,
               ":nom" => $nom,
               ":prenom" => $prenom,
               ":email" => $email,
               ":civilite" => $civilite,
               ":ville" => $ville,
               ":code_postal" => $code_postal,
               ":adresse" => $adresse,
           ));
   
           echo "<div class='success'>Vous êtes inscrit à notre site web. <a href='connexion.php'>Cliquez ici pour vous connecter</a></div>";
       }
   ?>

<div id="img">
<form action="" method="post" id="form">
    
    <label for="pseudo">Pseudo</label><br> 
    <input type="text" name="pseudo" placeholder="votre pseudo" required> <br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" name="mdp" placeholder="votre mot de passe" required><br>

    <label for="nom">Nom</label> <br>
    <input type="text" name="nom" placeholder="votre nom" required> <br>

    <label for="prenom">Prénom</label> <br>
    <input type="text" name="prenom" placeholder="votre prenom" required><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" placeholder="votre email" required><br>

    <label for="sexe" >sexe</label> <br>
    <div class="s">
    Homme
    <input type="Radio" name="s" value="Homme" id="s" required><br>
    Femme
    <input type="Radio" name="s" value="Femme" id="s" required>
    </div>
    <br>
    <label for="ville">Ville</label><br>
    <input type="text" name="ville" placeholder="votre ville" required><br>

    <label for="cp">Code postale</label><br>
    <input type="Number" name="cp" placeholder="code postale" required><br>

    <label for="adresse">Adresse</label><br>
    <textarea name="adresse" id="ad" required>votre Adresse</textarea> <br>
    
    <input type="submit" value="S'inscrire" name="submit"><br>

</form>
<div id="t">
    <h3>Bienvenue sur <br> ZAWA STORE</h3>
    <img src="t-shorts.png" alt="potique t-short">
</div>
</div>
<footer>
        <p>2024 - Tous droits réservés.</p>
        <p>mombre : <span>zakaria hallaji</span></p>
</footer>

</body>
</html>