 <?php require 'connectesql.php'?>
    <?php 
      $id_produit=$_GET['id_produit'];
      $sql='DELETE FROM produit WHERE `produit`.`id_produit` = :id_produit ';
      $preparation=$connect->prepare($sql);
      $preparation->execute([
        "id_produit"=> $id_produit,
     ]);
    header("location: Gestion_boutique.php")

 ?> 

