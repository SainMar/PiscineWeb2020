<?php 
session_start();



include('fonction.php');


//identifier votre BDD
$database = "ecebay";
$dbh=connect_ddb($database);

$id_transa =  isset($_POST["id_transa"])? $_POST["id_transa"]:"";

///supprimer dans  la table `transaction` la meilloffre
$sql="DELETE FROM `transaction` WHERE id_transa=".$id_transa;
$result=$dbh->prepare($sql);
$result->execute();

///supprimer dans la table `meilloffre_depose` toutes les offres précédentes
$sql="DELETE FROM `meilloffre_depose` WHERE id_transaMO=".$id_transa;
$result=$dbh->prepare($sql);
$result->execute();

?>