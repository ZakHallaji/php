<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
form {
        margin-left: 0;
        margin-top: 20px;
        
    }
    h2{
            text-align: center;
            margin: 20px;
            color: #000000;
            text-shadow: 2px 2px #10efff ;
            font-size: 50px;
        }
    
    form label {
        margin-left: 10px;
        width: 10%;
        margin-bottom: 3px;
        font-weight: bold;
    }
    
    form input[type="text"],
    form input[type="password"] {
        margin-left: 10px;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
form input[type="submit"] {
    margin-left: 10px;
    width: 100%;
    padding: 10px;
    background: #333;
    color: #fff;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #10efff ;
    color: #000000;
}

p{
    text-align: center;
    margin-top: 60px;
    margin-bottom: 10px;
    }
button{ 
    margin-right: 0;
    margin-left: 10px;
    width: 100%;
    padding: 10px;
    background: #10efff;
    color: #fff;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
} 
button:hover {
    background-color: #333 ;
    color: white;
}
#cnx{
    display: flex;
    justify-content: space-around;

    
    >#t{
        margin-top: 0px;
        margin-left: 50px;
        
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
<?php
require 'connectesql.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['mdp'];
    $sql="SELECT * FROM membre WHERE pseudo = '$pseudo' AND mdp='$password'";
    $preparation = $connect->query($sql);
    if($preparation->rowCount()>0){
    if($donnees = $preparation->fetch()){
        
        

        if($donnees['statut']=='admin'){

            header("location:Gestion_boutique.php");
        } 
        else {
            header("location:profil.php");
        }
    } } 
    else{
        echo '<script>alert("Erreur: Pseudo ou mot de passe incorrect.")</script>';
    }}  
?>
<nav class="nav__bar">
<span class="logo">
     <a href="inscription.php" style="color: white;"><i> ZAWAS</i><span style="color: #0fdacf;">.OTRE</span></a>  
</span>
    <div class="nav__links">
        <a href="inscription.php" target="_blank" class="link"><b>inscription</b></a>
        <a href="connexion.php" target="_blank" class="link"><b>connexion</b></a>
        <a href="#" target="_blank" class="link"><b>Accès à la boutique</b></a>
        <a href="#" target="_blank" class="link"><b>Voir votre panier</b></a>
    </div>
</nav>
 
<div id="cnx">
<form method="post" action="connexion.php" class="cnx">
    <h2>Connexion</h2>
    <label for="pseudo">Pseudo:</label><br>
    <input type="text" id="pseudo" name="pseudo" required size="100"><br>
    
    <label for="password">Mot de passe:</label><br>
    <input type="password" id="password" name="mdp" required size="100"><br>
    
    <input type="submit" name="login" value="Se connecter" >   

    <p>--------Nouveau chez mon boutique ?--------</p>
    <button href="inscription.php">Crée votre compte</button>
</form>
     


<div id="t">
    <img src="Fashion.jpg" alt="potique t-short" width="90%" height="70%">
</div>
</div>
<footer>
        <p>2024 - Tous droits réservés.</p>
        <p>mombre : <span>zakaria hallaji</span></p>
</footer>

<?php
session_status();?>
</body>
</html>
