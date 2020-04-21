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
$meilloffre_att =  isset($_POST["meilloffre_att"])? $_POST["meilloffre_att"]:"";
$meilloffre_r =  isset($_POST["meilloffre_r"])? $_POST["meilloffre_r"]:"";
$achatimme =  isset($_POST["achatimme"])? $_POST["achatimme"]:"";
$id_user_actual =  isset($_POST["id_user_actual"])? $_POST["id_user_actual"]:"";
$historique =  isset($_POST["historique"])? $_POST["historique"]:"";



if($achatimme=="true")
{
    
    $cmpt=0;
    $prix_tot=0;
    /// les achats immediat on recupere les id des items dans $_SESSION['panier'] pour afficher les items via table stock
    if(!empty($_SESSION['panier']))
    {
        $sql="SELECT * FROM `stock` WHERE";
        foreach($_SESSION['panier'] as $elem)
        {
            if($cmpt==0)
            {
                $sql.=" id=".$elem;
                $cmpt=1;
            }
            else
            {
                $sql.=" OR id=".$elem;
            }
            
        }
        
        ///connection a la base de donnée 
        $result=$dbh->prepare($sql);
        $result->execute();
        $ok=$result->rowCount();
        if ($ok== 0) 
        {
            echo "<h1>items cannot be found</h1>";

        } 
        else 
        {
            echo '<div class="row" style="border-bottom: 1px solid black;">';
            while ($total=$result->fetchAll())
            {
                
                
                foreach($total as $data)
                {
                   

                    echo ' <div class="col-lg-6 col-md-6 mb-6 item_info '.$data['id'].'">';
                    echo '  <div class="card h-100">' ;
                    echo'       <a href="#"><img class="card-img-top " src="http://placehold.it/700x400" alt=""></a>';
                            
                    echo'   <div class="card-body">';
                    echo    '   <h4 class="card-title">';
                    echo'       <form action="template_items.php" method="POST">';
                    echo'           <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id"].'">';
                    echo'           <input type="submit" value="'.$data['nom'].'" class="btn btn-outline-info btn_info_item">';
                    echo'       </form>';
                    echo'       </h4>';
                    echo'       <h5>'.$data['prix'].' euros</h5>';
                    echo'  
                            </div>';
                        $sqlam="SELECT * FROM `users` WHERE id_user=".$data['id_vendeur'];
                        $resultam=$dbh->prepare($sqlam);
                        $resultam->execute();
                        while ($totalam=$resultam->fetchAll())
                        {
                            foreach($totalam as $dataam)
                            {
                                echo'<h6 id="nom_vend">par '.$dataam['pseudo'].'</h6>';
                            }
                        }

                           
                        echo'   <div class="card-footer">';
                        echo'       <button type="button" class="btn btn-outline-danger supp_item_panier"  name="'.$data['id'].'">Supp</button>';

                        echo '  </div>
                            </div>
                        </div>
                        
                        ';
                        $prix_tot=$prix_tot+$data['prix'];


                        
                }
                
            }
            echo '</div>';
            echo '
            <div class="row" style="padding-top: 7px; margin-bottom: 5px;">
                <h5> Le prix final est : '.$prix_tot.' euros </h5>
                <div class="col-3"> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payer">Payer</button>
                </div>
            </div>
            <!-- Modal payer-->
                                                                <div class="modal fade" id="payer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Listes d\'article</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="modal-body">';
                                                                                     foreach($_SESSION['panier'] as $item)
                                                                                     {
                                                                                        $sql3="SELECT * FROM `stock` WHERE id=".$item;
                                                                                        $result3=$dbh->prepare($sql3);
                                                                                        $result3->execute();
                                                                                        while ($total3=$result3->fetchAll())
                                                                                        {
                                                                                            foreach($total3 as $data3)
                                                                                            {
                                                                                                echo '<p>'.$data3['nom'].' :'.$data3['prix'].'   euros</p>';
                                                                                            }
                                                                                        }

                                                                                     }
                                                                             echo'   </div>
                                                                               
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary payer_panier" data-dismiss="modal">Payer</button>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
            ';

            
        }


    }
    else
    {
        echo'panier empty';
    }
}
if($enchere=="true")
{
    $sql="SELECT `enchere_depose`.id_transaE, MAX(`enchere_depose`.prix_propo) AS prix FROM  `enchere_depose` WHERE `enchere_depose`.id_acheteur=".$id_user_actual." GROUP BY `enchere_depose`.id_transaE";
    
    
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
                foreach($total as $data1)
                {   
                   
                    $sql3="SELECT * FROM `transaction` INNER JOIN `stock` ON `stock`.id= `transaction`.id_item INNER JOIN `enchere_depose` ON `enchere_depose`.id_transaE = `transaction`.id_transa WHERE `transaction`.statut LIKE 0  AND `enchere_depose`.prix_propo ='".$data1['prix']."' AND `transaction`.id_transa =".$data1['id_transaE'];
    
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
                            <img class="card-img-left pdp" style="  border-radius: 16px;  padding-right: 5px; width: 350px;" 
                        src="93777269_224549088851351_4195866612181499904_n.jpg" alt="photo item" title="" style="margin-top:20px; margin-bottom:20px;>
                        </div>

                        <div class="col-1">
                        </div>
                        
                        <div class="col-5">
                            <div class="card-block">
                                <h2 class="card-title">'.$data['nom'].'</h2>
                                <h4 class="card-title">Derniere enchère : '.$data['prix_propo'].' euros</h4>

                                <p> fin des enchères dans:<h6 id="compte_a_rebour" style="text-decoration-color: red">'.$data['dateFin'].'</h6></p>';

                                $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_vendeur'];
                                $result2=$dbh->prepare($sql2);
                                $result2->execute();
                                while ($total2=$result2->fetchAll())
                                {
                                    foreach($total2 as $data2)
                                    {
                                        echo '<p class="card-text">Vendeur:'.$data2["pseudo"].' </p>';
                                    }
                                }

                            
                                echo'<div class="row">
                                        <form action="template_items.php" method="post">
                                            
                                            <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id_item"].'">
                                            <input type="submit" value="Info Item" class="btn btn-outline-info btn_info_item">
                                        </form>
                                        
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                    ';
                            }
                        }
                }
            }
        }
    /*echo $sql."<br>";*/
    

}
if($meilloffre_att=="true")
{
    
    /// les meilleurs offres non finies de cet user qui sont à la parole du 'v' /*/ il faut recupérer le prix proposé lors de la dernière offre en temps et au cb round nous sommes 
    $sql="SELECT `meilloffre_depose`.id_transaMO, MAX(date) AS date FROM  `meilloffre_depose` WHERE `meilloffre_depose`.id_acheteur=".$id_user_actual." GROUP BY `meilloffre_depose`.id_transaMO";
    
    
    /*echo $sql."<br>";*/
        $result=$dbh->prepare($sql);
        $result->execute();
        $ok=$result->rowCount(); 
        if ($ok== 0) 
        {
            echo "<h1>you didn't make offers...</h1>";
        } 
        else 
        {
            while ($total=$result->fetchAll())
            {
                foreach($total as $data1)
                {   
                   
                    $sql3="SELECT * FROM `transaction` INNER JOIN `stock` ON `stock`.id= `transaction`.id_item INNER JOIN `meilloffre_depose` ON `meilloffre_depose`.id_transaMO = `transaction`.id_transa WHERE `transaction`.statut LIKE 0 AND `transaction`.interdit LIKE 0 AND `transaction`.parole LIKE 'v' AND  `meilloffre_depose`.date ='".$data1['date']."' AND `transaction`.id_transa =".$data1['id_transaMO'];
    
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
                                        <h4 class="card-title">Prix initial: '.$data['prix'].' euros</h4>
                                        <h4 class="card-title">Votre proposition:'.$data['prix_propo'].'euros </h4>
                                            
                                            <p> round n°'.$data['round'].'/5</p>';
                                            $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_vendeur'];
                                            $result2=$dbh->prepare($sql2);
                                            $result2->execute();
                                            while ($total2=$result2->fetchAll())
                                            {
                                                foreach($total2 as $data2)
                                                {
                                                    echo '<p class="card-text">Vendeur:'.$data2["pseudo"].' </p>';
                                                }
                                            }

                                        
                    echo'             <div class="row">
                                                <form action="template_items.php" method="post">
                                                    
                                                    <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id_item"].'" >
                                                    <input type="submit" value="Info Item" class="btn btn-outline-info btn_info_item">
                                                </form>
                                                
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
if($meilloffre_r=="true")
{
    
    /// les meilleurs offres non finies de cet user qui sont à la parole du 'a' /*/ il faut recupérer le prix proposé lors de la dernière offre en temps et au cb round nous sommes 
    $sql="SELECT `meilloffre_depose`.id_transaMO, MAX(date) AS date FROM  `meilloffre_depose` WHERE `meilloffre_depose`.id_acheteur=".$id_user_actual." GROUP BY `meilloffre_depose`.id_transaMO";
    
    
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
                foreach($total as $data1)
                {   
                   
                    $sql3="SELECT * FROM `transaction` INNER JOIN `stock` ON `stock`.id= `transaction`.id_item INNER JOIN `meilloffre_depose` ON `meilloffre_depose`.id_transaMO = `transaction`.id_transa WHERE `transaction`.statut LIKE 0 AND `transaction`.interdit LIKE 0 AND `transaction`.parole LIKE 'a' AND  `meilloffre_depose`.date ='".$data1['date']."' AND `transaction`.id_transa =".$data1['id_transaMO'];
    
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
                                                                <h4 class="card-title">Dernière proposition: '.$data['prix_propo'].' euros</h4>
                                                                    
                                                                    <p> round n°'.$data['round'].'/5</p>';
                                                                    $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_vendeur'];
                                                                    $result2=$dbh->prepare($sql2);
                                                                    $result2->execute();
                                                                    while ($total2=$result2->fetchAll())
                                                                    {
                                                                        foreach($total2 as $data2)
                                                                        {
                                                                            echo '<p class="card-text">Vendeur:'.$data2["pseudo"].' </p>';
                                                                        }
                                                                    }

                                                                
                                            echo'               <div class="row">
                                                                        <div class="col-5">
                                                                            <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#supp_discu" >Supp discut</a>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-5">
                                                                            <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#ref_offre" >Nouvelle offre</a>
                                                                        </div>
                                                                        
                                                                        <form action="template_items.php" method="post">
                                                                            
                                                                            <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id_item"].'">
                                                                            <input type="submit" value="Info Item" class="btn btn-outline-info btn_info_item">
                                                                        </form>
                                                                        
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- Modal supp discussion -->
                                                                                        <div class="modal fade" id="supp_discu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Etes vous sur ?</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                            <button type="button" class="btn btn-primary btn-block supp_discu" id="'.$data['id_transa'].'" data-dismiss="modal">Supp discussion</button>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                        <!-- Modal refaire offre-->
                                                                                        <div class="modal fade" id="ref_offre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Etes vous sur ?</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="modal-body">
                                                                                                            <form>
                                                                                                            <div class="form-group">
                                                                                                                <div class="col">
                                                                                                                    <label for="inscri_item_prix">Price</label>
                                                                                                                    <input type="number" class="form-control" placeholder="0" id="prix_re_offre">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                            <button type="button" class="btn btn-primary btn-block refaire_offre" id="'.$data['id_transa'].'" data-dismiss="modal">Envoyer offre</button>
                                                                                                        </div>
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
   
    /// les transactions finies de cet user ayant un prix, un acheteur(qui est cet user) et date de FIN 
    $sql="SELECT * FROM `transaction` 
    INNER JOIN `stock` ON `stock`.id=`transaction`.id_item
    WHERE `transaction`.statut LIKE 1 AND `transaction`.id_acheteurFin=".$id_user_actual;
    /*echo $sql."<br>";*/

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
                                    <th scope="col">Vendeur</th>
                                    <th scope="col">Type transaction</th>
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
                                        $sql2="SELECT * FROM `users` WHERE id_user=".$data['id_vendeur'];
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
                                            echo '<td>Nb Round'.$data['round'].'</td>';  
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