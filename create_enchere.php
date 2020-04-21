<?php
    session_start();
    include('fonction.php');

        //identifier votre BDD
        $database = "ecebay";

        $dbh=connect_ddb($database);

    $nom =  isset($_POST["nom_item"])? $_POST["nom_item"]:"";
    $dateFin =  isset($_POST["dateFin"])? $_POST["dateFin"]:"";
    $id_vendeur =  isset($_POST["id_vendeur"])? $_POST["id_vendeur"]:"";
    $enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";

    $info["nom"]=$nom;
    $info["datefin"]=$dateFin;
    $info["id_vendeur"]=$id_vendeur;
    $info["enchere"]=$enchere;

    if($enchere=='true')
    {
        $enchere=1;
    }
    else
    {
        $enchere=0;
    }

    
    if($enchere==1)
    {
        $sql="SELECT id FROM `stock` WHERE nom='".$nom."' AND id_vendeur=".$id_vendeur;
        $result1=$dbh->prepare($sql);
        $result1->execute();
        
        while ($total=$result1->fetchAll())
        {
            
            foreach($total as $data)
            {

                $sql="INSERT INTO `transaction`(`id_vendeur`, `id_item`, `dateFin`, `type_transa`) VALUES (".$id_vendeur.",".$data['id'].",'".$dateFin."', 1)";
                echo "third request: ".$sql;
                $result1=$dbh->prepare($sql);
                $result1->execute();

            }
        }
    
    
    }

