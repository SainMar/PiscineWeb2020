<?php
session_start();
include('fonction.php');

//identifier votre BDD
$database = "ecebay";

$dbh=connect_ddb($database);

$id_vendeur=0;
$prix_item=0;


/// Pour chaque items
foreach($_SESSION['panier'] as $id_item)
{
    
        ///lire la a table stock pour recuperer l'id du vendeur
        $sql="SELECT * FROM `stock` WHERE id =".$id_item;
        $result=$dbh->prepare($sql);
        $result->execute();

            while ($total=$result->fetchAll())
            {
                foreach($total as $data)
                {
                    
                    $id_vendeur=$data['id_vendeur'];
                    $prix_item=$data['prix'];
                }
            }
        
        
        

        ///ouvre bdd pour update le statut de l'item
        $sql="UPDATE `stock` SET status = 1 WHERE id=".$id_item;
        $result=$dbh->prepare($sql);
        $result->execute();

        ///delete dans transa les autres transa avec le meme id_item
        $sql="DELETE FROM `transaction` WHERE id_item=".$id_item;
        $result=$dbh->prepare($sql);
        $result->execute();


        ///insert into transa achat imme avec id_item
        $sql="INSERT INTO `transaction`(`id_vendeur`, `id_item`, `statut`, `id_acheteurFin`, `prixFin`, `type_transa`) VALUES ('".$id_vendeur."', '".$id_item."', 1, '".$_SESSION['id_user_actual']."', '".$prix_item."', 3)";
        
        $result=$dbh->prepare($sql);
        $result->execute();

        $key = array_search($id_item, $_SESSION['panier']);
        unset($_SESSION['panier'][$key]);
}


?>


