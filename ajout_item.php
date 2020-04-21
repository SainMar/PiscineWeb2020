<?php
    session_start();
    include('fonction.php');

    $nom =  isset($_POST["nom"])? $_POST["nom"]:"";
    $qualite =  isset($_POST["qualite"])? $_POST["qualite"]:"";
    $default =  isset($_POST["default"])? $_POST["default"]:"";
    $prix =  isset($_POST["prix"])? $_POST["prix"]:0;
    $id_cat =  isset($_POST["id_cat"])? $_POST["id_cat"]:"";
    $enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";
    $meilloffre =  isset($_POST["meilloffre"])? $_POST["meilloffre"]:"";
    $achatimme =  isset($_POST["achatimme"])? $_POST["achatimme"]:"";
    $id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";
    $dateFin =  isset($_POST["dateF"])? $_POST["dateF"]:"0000-00-00T00:00";


    $info["nom"]=$nom;
    $info["datefin"]=$dateFin;
    $info["id_vendeur"]=$id_user_actual;
    


    echo $dateFin;
    if($enchere=="true")
    {
        $enchere=1;
        $info["enchere"]=$enchere;
    }
    else
    {
        $enchere=0;
        $info["enchere"]=$enchere;
    }
    if($meilloffre=="true")
    {
        $meilloffre=1;
    }
    else
    {
        $meilloffre=0;
    }
    if($achatimme=="true")
    {
        $achatimme=1;
    }
    else
    {
        $achatimme=0;
    }
    if($prix=="")
    {
        $prix=0;
    }

    //identifier votre BDD
    $database = "ecebay";
    //identifier votre table
    $table= "stock";

    //compteur pour ecrire requete
    $cpt = 0;
    $id = 0;

    $dbh=connect_ddb($database);

    $sql_insert_item="INSERT INTO `stock` (`nom`,`qualite`,`default`, `prix`, `id_cat`, `id_enchere`, `id_meilloffre`, `id_achatimme`, `id_vendeur`) VALUES ";

    $sql_insert_item.="('".$nom."','".$qualite."','".$default."',".$prix.",".$id_cat.",".$enchere.",".$meilloffre.",".$achatimme.",".$id_user_actual.")";
 
    $result=$dbh->prepare($sql_insert_item);
    $result->execute();
    //echo $sql_insert_item."<br>";
    // echo 'enchere '.$enchere."<br>";
    if($enchere==1)
    {
        $sql="SELECT id FROM `stock` WHERE nom='".$nom."' AND id_vendeur=".$id_user_actual;
        $result1=$dbh->prepare($sql);
        $result1->execute();
       // echo "second request: ".$sql;"<br>";
        while ($total=$result1->fetchAll())
        {
            
            foreach($total as $data)
            {

                $sql="INSERT INTO `transaction`(`id_vendeur`, `id_item`, `dateFin`, `type_transa`) VALUES (".$id_user_actual.",".$data['id'].",'".$dateFin."', 2)";;
               // echo "third request: ".$sql;"<br>";
                /*$result1=$dbh->prepare($sql);
                $result1->execute();*/
            }
        }
    
    
    }

    
?>