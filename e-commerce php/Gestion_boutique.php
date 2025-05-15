<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>gestion Poutique</title>
</head>
<style>
    .aj{
       text-align: center;
       margin-top: 50px;
       background-color: #0fdacf; 
       border-radius: 2px black ;
       font-size: large;
       color: black;
       font-weight: bold;
    }
    table{
        width: 100%;
        height: 50%;
        border: 1px 1px black;
        margin-top: 20px;
    }
    th{
            color: white;
            background-color: #0fdacf;
            font-weight: bold;
            font-size: large;
            margin:20px;
        }
    td{
        text-align: center;
    }
    .m{
        >a{
            color: white;
        }
        font-weight: bold;
        background-color: #1486f1;
    }
    .s{
        >a{
            color: white;
        }
        font-weight: bold;
        background-color: red;
    }
    div{
        color: white;
    }

</style>
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
<?php require "connectesql.php" ?>
<?php $sql2="select * from produit ";
      $preparation=$connect->prepare($sql2);
      $preparation->execute();
      $resultat=$preparation->fetchALL(PDO::FETCH_OBJ); ?>


      <a href="ajout_produit.php" target="_blank" class="aj">creer Nouveau Produit </a>
      <h1>les produits :</h1>
      <table border="1px">
        <tr>
            <th> id </th>
            <th>reference</th>
            <th>categorie</th>
            <th>titre</th>
            <th>discription</th>
            <th>couleur</th>
            <th>taille</th>
            <th>photo</th>
            <th>prix</th>
            <th>stock</th>
            <th>modifier</th>
            <th>supprimer</th>

        </tr>

        <?php foreach($resultat as $val){ ?>
        <tr>
            <td> <?= $val->id_produit ?></td>
            <td> <?= $val->reference ?></td>
            <td> <?= $val->categorie ?></td>
            <td> <?= $val->titre ?></td>
            <td> <?= $val->description ?></td>
            <td> <?= $val->couleur ?></td>
            <td> <?= $val->taille ?></td>
            <td> <img src="<?= $val-> photo?>"></td>
            <td> <?= $val->prix ?></td>
            <td> <?= $val->stock ?></td>
            <td class="m"><a href="Modif_produit.php?id_produit=1" target="blank" class="mod">modifier</a> </td>
            <td class="s"><a href="Supprim_produit.php?id=<?= $val-> id?>" target="blank" class="sup">supprimer</a></td>
        </tr>
        <?php }?>
      </table>
      


</body>
</html>