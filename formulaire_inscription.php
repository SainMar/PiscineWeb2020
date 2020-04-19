<?php
include('fonction.php');

$database="login";

$dbh=connect_ddb($database);

session_start();

?>


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
     
      /*margin-right: 150px;*/
      padding-bottom :50px;

        position: absolute;
        top: 60%;
        left: 50%;
        /* bring your own prefixes */
        transform: translate(-50%, -40%);

        border-radius: 16px;


    }

      #signup{font-family: Arial, Helvetica, sans-serif;
font-size: 15px;
letter-spacing: 0px;
word-spacing: 0px;
color: #000000;
font-weight: normal;
text-decoration: underline solid rgb(68, 68, 68);
font-style: normal;
font-variant: normal;
text-transform: none;}


      #inscription{  text-align: center;
          padding-top: 75px;}

        #pay{margin-bottom: 10px; margin-top: 40px;}

    #creation{text-align: center;
            padding-top: 25px;

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
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">ECEbay</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="formulaire_connexion.php"><button type="button" class="btn btn-outline-light">Connexion</button></a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>  
  <!--tu vas creer un nouveau container  -->
  <div class="container-fluid" style="border: 3px solid red">


    <?php 




if (isset ($_POST['valider'])){

$type_user=$_POST['type_user'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$mdp1=$_POST['mdp1'];
$mdp2=$_POST['mdp2'];
$tel=$_POST['tel'];
$adresse=$_POST['adresse'];
$pays=$_POST['pays'];
$ville=$_POST['ville'];
$code_postal=$_POST['cp'];
$card=$_POST['card'];
$titu=$_POST['titu'];
$cvv=$_POST['cvv'];
$date=$_POST['date'];


    if(isset($type_user)&&isset($nom)&&isset($prenom)&&isset($pseudo)&&isset($emai)&&isset($mdp1)&&isset($mdp2)&&isset($tel)&&isset($adresse)&&isset($pays)&&isset($ville)&&isset($cp)&&isset($card)&&isset($titu)&&isset($cvv)&&isset($date))
  {

    if($mdp1!=$mdp2){

      echo "<p>les mots de passes sont différent</p>";
    }

    else{

    $existe_boy= false;
    ///ouvre la bdd des users 
    $sql="SELECT * FROM `users`";
    $result=$dbh->prepare($sql);
    $result->execute();



    //parcourir la bdd des users 
    //if(mail || pseudo  existent)
while ($total=$result->fetchAll())
            {
                
                foreach($total as $data)
                {
                      if(($data["email"]==$email)||($data["pseudo"]==$pseudo)){

      $existe_boy=true;

    }
                  echo $data["nom"];
                }
                
            }
    ///fin boucle de parcourir tableau
    if($existe_boy==true)
    {
    echo " <p>pseudo ou mail deja utilisé.</p";/// <p> disant que ce pseudo ou ce mail existe deja 
    }
    if($existe_boy==false)
    {
       /// insert into la table `users` toutes les infos 

         $sql="INSERT INTO `users` (`nom`,`prénom`,`adresse`,`email`,`mdp`,`pseudo`,`ville`,`code_postal`,`pays`,`tel`,`type_user`) VALUES ";

   $sql.="('".$nom."','".$prenom."','".$adresse."','".$email."','".$mdp."','".$pseudo."','".$code_postal."','".$pays."','".$tel."','".$type_user."')";

$result=$dbh->prepare($sql);
    $result->execute();


        /// redirection à la page de catalogue 
          /// re faire requete recupérer avec pseudo la ligne du users dzns users 
          /// $_SESSION['id_user_actual']= id_user;
          /// $_SESSION['pseudo_user_actual']=pseudo;
          ///$_SESSION['type_user']= type_user;
          /// fonction fredireigte vers catalgue 
    }


  }
}

  else 
  {
    echo "rempli tout les champs";; ///<p> completez tous les champs 
  }


}
  ?>


</div>






<form name="inscription" method="post" action="formulaire_inscription.php">

          <div class="container shadow-lg " >
            <div class="container-fluid" id="creation">
                <h1> Inscription</h1>

  <div class="form-group">
    <select class="form-control" name="type_user"id="exampleFormControlSelect1">
      <option>Acheteur</option>
      <option>Vendeur</option>

    </select>
  </div>
            </div>
    <div class="container"  id="pay">
    
    <h4> Informations personnelles</h4>
  </div>

        <!--Prenom et nom-->

          <div class="form-row" id=signup>

            <div class="col-md-4 mb-3">
              <label for="nom">Nom</label>
              <input type="text" class="form-control is-valid" id="nom" name="nom"  placeholder="Entrez votre nom" size="4" required>
              <div class="valid-feedback invisible">
                Looks good!
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="validationServer02">Prénom</label>
              <input type="text" class="form-control is-valid" id="validationServer02"  name="prenom" placeholder="Entrez votre prénom" value="Entrez votre prénom" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>


            <!--pseudo-->
            <div class="col-md-4 mb-3">
              <label for="validationServer03">Pseudo</label>
              <input type="text" name="pseudo"class="form-control is-valid" id="validationServer03" placeholder="Entrez votre pseudo"  required>
              <div class="valid-feedback invisible">
                Looks good!
              </div>
            </div>
          </div>

          <!--email et mdp-->
          <div class="form-row" id=signup>
            <div class="col-md-4 mb-3">
              <label for="validationServer04">email</label>
              <input type="text" class="form-control is-valid" name="email" id="validationServer04" placeholder="Entrez votre email" value="mark.otta@gmail.com" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer05">mot de passe</label>
              <input type="text" class="form-control is-valid" name="mdp1" id="validationServer05" placeholder="mot de passe" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer06">mot de passe</label>
              <input type="text" class="form-control is-valid" name="mdp2" id="validationServer06" placeholder="Confirmation" value="" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <!--telephone-->
          <div class="form-row" id=signup>
            <div class="col-md-4 ">
              <label for="validationServer07">Numéro de téléphone</label>
              <input type="text" class="form-control is-invalid" name="tel" id="validationServer07" placeholder="Entrez votre numéro" required>
              <div class="invalid-feedback">
                Passes ton 06wsh.
              </div>
            </div>
            <div class="col-md-8">
              <label for="validationServer08">Adresse de livraison</label>
              <input type="text" name="adresse" class="form-control is-invalid" id="validationServer08" placeholder="Entrez votre adresse de livraison" required>
              <div class="invalid-feedback">
                dis moi ou t'habites wsh.
              </div>
            </div>
          </div>
          <!--Adress et code postal-->
          <!--Ville et pays-->
          <div class="form-row"id=signup>
            <div class="col-md-4 mb-3">
              <label for="validationServer09">Pays</label>
              <input type="text" name="pays" class="form-control " id="validationServer09" placeholder="Pays" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer10">Ville</label>
              <input type="text" name="ville" class="form-control " id="validationServer10" placeholder="Ville" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationServer11">Code Postal</label>
              <input type="text" name="cp" class="form-control " id="validationServer11" placeholder="Zip" required>
            </div>
          </div>


       
        <!--PDP et/ou fond_ecran-->
        <!--Type user(acheteur ou vendeur uniquement-->
      
    <div class="container-fluid"  id="paiment">
    
    <h4 id=pay> Mode de paiment</h4>
  </div>
       <!--Prenom et nom-->
    
        <div class="form-row"id=signup>
          <div class="col-12">
            <label for="validationServer01">Numéro de carte</label>
            <input type="text" name="card" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
            <div class="valid-feedback invisible">
              Looks good!
            </div>
          </div>
        </div>
        <div class="form-row"id=signup>
          <div class="col-md-8">
            <label for="validationServer02">Nom du titulaire</label>
            <input type="text" name="titu" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Nom sur votre carde de crédit" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>




          <!--pseudo-->
          <div class="col-md-4">
            <label for="validationServer07">CVV</label>
            <input type="text" name="cvv" class="form-control is-valid" id="validationServer07" placeholder="pseudo" value="3 ou 4 chiffre derrière votre CB" required>
            <div class="valid-feedback invisible">
              Looks good!
            </div>
          </div>
        </div>

        <!--email et mdp-->
        <div class="form-row"id=signup>

          <div class="col-md-6">
            <label for="validationServer01">Date d'expiration</label>
            <input type="text" name="date" class="form-control is-valid" id="validationServer01" placeholder="MM/YY" value="" required>
            <div class="valid-feedback invisible">
              Looks good!
            </div>
          </div>


          <div class="col-md-2">
            <label>
              <input type="radio"  name="cb" value="visa" checked>
              <img src="visa.jpg">
            </label>
          </div>

          <div class="col-md-2">
            <label>
              <input type="radio"  name="cb" value="mastercard">
              <img src="mastercard.jpg">
            </label>
          </div>

          <div class="col-md-2">
            <label>
              <input type="radio"  name="cb" value="amex">
              <img src="amex.jpg">
            </label>
          </div>
        </div>

        <div class="form-row" id=signup>
          <div class="col-6">
          <div class="form-check">
              
                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                <label class="form-check-label" for="invalidCheck3">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>

          </div>
                        <div class="col-4">
                          <input type= "submit" name= "button1" value= "valider">
<!--                 <button type="submit" name="valider"class="btn btn-outline-info " style="padding-top: 10px;" data-toggle="modal" data-target="#exampleModalCenter">
                  inscription
                </button> -->
              </div>
        </div>
    </form>
      </div>

  </div>

</div>
</body>
</html>
