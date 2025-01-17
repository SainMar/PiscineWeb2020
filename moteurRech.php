<?php
      session_start();
      include('fonction.php');


        //identifier votre BDD
        $database = "ecebay";
        //identifier votre table
        $table= "stock";

        //compteur pour ecrire requete
        $cpt = 0;
        $id = 0;
        $presence=0;

        $dbh=connect_ddb($database);

        
        


        //recuperer les données venant du formulaire
        $all_items =  isset($_POST["all_items"])? $_POST["all_items"]:"";
        $enchere = isset($_POST["enchere"])?  $_POST["enchere"]:"";
        $meill_offre = isset($_POST["meilloffre"])? $_POST["meilloffre"]:"";
        $achat_imme = isset($_POST["achatimme"])? $_POST["achatimme"]:"";
        $bar_rech = isset($_POST["bar_rech"])? $_POST["bar_rech"]:"";

       
        

        ///variable des catégories
        $cat_array=array();
        $sql_cat="SELECT * FROM `categorie`";

        $result_cat=$dbh->prepare($sql_cat);
        $result_cat->execute();
                
            while ($total_cat=$result_cat->fetchAll())
            {
                        
                foreach($total_cat as $data)
                {
                    $cat_array[$data['id_cat']]=isset($_POST[$data['id_cat']])? $_POST[$data['id_cat']]:"";
                }
            }
        
        //Recupere le tableau de tous les items selectionné
        
        $sql="SELECT * FROM `$table`";
        
        if($all_items=="true")
        {
            
            $cpt=-1;
        }
        if($cpt==0)
        {

            ///uniquement item non-vendus
            if($id!=1)
            {
                    $sql.=" WHERE status LIKE 0 AND interdit LIKE 0";
                    $id=1;
            }
            else
            {
                    $sql.=" AND `$table`.status LIKE 0 AND interdit LIKE 0";
            }
            if(($_SESSION['type_user']==2)||($_SESSION['type_user']==3))
            {
                if($id!=1)
                {
                    $sql.=" WHERE id_vendeur LIKE ".$_SESSION['id_user_actual'];
                    $id=1;
                }
                else
                {
                    $sql.=" AND id_vendeur LIKE ".$_SESSION['id_user_actual'];
                }
            }
            
            ///Enchere
            if($enchere=="true")
            {
                if($id!=1)
                {
                    $sql.=" WHERE id_enchere LIKE 1";
                    $id=1;
                }
                else
                {
                    $sql.=" AND id_enchere LIKE 1";
                }
            }
            
            ///Meilleure offre
            if($meill_offre=="true")
            {
                if($id!=1)
                {
                    $sql.=" WHERE id_meilloffre LIKE 1";
                    $id=1;
                }
                else
                {
                    $sql.=" AND id_meilloffre LIKE 1";
                }
            }
            ///Achjat immediat
            if($achat_imme=="true")
            {
                if($id!=1)
                {
                    $sql.=" WHERE id_achatimme LIKE 1";
                    $id=1;
                }
                else
                {
                    $sql.=" AND id_achatimme LIKE 1";
                }
            }
            //Barre de recherche
            if($bar_rech!="")
            {
                if($id!=1)
                {
                    $sql.=" WHERE nom LIKE '%$bar_rech%'";
                    $id=1;
                }
                else
                {
                    $sql.=" AND nom LIKE '%$bar_rech%'";
                }
            }


            ///bout de requete pour les catgories
            if(!empty($cat_array))
            {   

                foreach($cat_array as $cat_key => $cat_value)
                {
                    if($cat_value=="true")
                    {
                        $presence=1;
                    }
                }
                if(($id==1)&&($presence==1))
                {
                    $sql.=" AND (";
                }
                foreach($cat_array as $cat_key => $cat_value)
                {
                    $where=0;
                    $test2=0;
                    if($cat_value=="true")
                    {
                        if($id==0)
                        {
                            $sql.=" WHERE id_cat LIKE ".$cat_key;
                            $id=2;
                            $where=1;
                        }
                        if($id==1)
                        {
                            $sql.="id_cat LIKE ".$cat_key;
                            $id=2;
                            $test2=1;
                        }
                        if(($id==2)&&($where==0)&&($test2==0))
                        {
                            $sql.=" OR id_cat LIKE ".$cat_key;
                            
                        }
                    }
                }
                if(($id==2)||(($id==1)&&($presence==1)))
                {
                    $sql.=")";
                }

            }
            
        }
    
     
       
        //$result = $dbh->query($sql);
        $result=$dbh->prepare($sql);
        $result->execute();
        //tester s'il y a de résultat

        $ok=$result->rowCount();
        //$ok=count($result->fetchAll());
        
        
        if ($ok== 0) 
        {
            //le livre recherché n'existe pas
            echo "<h1>items cannot be found</h1>";

        } 
        else 
        {
            
            //on trouve le livre recherché
           
            
            while ($total=$result->fetchAll())
            {
                
                foreach($total as $data)
                {
                

                    echo '<div class="col-lg-4 col-md-6 mb-4 '.$data['id'].'">';
                    echo '<div class="card h-100">' ;
                    echo'<a href="#"><img class="card-img-top" src="images/'.$data['img1'].'" alt=""></a>';
                    echo'<div class="card-body">';
                    echo    '<h4 class="card-title">';
                    echo'   <form action="template_items.php" method="POST">';
                    echo'       <input type="text" id="id_item" name="id_item" class="invisible" value="'.$data["id"].'">';
                    echo'       <input type="submit" value="'.$data['nom'].'" class="btn btn-lg btn-outline-info btn_info_item">';
                    echo'   </form>';
                    echo'    </h4>';
                    echo'   <h5>'.$data['prix'].' euros</h5>';
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
    
                              
                                echo'<div class="card-footer">';
                        
                        if($_SESSION['type_user']==1)
                        {
                                echo'    <button type="button" class="btn btn-primary btn-block add_panier" id="'.$data['id'].'" >+Add</button>';
                        }
                        if($_SESSION['type_user']!=1)
                        { 
                                 echo'    <button type="button" class="btn btn-danger btn-block supp_item" id="'.$data['id'].'" >-Supp</button>';
                        }
                        echo'        </div>
                                </div>
                            </div>';


                        
                }
            }
            
        }
        
        
    ?>