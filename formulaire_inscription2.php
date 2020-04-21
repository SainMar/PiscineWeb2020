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
  <div class="container" style="margin-top: 150px;">
  

    <?php 



if (isset ($_POST['valider'])){

   

    if($_POST['type_user']=='Acheteur')
    {
        $type_user=1;
    }
    else
    {
        $type_user=2;
    }
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

    if(isset($type_user)&&isset($nom)&&isset($prenom)&&isset($pseudo)&&isset($email)&&isset($mdp1)&&isset($mdp2)&&isset($tel)&&isset($adresse)&&isset($pays)&&isset($ville))
    {

            if($mdp1!=$mdp2){

            echo "<p>les mots de passes sont différent</p>";
            }

            else{

            $existe_boy= false;
            ///ouvre la bdd des users 
            $sql="SELECT * FROM `users`";
            $result=$dbh->prepare($sql);
            //$result->execute();



            //parcourir la bdd des users 
            //if(mail || pseudo  existent)
            while ($total=$result->fetchAll())
            {
                        
                        foreach($total as $data)
                        {
                            if(($data["email"]==$email)||($data["pseudo"]==$pseudo))
                            {

                            $existe_boy=true;

                            }
                        echo $data["nom"];
                        }
                        
            }
            ///fin boucle de parcourir tableau
            if($existe_boy==true)
            {
            echo " <p>pseudo ou mail deja utilisé.</p";/// <p> disant que ce pseudo ou ce mail existe deja 
            ?><meta http-equiv="refresh" content="5;url=formulaire_inscription.php"> <?php
            }
            if($existe_boy==false)
            {
            /// insert into la table `users` toutes les infos 

            $sql="INSERT INTO `users` (`nom`,`prenom`,`adresse`,`email`,`mdp`,`pseudo`,`ville`,`code_postal`,`pays`,`tel`,`type_user`) VALUES ";

            $sql.="('".$nom."', '".$prenom."', '".$adresse."', '".$email."', '".$mdp1."', '".$pseudo."','".$ville."', '".$code_postal."', '".$pays."', '".$tel."', ".$type_user.")";
            
            $result=$dbh->prepare($sql);
            $result->execute();

            echo '<p>Vous êtes dorénavant inscrit sur ECEbay, bonne navigation !</p>';
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
                            echo $id_user;
                        }
                }
                $_SESSION['id_user_actual']= $id_user;
                $_SESSION['pseudo_user_actual']=$pseudo;
                $_SESSION['type_user']= $type_user;
                $_SESSION["panier"]=array();
                ?><meta http-equiv="refresh" content="5;url=template_vendeur.php"> <?php
                //fonction fredireigte vers catalgue 
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

