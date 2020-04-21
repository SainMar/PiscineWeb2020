<?php
session_start();
include('fonction.php');

//identifier votre BDD
$database = "ecebay";

$dbh=connect_ddb($database);

$id_transa =  isset($_POST['id_transa'])? $_POST['id_transa']:"";
$prix_enchere =  isset($_POST['prix'])? $_POST['prix']:0;

$id_vendeur=0;
$round=0;




$sql="SELECT * FROM `transaction` WHERE  id_transa=".$id_transa;
$result=$dbh->prepare($sql);
$result->execute();
$ok=$result->rowCount(); 
if ($ok== 0) 
{   
    echo 'id la:'.$id_transa;
    echo '<h3>Probleme il n\'a pas de discussion entre vous et le vendeur</h3>';
} 
else 
{   
    while ($total=$result->fetchAll())
    {
        foreach($total as $data)
        {
            $round=$data['round'];
            $sql3="SELECT * FROM `stock` WHERE id=".$data['id_item'];
            $result3=$dbh->prepare($sql3); 
            $result3->execute();
            while ($total3=$result3->fetchAll())
            {
                foreach($total3 as $data3)
                {
                    $id_vendeur=$data3['id_vendeur'];
                }
            }
        
        }

    }

           
                        

}


$sql="INSERT INTO `meilloffre_depose`(`id_transaMO`, `prix_propo`, `id_acheteur`) VALUES ('".$id_transa."','".$prix_enchere."','".$_SESSION['id_user_actual']."')";
$result=$dbh->prepare($sql);
$result->execute();

$round=$round+1;
$sql="UPDATE `transaction` SET parole='v' WHERE id_transa=".$id_transa;
$result=$dbh->prepare($sql);
$result->execute();