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




///table `transaction` trouver l'id_transa avec l'id_item et type_transa= 1
$sql="SELECT * FROM `transaction` WHERE type_transa=1 AND id_item=".$id_item;
$result=$dbh->prepare($sql);
$result->execute();
while ($total=$result->fetchAll())
                {
                    
                    foreach($total as $data)
                    {
                        $id_transa=$data['id_transa'];
                    }
                }


///table `enchere_depose` insert into avec id_transa, prix et id_user_actual
$sql="INSERT INTO `enchere_depose`(`id_transaE`, `id_acheteur`, `prix_propo`) VALUES ('".$id_transa."','".$_SESSION['id_user_actual']."','".$prix_enchere."')";
$result=$dbh->prepare($sql);
$result->execute();




?>