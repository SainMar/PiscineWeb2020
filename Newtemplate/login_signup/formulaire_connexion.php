

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
text-decoration: underline solid rgb(68, 68, 68);
font-style: normal;
font-variant: normal;
text-transform: none;


border-radius: 16px;

/*background: #B2BEB5*/


        }
      .btn{margin-top:  20px; margin-right:  20px; }

      #connexion{text-align: center;
          padding-top: 75px;


/*POLICE TITRE*/
 font-family:Tahoma, Geneva, sans-serif;
font-size: 40px;
letter-spacing: 0px;
word-spacing: 0px;
color: #000000;
font-weight: normal;
text-decoration: underline;
font-style: italic;
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
    <div class="container" >
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




          <div class="container shadow-lg " >

              <div class="container-fluid"  id="connexion">
    
    <h1> Connexion</h1>
  </div>

        <div id="cadre">
              <!--Prenom et nom-->
              <form>
                    <div class="form-row" id="form">

                        <div class="col-12">
                            <label for="validationServer01">Pseudo</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Entrez votre pseudo"  required>
                            <div class="valid-feedback invisible">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="validationServer02">Email</label>
                            <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Entrez votre adresse email" value="Entrez votre adresse email" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        
                    <!--pseudo-->
                        <div class="col-12">
                            <label for="validationServer07">Mot de passe</label>
                            <input type="text" class="form-control is-invalid" id="validationServer07" placeholder="entrez votre mot de passe"  required>
                            <div class="valid-feedback invisible">
                                Looks good!
                            </div>
                        </div>
                    </div>
                
               <div class="form-row" style="padding-bottom: 25px; padding-bottom: 25px;">
                <div class="col-6">
                    <br>pas encore inscrit ? cliquez <a href="#">ici</a><br>

                </div>
                <div class="col-6">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                  Connexion
                </button>
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