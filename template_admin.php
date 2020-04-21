<?php
  ///Pas encore utile mais besioin pour le panier et surement l'admin 
  session_start();

  ///Acheteur type 1 ; vendeur type 2 ; admin type 3
 
  
  


  include('fonction.php');
  include('tableau.php');
  $database="ecebay";
  $dbh=connect_ddb($database);
  $sql="SELECT * FROM `categorie`";

  $result_cat=$dbh->prepare($sql);
  $result_cat->execute();
         
    while ($total=$result_cat->fetchAll())
    {
                
          foreach($total as $data)
          {
              $param[$data['id_cat']]=FALSE;       

          }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ECEbay :: Admin : <?php  $_SESSION["pseudo_user_actual"] ?></title>

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
    <script src="script2.js"></script>
    <!-- Custom styles for this template -->
  <link href="startbootstrap-shop-homepage-gh-pages/css/shop-homepage.css" rel="stylesheet">
  <style>
        .fond-orange{background-color: #FA8B07;}
        .param_selected{ background-color: #FA8B07; }
        #gallery{ margin-top: 30px;}
        #menu_g{ padding-left: 20px;}
        .shadow-lg{background-color:#E0E0E0 ; padding-bottom :10px; padding-top: 10px;}
        #pic{ border-right: 3px solid black ;}
        html, body {
                      height: 100%;
                    }
        body {
                      display: flex;
                      flex-direction: column;
                    }
        .content {
                      flex: 1 0 auto;
                    }
        .footer {
                      flex-shrink: 0;
                    }
                    #nom_vend{margin-left: 20px;}

    </style>
    <script>

        var param= <?php echo json_encode($param); ?>;
        var tab= <?php echo json_encode($tab);?>;
        var para_panier=<?php echo json_encode($para_panier);?>;
        var para_mana_vente=<?php echo json_encode($para_mana_vente);?>;
        var id_user_actual=<?php echo json_encode($_SESSION['id_user_actual']);?>;
                    
    </script>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fond-orange fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="template_vendeur.php">ECEbay</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <?php if($_SESSION["type_user"]==1)
              {?>
                <a class="nav-link" href="template_vendeur.php">Catalogue</a>
        <?php }
              ?>
        <?php if(($_SESSION["type_user"]==2)||($_SESSION["type_user"]==3))
              {?>
                  <a class="nav-link" href="template_vendeur.php">Mes items</a>
        <?php }
              ?> 
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
        <?php if($_SESSION["type_user"]==1)
              {?>
            <a class="nav-link" href="template_panier.php">Panier</a>
        <?php }
              ?>
        <?php if(($_SESSION["type_user"]==2)||($_SESSION["type_user"]==3))
              {?>
            <a class="nav-link" href="manager_vente.php">Suivi Transactions</a>
        <?php }
              ?>
          </li>
          <li class="nav-item">
           
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" type="link" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paramètres</a>
                

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <a href="about.php" class="dropdown-item option" type="button" id="enchere">About</a>
                <?php if($_SESSION["type_user"]==3)
              {?>
                <a href="template_admin.php" class="dropdown-item option" type="button" id="meilloffre">Admin</a>
              <?php }?>
              <?php if(($_SESSION["type_user"]==2)||($_SESSION["type_user"]==3))
              {?>
                <a href="manager_vente.php" class="dropdown-item option" type="button" id="meilloffre">Suivi Transactions</a>
              <?php }?>
              <?php if($_SESSION["type_user"]==1)
              {?>
                <a href="template_panier.php" class="dropdown-item option" type="button" id="meilloffre">Panier</a>
              <?php }?>
                <a href="deconnexion.php" class="dropdown-item option" type="button" id="achatimme">Déconnexion</a>
            </div>
        </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container content">

 
    
    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4" style="padding-top: 20px;">Plateau Admin</h1>
        <h2 id="result"></h2>
        <h6>Choisis une catégorie:</h6>
        <div class="dropdown">
            <button class="btn btn-secondary btn-lg dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Enchère
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item option categorie param_selected" type="button" id="all-items" >All items</button>
                <!-- On insère le nombre de catégorie existantes dans la base de donnée.-->
                      <?php 
                              $sql="SELECT * FROM `categorie`";

                              $result_cat=$dbh->prepare($sql);
                              $result_cat->execute();
                              while ($total_cat=$result_cat->fetchAll())
                              {
                        
                                  foreach($total_cat as $data)
                                  {   
                                    ?><button class="dropdown-item option categorie" type="button" id="<?php echo $data['id_cat'];?>"><?php echo $data['nom'];?></button><?php
                                  }
                              }             
                      ?>
                
            </div>
        </div>

        <h6>Choisis un type d'achat:</h6>
        <div class="dropdown">
            <button class="btn btn-secondary btn-lg dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Type d'achats
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item option" type="button" id="enchere">Enchère</button>
                <button class="dropdown-item option" type="button" id="meilloffre">Meilleures Offres</button>
                <button class="dropdown-item option" type="button" id="achatimme">Achat Immédiat</button>
            </div>
        </div>

        <h6>Mot Clef:</h6>
        <input class="btn-block" type='text' name="bar_rech" id="bar_rech" >

                                 
        
      </div>
      <!-- /.col-lg-3 -->

        <div class="col-lg-9" id="gallery">

        

            <div class="row" id="items">

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 fond-orange" >
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
