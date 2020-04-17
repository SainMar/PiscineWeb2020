<?php
session_start();
include('fonction.php');


$enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";
$meilloffre_att =  isset($_POST["meilloffre_att"])? $_POST["meilloffre_att"]:"";
$meilloffre_r =  isset($_POST["meilloffre_r"])? $_POST["meilloffre_r"]:"";
$achatimme =  isset($_POST["achatimme"])? $_POST["achatimme"]:"";
$id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";
$historique =  isset($_POST["historique"])? $_POST["historique"]:"";


if($achatimme=="true")
{
    echo'achatimme<br>';
    /// les achats immediat on recupere les id des items dans $_SESSION['panier'] pour afficher les items via table stock
}
if($enchere=="true")
{
    echo "enchere<br>";
    
    // les encheres non finies de cet user (type_transa=1; statut= 0; id_user_actual)
    $sql="SELECT * FROM `transaction` INNER JOIN `stock` ON `stock`.id= `transaction`.id_item INNER JOIN `enchere_depose` ON `enchere_depose`.id_transaE=`transaction`.id_transa WHERE `transaction`.type_transa LIKE 1 AND `transaction`.statut LIKE 0 AND `enchere_depose`.id_acheteur=".$id_user_actual;
    
    echo $sql."<br>";
}
if($meilloffre_att=="true")
{
    echo "mo_att<br>";
    /// les meilleurs offres non finies de cet user qui sont à la parole du 'v' /*/ il faut recupérer le prix proposé lors de la dernière offre en temps et au cb round nous sommes 
    $sql="SELECT * FROM `transaction` 
    INNER JOIN `stock` ON `stock`.id= `transaction`.id_item
    INNER JOIN `meilloffre_depose` ON `meilloffre_depose`.id_transaMO=`transaction`.id_transa
    WHERE `transaction`.type_transa LIKE 2 AND `transaction`.statut LIKE 0 AND `transaction`.parole LIKE 'v' AND `meilloffre_depose`.id_acheteur=".$id_user_actual."AND `meilloffre_depose`.date = (SELECT MAX(`meilloffre_depose`.date) FROM `meilloffre_depose` WHERE `meilloffre_depose`.id_transaMO=`transaction`.id_transa)";
    echo $sql."<br>";
}
if($meilloffre_r=="true")
{
    echo "mo_r<br>";
    /// les meilleurs offres non finies de cet user qui sont à la parole du 'a' /*/ il faut recupérer le prix proposé lors de la dernière offre en temps et au cb round nous sommes 
    $sql="SELECT * FROM `transaction` 
    INNER JOIN `stock` ON `stock`.id= `transaction`.id_item
    INNER JOIN `meilloffre_depose` ON `meilloffre_depose`.id_transaMO=`transaction`.id_transa
    WHERE `transaction`.type_transa LIKE 2 AND `transaction`.statut LIKE 0 AND `transaction`.parole LIKE 'a' AND `meilloffre_depose`.id_acheteur=".$id_user_actual."AND `meilloffre_depose`.date = (SELECT MAX(`meilloffre_depose`.date) FROM `meilloffre_depose` WHERE `meilloffre_depose`.id_transaMO=`transaction`.id_transa)";
    echo $sql."<br>";

}
if($historique=="true")
{
    echo "historique<br>";
    /// les transactions finies de cet user ayant un prix, un acheteur(qui est cet user) et date de FIN 
    $sql="SELECT * FROM `transaction` 
    INNER JOIN `users` ON `users`.id_user=`transaction`.id_vendeur
    WHERE `transaction`.statut LIKE 1 AND `transaction`.id_acheteurFin=".$id_user_actual;
    echo $sql."<br>";
}





?>