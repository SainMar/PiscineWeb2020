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
 



    <div class="container shadow-lg " >

        <div class="container-fluid"  id="connexion">
    
    <h1> Connexion</h1>
  </div>

        <div id="cadre">
              <!--Prenom et nom-->
              <form method="POST" name="connexion" action="formulaire_connexion2.php">
                    <div class="form-row" id="form">

                        <div class="col-12">
                            <label for="validationServer01">Pseudo</label>
                            <input type="text" class="form-control" id="validationServer01" name="pseudo" placeholder="Entrez votre pseudo"  required>
                            
                        </div>

                        <div class="col-12">
                            <label for="validationServer02">Email</label>
                            <input type="text" name="email" class="form-control" id="validationServer02" placeholder="Entrez votre adresse email"  required>
                            
                        </div>

                        
                    <!--pseudo-->
                        <div class="col-12">
                            <label for="validationServer07">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" id="validationServer07" placeholder="entrez votre mot de passe"  required>
                            
                        </div>
                    </div>
                
              <div class="form-row" style="padding-bottom: 25px; padding-bottom: 25px;">
                
                <div class="col-6" style="margin-left: 10px;">
                  <button type="submit" class="btn btn-info" name="valider"data-toggle="modal" data-target="#exampleModalCenter">
                    Connexion
                  </button>
                  <div class="col-7" style="padding-left: unset;">
                      <br>pas encore inscrit ? cliquez <a href="formulaire_inscription.php">ici</a><br>

                  </div>
                  
                </div>
              </div>

                
              </form>
                <!--PDP et/ou fond_ecran-->
                <!--Type user(acheteur ou vendeur uniquement-->
          </div>

 
      </div>
  </div>

  
  


</body>
</html>