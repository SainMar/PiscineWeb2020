<?php
session_start();
include('fonction.php');

$database="ecebay";

$dbh=connect_ddb($database);



?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ECEbay :: connexion?></title>

  <!-- Bootstrap core CSS -->
  <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   -->
  <link href="startbootstrap-shop-homepage-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  

  <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <!-- Custom styles for this template -->
  <link href="startbootstrap-shop-homepage-gh-pages/css/shop-homepage.css" rel="stylesheet">
  <style>
    .fond-orange{background-color: #FA8B07;}
    .param_selected{ background-color: #FA8B07; }
    #form{ padding-top :50px ;}


         

      .shadow-lg{  
              position: fixed;
              top: 50%;
              left: 50%;
              /* bring your own prefixes */
              transform: translate(-50%, -50%);

            /*POLICE BLABLA*/
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            letter-spacing: 0px;
            word-spacing: 0px;
            color: #000000;
            font-weight: normal;

            font-style: normal;
            font-variant: normal;
            text-transform: none;


            border-radius: 16px;
            }



       
      .btn{margin-top:  20px; margin-right:  20px; }

      #connexion{text-align: center;
          padding-top: 75px;


                /*POLICE TITRE*/

                font-size: 40px;
                letter-spacing: 0.5px;
                word-spacing: 1px;
                color: #000000;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;

              }




      </style>
    <script>

        var param= <?php echo json_encode($param); ?>;
        var tab= <?php echo json_encode($tab);?>;

                    
    </script>

</head>

<body>
    

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fond-orange fixed-top">
    <div class="container-fluid" >
      <a class="navbar-brand" href="index.php">ECEbay</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>  
   <!-- container -->
   <div class="container-fluid" style="margin-top: 200px; text-align:center;">
    <?php  

    if (isset ($_POST['valider'])){

    $pseudo=$_POST['pseudo'];
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];

    $il_est_la=false;
    if(isset($pseudo)&&isset($email)&&isset($mdp))
    {
      /* Ouvre bdd
      select toutes les lignes*/
      $sql="SELECT * FROM `users`";
      $result=$dbh->prepare($sql);
      $result->execute(); 
      



    while ($total=$result->fetchAll())
            {
                 //tu parcoure le tableau resultant
                foreach($total as $data)
                {
                      if(($data["pseudo"]==$pseudo)&&($data["mdp"]==$mdp)||($data["email"]==$email)&&($data["mdp"]==$mdp))
                      {

                        echo '<h1>Vous êtes connecté à ECEbay, bonne navigation !</h1>';
                        /// redirection à la page de catalogue 
                        /// re faire requete recupérer avec pseudo la ligne du users dzns users 
                        $sql2="SELECT * FROM `users` WHERE pseudo="."'".$pseudo."'";
                        $result2=$dbh->prepare($sql2);
                        $result2->execute();
                        while ($total2=$result2->fetchAll())
                        {
                                
                                foreach($total2 as $data2)
                                {
                                    $id_user=$data2['id_user'];
                                    $type_user=$data2['type_user'];
                                    
                                }
                        }
                        $_SESSION['id_user_actual']= $id_user;
                        $_SESSION['pseudo_user_actual']=$pseudo;
                        $_SESSION['type_user']= $type_user;
                        $_SESSION["panier"]=array();
                        ?><meta http-equiv="refresh" content="2;url=template_vendeur.php"> <?php
                        //fonction fredireigte vers catalgue 
                                  $il_est_la=true;

                       }
                  
                }
                
            }
/*        if(email_user= mail && password_user= password)
        {
            $il_est_la=true;
        }*/
        
      // fin tableau des users
        if($il_est_la==false)
        {
          echo '<h1> combinaison email/mdp ou pseudo/mdp incorrect</h1>'; /// <p> c pas bon 
          ?><meta http-equiv="refresh" content="2;url=formulaire_connexion.php"> <?php

        }
      
    }

    else{
      echo "<p> Veuillez remplir tout les champs";
    }
    
    }

    
    ?>
   </div>
</body>
</html>