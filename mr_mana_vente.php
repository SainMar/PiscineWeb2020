<?php

$enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";
$meilloffre =  isset($_POST["meilloffre"])? $_POST["meilloffre"]:"";
$id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";
$historique =  isset($_POST["historique"])? $_POST["historique"]:"";

if($enchere=="true")
{
    echo "enchere<br>";
         
    
    $sql="SELECT * FROM `transaction` 
    INNER JOIN `stock` ON `stock`.id= `transaction`.id_item 
    INNER JOIN `enchere_depose` ON `enchere_depose`.id_transaE = `transaction`.id_transa 
    WHERE `transaction`.type_transa LIKE 1 AND `transaction`.statut LIKE 0 
    AND `enchere_depose`.prix_propo = (SELECT MAX(`enchere_depose`.prix_propo) 
    FROM `enchere_depose` WHERE `enchere_depose`.id_transaE=`transaction`.id_transa)
    AND `transaction`.id_vendeur=".$id_user_actual;

    ///Il faut que je recupère le nom de l'acheteur à chaque fois pour pouvoir cherchez ses infos dans la table users (introduire cette requete à chaque tour de la boucle ou il y a $data)
    $id_acheteur_de_cette_enchere="";
    $sql2="SELECT * FROM `users`
    INNER JOIN `enchere_depose` ON `users`.id_user=".$id_acheteur_de_cette_enchere;
    //fin requete pour info user
    

    echo $sql."<br>"; 
}
if($meilloffre=="true")
{
    echo "meilloffre<br>";

    $sql="SELECT * FROM `transaction`
    INNER JOIN `stock` ON `stock`.id= `transaction`.id_item 
    INNER JOIN `meilloffre_depose` ON `meilloffre_depose`.id_transaMO = `transaction`.id_transa
    WHERE `transaction`.type_transa LIKE 2 AND `transaction`.statut LIKE 0 
    AND `transaction`.parole LIKE 'v'
    AND `meilloffre_depose`.date = (SELECT MAX(`meilloffre_depose`.date) 
    FROM `meilloffre_depose` WHERE `meilloffre_depose`.id_transaMO=`transaction`.id_transa)";

    ///Il faut que je recupère le nom de l'acheteur à chaque fois pour pouvoir cherchez ses infos dans la table users (introduire cette requete à chaque tour de la boucle ou il y a $data)
    $id_acheteur_de_cette_meilloffre="";
    $sql2="SELECT * FROM `users`
    INNER JOIN `meilloffre_depose` ON `users`.id_user=".$id_acheteur_de_cette_meilloffre;
    //fin requete pour info user
    
    
    echo $sql."<br>";
}
if($historique=="true")
{
    echo "historique<br>";
    
        
    $sql="SELECT * FROM `transaction` 
    INNER JOIN `users` ON `users`.id_user=`transaction`.id_acheteurFin
    WHERE `transaction`.statut LIKE 1 AND `transaction`.id_vendeur=".$id_user_actual;
    
    echo $sql."<br>";
}


?>