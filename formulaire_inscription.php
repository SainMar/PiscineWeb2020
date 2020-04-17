
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ECEbay :: inscription : </title>

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
    .shadow-lg { padding-top :50px ;
      margin-left: 10px; 
      padding-bottom :50px;}

        .row{ padding-top :50px ;
      margin-left: 150px;   
      padding-bottom :50px; }


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

  <div class="container-fluid">
    <div class="row">
      <div class="col-1">

      </div>
      <div class="shadow-lg col-5">
        <!--Prenom et nom-->
        <form>
          <div class="form-row">

            <div class="col-md-4 mb-3">
              <label for="validationServer01">Nom</label>
              <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Entrez votre nom"  required>
              <div class="valid-feedback invisible">
                Looks good!
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="validationServer02">Prénom</label>
              <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Entrez votre prénom" value="Otto" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>


            <!--pseudo-->
            <div class="col-md-4 mb-3">
              <label for="validationServer03">Pseudo</label>
              <input type="text" class="form-control is-valid" id="validationServer03" placeholder="Entrez votre pseudo"  required>
              <div class="valid-feedback invisible">
                Looks good!
              </div>
            </div>
          </div>

          <!--email et mdp-->
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationServer04">email</label>
              <input type="text" class="form-control is-valid" id="validationServer04" placeholder="Entrez votre email" value="mark.otta@gmail.com" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer05">mot de passe</label>
              <input type="text" class="form-control is-valid" id="validationServer05" placeholder="mot de passe" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer06">mot de passe</label>
              <input type="text" class="form-control is-valid" id="validationServer06" placeholder="Confirmation" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <!--telephone-->
          <div class="form-row">
            <div class="col-md-4 ">
              <label for="validationServer07">Numéro de téléphone</label>
              <input type="text" class="form-control is-invalid" id="validationServer07" placeholder="Entrez votre numéro" required>
              <div class="invalid-feedback">
                Passes ton 06wsh.
              </div>
            </div>
            <div class="col-md-8">
              <label for="validationServer08">Adresse de livraison</label>
              <input type="text" class="form-control is-invalid" id="validationServer08" placeholder="Entrez votre adresse de livraison" required>
              <div class="invalid-feedback">
                dis moi ou t'habites wsh.
              </div>
            </div>
          </div>
          <!--Adress et code postal-->
          <!--Ville et pays-->
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationServer09">Pays</label>
              <input type="text" class="form-control " id="validationServer09" placeholder="Pays" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer10">Ville</label>
              <input type="text" class="form-control " id="validationServer10" placeholder="Ville" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer11">Code Postal</label>
              <input type="text" class="form-control " id="validationServer11" placeholder="Zip" required>
            </div>
          </div>


        </form>
        <!--PDP et/ou fond_ecran-->
        <!--Type user(acheteur ou vendeur uniquement-->
      </div>
      <div class="shadow-lg col-5">
       <!--Prenom et nom-->
       <form>
        <div class="form-row">
          <div class="col-12">
            <label for="validationServer01">Numéro de carte</label>
            <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
            <div class="valid-feedback invisible">
              Looks good!
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-8">
            <label for="validationServer02">Nom du titulaire</label>
            <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>




          <!--pseudo-->
          <div class="col-md-4">
            <label for="validationServer07">CVV</label>
            <input type="text" class="form-control is-valid" id="validationServer07" placeholder="pseudo" value="Marto" required>
            <div class="valid-feedback invisible">
              Looks good!
            </div>
          </div>
        </div>

        <!--email et mdp-->
        <div class="form-row">

          <div class="col-md-6">
            <label for="validationServer01">Date d'expiration</label>
            <input type="text" class="form-control is-valid" id="validationServer01" placeholder="MM/YY" value="" required>
            <div class="valid-feedback invisible">
              Looks good!
            </div>
          </div>


          <div class="col-md-2">
            <label>
              <input type="radio" name="test" value="small" checked>
              <img src="visa.jpg">
            </label>
          </div>

          <div class="col-md-2">
            <label>
              <input type="radio" name="test" value="big">
              <img src="mastercard.jpg">
            </label>
          </div>

          <div class="col-md-2">
            <label>
              <input type="radio" name="test" value="big">
              <img src="amex.jpg">
            </label>
          </div>
        </div>

        <div class="form-row">
          <div class="form-check">
              <div class="col-8">
                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                <label class="form-check-label" for="invalidCheck3">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  Inscription
                </button>
              </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-1">

    </div>

  </div>

</div>
</body>
</html>