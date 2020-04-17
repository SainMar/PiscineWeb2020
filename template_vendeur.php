<?php
  ///Pas encore utile mais besioin pour le panier et surement l'admin 
  session_start();
  
  $_SESSION["type_user"]=2;
  $_SESSION["id_user_actual"]=1;
  $_SESSION["pseudo_user_actual"]="tutur";


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

  <title>ECEbay :: acheteur : <?php echo $nom_user.' '.$prenom_user ?></title>

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
    </style>
    <script>

        var param= <?php echo json_encode($param); ?>;
        var tab= <?php echo json_encode($tab);?>;
                    
    </script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fond-orange fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">ECEbay</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Paramètres</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

 
    
    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name </h1>
        <h2 id="result"></h2>
        <h6>Choisis une catégorie:</h6>
        <div class="dropdown">
            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Catégorie
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
            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Type d'achats
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item option" type="button" id="enchere">Enchère</button>
                <button class="dropdown-item option" type="button" id="meilloffre">Meilleures Offres</button>
                <button class="dropdown-item option" type="button" id="achatimme">Achat Immédiat</button>
            </div>
        </div>

        <h6>Mot Clef:</h6>
        <input type='text' name="bar_rech" id="bar_rech" >


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
          + Add items
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"id="formulaire_item">
                
                <form>
                    <div class="row">
                        <div class="col">
                        <label for="inscri_item_nom">Name of Item</label>
                        <input type="text" class="form-control" id="inscri_item_nom">
                        </div>
                        <div class="col">
                        <label for="inscri_item_prix">Price</label>
                        <input type="number" class="form-control" placeholder="0" id="inscri_item_prix">
                        </div>
                    </div>
                    <?php for($i=0; $i<5;$i++){?>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image<?php echo $i+1;?></label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </form>
                    <?php $i+1; }?>
                    <div class="form-group">
                        <label for="inscri_item_qualite">Qualite</label>
                        <textarea class="form-control" id="inscri_item_qualite" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inscri_item_default">Default</label>
                        <textarea class="form-control" id="inscri_item_default" rows="3"></textarea>
                    </div>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="inscri_item_enchere">
                        <label class="form-check-label" for="inscri_item_enchere">Enchere</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="inscri_item_meilloffre" disabled>
                        <label class="form-check-label" for="inscri_item_meilloffre">Meilleur Offre</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="inscri_item_achatimme">
                        <label class="form-check-label" for="inscri_item_achatimme">Achat immediat</label>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Pseudo du Vendeur: <?php echo $_SESSION["pseudo_user_actual"];?></label>  
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit_new_item">Save</button>
              </div>
            </div>
          </div>
        </div>

        
      </div>
      <!-- /.col-lg-3 -->

        <div class="col-lg-9">

        

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
