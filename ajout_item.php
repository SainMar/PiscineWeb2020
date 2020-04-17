<?php
    include('fonction.php');

    $nom =  isset($_POST["nom"])? $_POST["nom"]:"";
    $qualite =  isset($_POST["qualite"])? $_POST["qualite"]:"";
    $default =  isset($_POST["default"])? $_POST["default"]:"";
    $prix =  isset($_POST["prix"])? $_POST["prix"]:"";
    $id_cat =  isset($_POST["id_cat"])? $_POST["id_cat"]:"";
    $enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";
    $meilloffre =  isset($_POST["meilloffre"])? $_POST["meilloffre"]:"";
    $achatimme =  isset($_POST["achatimme"])? $_POST["achatimme"]:"";
    $id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";

    if($enchere=="true")
    {
        $enchere=1;
    }
    if($meilloffre=="true")
    {
        $meilloffre=1;
    }
    if($achatimme=="true")
    {
        $achatimme=1;
    }

    //identifier votre BDD
    $database = "ecebay";
    //identifier votre table
    $table= "stock";

    //compteur pour ecrire requete
    $cpt = 0;
    $id = 0;

    $dbh=connect_ddb($database);

    $sql_insert_item="INSERT INTO `stock`(`nom`,`qualite`,`default`, `prix`, `id_cat`, `id_enchere`, `id_meilloffre`, `id_achatimme`, `id_vendeur`) VALUES ";

    $sql_insert_item.="('".$nom."','".$qualite."','".$default."','".$prix."','".$id_cat."','".$enchere."','".$meilloffre."','".$achatimme."','".$id_user_actual."')";

    $result=$dbh->prepare($sql_insert_item);
    $result->execute();

    echo "<br>your item has been successfuly insert in the market !<br>";


?>