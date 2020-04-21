<?php
session_start();
include('fonction.php');

//identifier votre BDD
$database = "ecebay";

//compteur pour ecrire requete
$cpt = 0;
$id = 0;
$presence=0;

$dbh=connect_ddb($database);

$id_item =  isset($_POST['id_item'])? $_POST['id_item']:"";
$prix_enchere =  isset($_POST['prix'])? $_POST['prix']:"";
$id_transa=0;
$id_vendeur=0;




$sql="SELECT * FROM `transaction` WHERE type_transa=2 AND id_item=".$id_item;
$result=$dbh->prepare($sql);
$result->execute();
if ($ok== 0) 
{   
    $sql3="SELECT * FROM `stock` WHERE id=".$id_item;
    $result3=$dbh->prepare($sql3); 
    $result3->execute();
    while ($total3=$result3->fetchAll())
    {
        foreach($total3 as $data3)
        {
            $id_vendeur=$data3['id_vendeur'];
        }
    }
    
    $sql2="INSERT INTO `transaction`(`id_vendeur`, `id_item`, `statut`, `id_acheteurFin`,`type_transa`) VALUES('".$id_vendeur."','".$id_item."', 0,'".$_SESSION['id_user_actual']."', 2)";
    $result2=$dbh->prepare($sql2); 
    $result2->execute();

    $sql4="SELECT * FROM `transaction` WHERE type_transa=2 AND id_item=".$id_item;
    $result4=$dbh->prepare($sql4);
    $result4->execute();
    while ($total4=$result4->fetchAll())
    {
                        
                        foreach($total4 as $data4)
                        {
                            $id_transa=$data4['id_transa'];
                        }
    }
} 
else 
{
                
    while ($total=$result->fetchAll())
    {
                        
                        foreach($total as $data)
                        {
                            $id_transa=$data['id_transa'];
                        }
    }

}


$sql="INSERT INTO `meilloffre_depose`(`id_transaMO`, `prix_propo`, `id_acheteur`) VALUES ('".$id_transa."','".$prix_enchere."','".$_SESSION['id_user_actual']."')";
$result=$dbh->prepare($sql);
$result->execute();




?>