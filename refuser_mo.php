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
$result3=$dbh->prepare($sql);
$result3->execute();
$ok=$result3->rowCount(); 
if ($ok== 0) 
{   
    
    echo '<h3>Probleme il n\'a pas de discussion entre vous et le vendeur</h3>';
} 
else 
{   
    while ($total3=$result3->fetchAll())
    {
        foreach($total3 as $data3)
        {
            $round=$data3['round'];
        }
    }
    if($round<5)
    {
        $round=$round+1;
        $sql2="UPDATE `transaction` SET round=".$round.", parole='a' WHERE id_transa=".$id_transa;
        $result2=$dbh->prepare($sql2);
        $result2->execute();
        echo $sql2;
    }
    else
    {
        $sql2="DELETE FROM `transaction` WHERE id_transa=".$id_transa;
        $result=$dbh->prepare($sql2);
        $result->execute();
        echo $sql2;

        $sql2="DELETE FROM `meilloffre_depose` WHERE id_transaMO=".$id_transa;
        $result=$dbh->prepare($sql2);
        $result->execute();
        echo $sql2;
    }
    
 
    
}





?>