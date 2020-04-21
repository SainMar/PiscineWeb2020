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


$enchere =  isset($_POST["enchere"])? $_POST["enchere"]:"";
$meilloffre =  isset($_POST["meilloffre"])? $_POST["meilloffre"]:"";
$id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";
$historique =  isset($_POST["historique"])? $_POST["historique"]:"";

if($enchere=="true")
{
    //$sql="SELECT `enchere_depose`.id_transaE, MAX(`enchere_depose`.prix_propo) AS prix FROM  `enchere_depose` INNER JOIN `stock` ON `stock`.interdit=1 INNER JOIN `transaction` ON `transaction`.id_vendeur=".$id_user_actual." GROUP BY `enchere_depose`.id_transaE";
    $sql="SELECT `stock`.*, `users`.*,`transaction`.*, DATE_FORMAT(dateFin, '%Y-%m-%d') AS day, DATE_FORMAT(dateFin, '%H:%i:%s') AS hour FROM `transaction` INNER JOIN `users` ON `users`.id_user = `transaction`.id_vendeur INNER JOIN `stock` ON `stock`.id=`transaction`.id_item  WHERE type_transa=1 AND statut=0  AND `transaction`.id_vendeur=".$id_user_actual;
    /*echo $sql."<br>";*/
        $result=$dbh->prepare($sql);
        $result->execute();
        $ok=$result->rowCount(); 
        if ($ok== 0) 
        {
            echo "<h1>you don't have answer from any of your offers...</h1>";
        } 
        else 
        {
            while ($total=$result->fetchAll())
            {
                foreach($total as $data)
                {   
                   
                  /*  $sql3="SELECT `enchere_depose`.*, `stock`.*, `transaction`.*,  DATE_FORMAT(dateFin, '%Y-%m-%d') AS day, DATE_FORMAT(dateFin, '%H:%i:%s') AS hour FROM `transaction` INNER JOIN `stock` ON `stock`.id= `transaction`.id_item INNER JOIN `enchere_depose` ON `enchere_depose`.id_transaE = `transaction`.id_transa WHERE `transaction`.statut LIKE 0  AND `enchere_depose`.prix_propo =".$data1['prix']." AND `transaction`.id_transa =".$data1['id_transaE'];
                    echo $sql3."<br>";
                    $result3=$dbh->prepare($sql3);
                    $result3->execute();
                    $ok3=$result3->rowCount();
                    
                    while ($total3=$result3->fetchAll())
                    {
                        foreach($total3 as $data)
                        {*/


                    $dateFin="'".$data['day']."T".$data['hour']."'";
                   echo '<div class="shadow-lg col-12" style="border-radius: 26px;" >
                <div class="row">
                    <div class="col-6" id="pic">
                        <img class="card-img-left" style="border-radius: 26px;  padding-right: 5px; width: 350px;" 
                    src="93777269_224549088851351_4195866612181499904_n.jpg" alt="photo item" title="" style="margin-top:20px; margin-bottom:20px;>
                    </div>

                    <div class="col-1">
                    </div>
                    
                    <div class="col-5">
                        <div class="card-block">
                            <h2 class="card-title">'.$data['nom'].'</h2>
                            <h4 class="card-title">Derniere enchère : '.$data['prix'].'  euros</h4>

                            <p> fin des enchères dans:
                                <h6 class="compte_a_rebour" style="color: red">'.$dateFin.'</h6>
                            </p>';

                           /* $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_acheteur'];
                            $result2=$dbh->prepare($sql2);
                            $result2->execute();
                            while ($total2=$result2->fetchAll())
                            {
                                foreach($total2 as $data2)
                                {
                                    echo '<p class="card-text"> Acheteur de la plus grosse enchère:  '.$data2["pseudo"].' </p>';
                                }
                            }*/

                        
                            echo'<div class="row">
                                    <form action="template_items.php" method="POST">
                                        
                                        <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id_item"].'">
                                        <input type="submit" value="Info Item" class="btn btn-outline-info btn_info_item">
                                    </form>
                                    
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                ';
                      /*  }
                    
                    }
*/
            }
        }
    }

    

     
}
if($meilloffre=="true")
{
    $sql="SELECT `meilloffre_depose`.id_transaMO, MAX(date) AS date FROM `meilloffre_depose` INNER JOIN `transaction` ON `transaction`.`id_vendeur`=".$id_user_actual." AND `meilloffre_depose`.id_transaMO=`transaction`.`id_transa` GROUP BY `meilloffre_depose`.id_transaMO";

    $result=$dbh->prepare($sql);
    $result->execute();
    $ok=$result->rowCount(); 
    if ($ok== 0) 
    {
        echo "<h1>you don't have offers...</h1>";
    } 
    else 
    {
        echo ' <h1>Offres</h1>';
        while ($total=$result->fetchAll())
        {
            foreach($total as $data1)
            {
                    $sql3="SELECT * FROM `transaction` INNER JOIN `stock` ON `stock`.id= `transaction`.id_item INNER JOIN `meilloffre_depose` ON `meilloffre_depose`.id_transaMO = `transaction`.id_transa WHERE `transaction`.statut LIKE 0 AND `transaction`.parole LIKE 'v' AND  `meilloffre_depose`.date ='".$data1['date']."' AND `transaction`.id_transa =".$data1['id_transaMO'];    
                    $result3=$dbh->prepare($sql3);
                    $result3->execute();
                    $ok3=$result3->rowCount();
                    
                    while ($total3=$result3->fetchAll())
                    {
                        foreach($total3 as $data)
                        {
                
              echo '<div class="shadow-lg col-12" style="border-radius: 26px;">
                        <div class="row">
                            <div class="col-6" id="pic">
                            <img class="card-img-left" style="  border-radius: 16px;  padding-right: 5px; width: 350px;" 
                            src="93777269_224549088851351_4195866612181499904_n.jpg" alt="photo item" title="" style="margin-top:20px; margin-bottom:20px;">
                            </div>

                            <div class="col-1">
                            </div>
                            
                            <div class="col-5">
                                <div class="card-block">
                                    <h2 class="card-title">'.$data['nom'].'</h2>
                                    <h4 class="card-title">Prix_initial: '.$data['prix'].'</h4>
                                    <h4 class="card-title">Dernière proposition: '.$data['prix_propo'].'</h4>
                                        
                                        <p> round n°'.$data['round'].'/5</p>';
                                        $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_acheteur'];
                                        $result2=$dbh->prepare($sql2);
                                        $result2->execute();
                                        while ($total2=$result2->fetchAll())
                                        {
                                            foreach($total2 as $data2)
                                            {
                                                echo '<p class="card-text">Acheteur faisant l\'offre:'.$data2["pseudo"].' </p>';
                                            }
                                        }

                                    
                echo'               <div class="row">
                                            <div class="col-md-5">
                                                <button type="button" class="btn btn-outline-success btn-block accept_mo" name="'.$data['prix_propo'].'" id="'.$data["id_transa"].'">Accept</button>
                                            </div>
                                            <div class="col-md-5">
                                                <button type="button" class="btn btn-outline-danger btn-block refuser_mo" name="'.$data['prix_propo'].'" id="'.$data["id_transa"].'"  >Refuse</button>
                                            </div>
                                            
                                            <div class="col-md-3">
                                            <form action="template_items.php" method="post">
                                                <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id_item"].'">
                                                <input type="submit" value="Info Item" class="btn btn-outline-info  btn_info_item">
                                            </form>
                                            </div>
                                            
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>';
                    }
                 }

                    
            }
        }
        
    }
}
if($historique=="true")
{
        $sql="SELECT * FROM `transaction` 
        INNER JOIN `users` ON `users`.id_user=`transaction`.id_acheteurFin
        WHERE `transaction`.statut LIKE 1 AND `transaction`.id_vendeur=".$id_user_actual;

        $result=$dbh->prepare($sql);
        $result->execute();
        $ok=$result->rowCount(); 
        if ($ok== 0) 
        {
            echo "<h1>No Historic</h1>";
        } 
        else 
        {


        echo ' <div class="container-fluid" >

                <h1> Historique </h1>

            <div class="row" id="main">
                
                        <div class="col-1">
                        </div>
                
                        <div class="shadow-lg col-12" style="border-radius: 26px;">

                        
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Acheteur</th>
                                        <th scope="col">Type Transa</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>';
                            
                                    while ($total=$result->fetchAll())
                                    {
                                        foreach($total as $data)
                                        {
                                            echo '<tr>
                                            <th scope="row">'.$data['id_transa'].'</th>
                                            <td>'.$data['nom'].'</td>
                                            <td>'.$data['prixFin'].' euros</td>
                                            <td>'.$data['dateFin'].'</td>';
                                            $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_acheteurFin'];
                                                $result2=$dbh->prepare($sql2);
                                                $result2->execute();
                                                while ($total2=$result2->fetchAll())
                                                {
                                                    foreach($total2 as $data2)
                                                    {
                                                    
                                                        echo '<td>'.$data2['nom'].'  '.$data2['prenom'].'</td>';
                                                    }
                                                }
                                                if($data['type_transa']==1)//Enchere
                                                {
                                                    echo '<td>Enchère</td>';  
                                                    echo '<td><button type="button" class="btn btn-outline-secondary btn-sm" id="facture">facture</button></td>';
                                                }
                                                if($data['type_transa']==2)//Meilleure offre
                                                {
                                                    echo '<td>Meilleure Offres</td>';
                                                     
                                                    echo '<td><button type="button" class="btn btn-outline-secondary btn-sm" id="facture">facture</button></td>';
                                                }
                                                if($data['type_transa']==3)//achats immediat
                                                {
                                                    echo '<td>Achat Immediat</td>';  
                                                    echo '<td><button type="button" class="btn btn-outline-secondary btn-sm" id="facture">facture</button></td>';
                                                }
                                                echo'</tr>';

                                        }
                                    }
                                    echo '                     </tbody>

                                    </table>
            
            
                                </div>
                    
                    </div>
                    </div>';
        }
            
    
}


?>