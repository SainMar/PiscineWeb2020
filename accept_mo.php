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
echo $id_user_actual=$_SESSION['id_user_actual'];

$sql="SELECT * FROM `transaction` WHERE  id_transa=".$id_transa;
$result=$dbh->prepare($sql);
$result->execute();
$ok=$result->rowCount(); 
if ($ok== 0) 
{   
    
    echo '<h3>Probleme il n\'a pas de discussion entre vous et le vendeur</h3>';
} 
else 
{   
    $sql2="UPDATE `transaction` SET statut= 1 , dateFin=CURRENT_TIMESTAMP, id_acheteurFin=".$id_user_actual.", prixFin=".$prix_enchere." WHERE id_transa=".$id_transa;
    $result2=$dbh->prepare($sql2);
    $result2->execute();
    echo $sql2;
 
    $sql2="DELETE FROM `meilloffre_depose` WHERE id_transaMO=".$id_transa;
    $result=$dbh->prepare($sql2);
    $result->execute();
    echo $sql2;
}





?>