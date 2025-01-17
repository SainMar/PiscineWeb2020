<?php
  ///Pas encore utile mais besioin pour le panier et surement l'admin 
  session_start();
  
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

	<title>ECEBay :: A propos</title>


  <!-- Bootstrap core CSS -->
  <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   -->
  <link href="startbootstrap-shop-homepage-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  

  <!--JS-->
  <!--ICON-->
  	<script src="https://kit.fontawesome.com/yourcode.js"></script>
  	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

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
</head>

<style>
	
	    .fond-orange{background-color: #FA8B07;}
    .param_selected{ background-color: #FA8B07; }

    .map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}

.map-container{
overflow:hidden;
margin-top:40px;
padding-bottom:56.25%;
position:relative;
height:0;
}
</style>

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
          <li class="nav-item active">
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


	<div style="margin-top: 40px; margin-bottom: 40px;" class="container shadow-lg">

		<h3 style="text-decoration: underline solid rgb(68, 68, 68);">
		Qui sommes-nous ? </h3><br>

		<p><strong>ECEBay</strong> est une boutique en ligne specialisée dans la vente d'objets entre particulier notamment les objets de collections.<br><br>

		Nous pensons qu'il réside en chacun une <strong>âme de vendeur</strong> et que dans chaque maison se cachent de petits trésors. Pourtant, force est de constater qu'il n'est pas évident pour un particulier de vendre ses objets au <strong>meilleur prix</strong> sans pour autant y consacrer ses journées.<br><br>

		En effet, si un particulier souhaite se débarasser de bricoles qui trainent dans son garage depuis plusieurs années, il devra sans doute participer à plusieurs brocantes et vide-grenier. De la même manière, si cette personne  possède un objet remarquable de part son histoire ou sa rareté, elle a plutôt intérèt à s'adresser à certains collectionneurs susceptible d'être interessés pour en tirer le meilleur prix.<br><br>

		C'est de ce constat qu'est né notre site ECEBay ! Nous voulions déveloper une plateforme de particulier à particulier mettant en relation acheteur et vendeur.<br> Gràce à cela, vendre un objet n'a jamais été aussi facile ! Il vous suffit de classer votre objets dans l'une de ces 3 catégories , <strong> Ferraille ou Trésor</strong>, <strong>Bon pour le musée</strong>, ou <strong>Accessoire VIP</strong> et de choisir si vous souhaitez le <strong>vendre aux enchères</strong> ou négocier le prix qui vous convient le mieux via le menu <strong>vente par meilleur offre</strong> .Il sera alors visible par des milliers d'acheter et tout ça sans sortir de chez vous! Vous pouvez également décider de mettre votre objet en vente par <strong> achat immédiat</strong> si vous souhaitez y consacrer un minimum de temps.<br><br>

		<strong>Vous souhaitez acheter des objets? </strong> Notre site est également une excellente solution pour tout ceux qui sont à la recherche d'un objet de collection en particulier où simplement ceux qui aiment se balader dans les brocantes à la recherche de nouvelles trouvailles. Après avoir créer votre compte, vous aurez à votre disposition un catalogue d'objet proposer par les différents vendeur particulier inscrit sur notre site avec peut-être à l'interieur la <strong>perle</strong> rare que vous recherchez!

		 </p>

		 <h4 style="text-decoration: underline solid rgb(68, 68, 68);"> 
		 Objectif: Garantir la satisfaction de nos utilisateurs</h4>

		 <div class="row">

		 	<div class="col">
		 		<i class='fas fa-shield-alt' style='font-size:36px;margin-left: 20px;'></i>
		 		<p>Site protégé</p>

		 	</div>

		 	<div class="col">
		 				 		<i class='far fa-credit-card' style='font-size:36px; margin-left: 20px;'></i>
		 		<p>paiment sécurisé</p>

		 	</div>

		 	<div class="col">
		 		<i class='far fa-smile' style='font-size:36px;margin-left: 40px;'></i>
		 		<p>des milliers de clients satisfait</p>
		 	</div>

		 	<div class="col">
		 		<i class='far fa-thumbs-up' style='font-size:36px; margin-left: 40px;'></i>
		 		<p>100% de bonnes affaires</p>
		 	</div>

		 </div>

		 <h3  style="text-decoration: underline solid rgb(68, 68, 68);" >Nous contacter</h3>

		 <p>La satisfaction de nos utilisateurs est notre priorité. C'est pourquoi nous attachons une grande importance à vos retours.</p><br>

		 <p><strong>par mail:</strong></p>


		 <div class="shadow-lg">
		 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>

      <th scope="col">Adresse email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Saint-Martin</td>
      <td>Arthur</td>
      <td>arthur.saintmartin@edu.ece.fr</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Marrec</td>
      <td>Lucas</td>
      <td>lucas.marrec@edu.ece.fr</td>
    </tr>
</tbody>
</table>
		
	</div>

			<br><p><strong>par téléphone:</strong>  0878 16 16 00 (appel gratuit)</p><br><br>

			<p style="text-align: center">Ou vous pouvez directement vous adressez à nous au siège social au <strong>37 Quai de Grenelle, 75015 Paris</strong> </p>


			<!--Google map-->
<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
  <iframe src="https://maps.google.com/maps?q=37 Quai de Grenelle, 75015 Paris&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>

<!--Google Maps-->

</body>
</html>