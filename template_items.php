<?php
session_start();

include('fonction.php');


//identifier votre BDD
$database = "ecebay";

//compteur pour ecrire requete
$cpt = 0;
$id = 0;
$presence=0;

$dbh=connect_ddb($database);

$item =  isset($_POST['id_item'])? $_POST['id_item']:"";


?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ECEBay::Item</title>
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
	<script src="item_page.js"></script>
	<!-- Custom styles for this template -->
	<link href="startbootstrap-shop-homepage-gh-pages/css/shop-homepage.css" rel="stylesheet">
	<style>
		.fond-orange{background-color: #FA8B07;}
		.param_selected{ background-color: #FA8B07; }
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
                    

			</style>
		
		</head>
		<body>
						<a href="#" class="previous round" id="fixed">&#8249;</a>
<div class="page-wrap">
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
        
        <?php 
            $sql="SELECT `stock`.*, `users`.`pseudo` AS nom_vendeur FROM `stock` INNER JOIN `users` ON `users`.id_user=`stock`.id_vendeur WHERE `stock`.id=".$item;
        
            $result=$dbh->prepare($sql);
            $result->execute();
            $ok=$result->rowCount();
            if ($ok== 0) 
            {
                echo "<h1>no item selected</h1>";
            } 
            else 
            {
                
                while ($total=$result->fetchAll())
                {
                    
                    foreach($total as $data)
                    {
                        echo '
                                        <div class="container  content shadow-lg " style="border-radius: 8px;" id="item">
                                        <div class="row justify-content-md-center" >
                                            <div class=" col-lg-6" style=""id="pic">
                                                <img class="" style="  border-radius: 16px;   width: 100%; height: auto;"  src="93777269_224549088851351_4195866612181499904_n.jpg" alt="" id="photo" title=""> 
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card" style="border: 3px solid black; border-radius: 15px;">
                                                    <h3 class="card-header" style="border-radius: 15px;">'.$data['nom'].'</h3>
                                                    <div class="card-body" style="margin-top: 20px;margin-bottom: 5px;">
                                                    <div style="margin-bottom: 89px;">
                                                        <h5 class="card-title"><strong>Vendeur:</strong>'.$data['nom_vendeur'].'<br></h5>
                                                        <p class="card-text" id="description"><strong>Qualite:   </strong>'.$data['qualite'].'</p>
                                                        <p class="card-text" id="description"><strong>Default:   </strong>'.$data['default'].'</p>
                                                    
                                                    </div>';
                                                if($_SESSION['type_user']!=1)
                                                {
                                                    echo'       <div class="row">
                                                                    <div class="col-9">
                                                                        <div class="row" id=signup>
                                                                            <div class="col-md-9 ">
                                                                                <p>Prix :<strong>'.$data['prix'].' euros</strong></p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                }
                                                if(($data['id_achatimme']==1)&&($_SESSION['type_user']==1))
                                                {   

                                                        echo'       <div class="row">
                                                                    <div class="col-9">
                                                                        <div class="row" id=signup>
                                                                            <div class="col-md-9 ">
                                                                                <p>Obtenez directement pour <strong>'.$data['prix'].' euros</strong></p>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button" class="btn btn-primary add_panier" id="'.$data['id'].'" >+Add</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                }
                                                if($data['id_enchere']==1)
                                                {
                                                    $sql2='SELECT DATE_FORMAT(dateFin, "%Y-%m-%d") AS day, DATE_FORMAT(dateFin, "%H:%i:%s") AS hour FROM `transaction` WHERE type_transa=1 AND id_item='.$item;
                                                    
                                                    $result2=$dbh->prepare($sql2);
                                                    $result2->execute();
                                                    while ($total2=$result2->fetchAll())
                                                    {
                                                        foreach($total2 as $data2)
                                                        {

                                                            $dateFin="'".$data2['day']."T".$data2['hour']."'";
                                                            //echo $dateFin;
                                                            
                                                        }
                                                    }
                                                    if($_SESSION['type_user']==1)
                                                    {
                                                        echo'   <div class="row">
                                                                    <div class="col-9">
                                                                        <div class="row" id=signup>
                                                                            <div class="col-md-9 ">
                                                                                <p>Départ des enchères: <strong>'.$data['prix'].' euros</strong></p>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#encherir" id="'.$data['id'].'" >Encherir</button>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>';
                                                    }
                                                    echo'            <div class="row">
                                                                    <div class="col-9">
                                                                        <div class="row justify-content-center border rounded-pill" style="margin-top: 10px; margin-bottom:10px;">
                                                                            <div class="col-md-6" style="margin-top: 5px;" >
                                                                                <p >Fin des enchères dans:</p>
                                                                            </div>
                                                                            <div class="col-md-4" >
                                                                                <p id="demo" style="margin-top: 5px; color : red;" ></p>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="encherir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="modal-body">
                                                                                        <form>
                                                                                        <div class="form-group">
                                                                                            <div class="col">
                                                                                                <label for="inscri_item_prix">Price</label>
                                                                                                <input type="number" class="form-control" placeholder="0" id="prix_enchere">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary do_enchere" id="'.$data['id'].'" data-dismiss="modal">Encherir</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                               
                                                        ';
                                                }
                                                if(($data['id_meilloffre']==1)&&($_SESSION['type_user']==1))
                                                {
                                                echo'    
                                                        
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <div class="row" id=signup>
                                                                    <div class="col-md-9 ">
                                                                        <p>départ des offres:<strong>'.$data['prix'].' euros</strong></p>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#meilloffre" id="'.$data['id'].'" >faire une offre</button>                                                  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="meilloffre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" >
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                
                                                                        <div class="modal-body">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <div class="col">
                                                                                        <label for="inscri_item_prix">Price</label>
                                                                                        <input type="number" class="form-control" placeholder="0" id="prix_moffre">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary do_meilloffre" id="'.$data['id'].'" data-dismiss="modal">Envoyer offres</button>
                                                                        </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        
                                                        ';
                                                }
                                                echo'
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';
                    }
                
                }
            }
        
		
        ?>
			  <footer class="py-3 site-footer " style="background-color:#FA8B07; ">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; ECEBay 2020</p>
    </div>
    <!-- /.container -->
  </footer>
				<script>
  var datFin=<?php echo $dateFin;?>
  // Set the date we're counting down to
  var countDownDate = new Date(datFin).getTime();
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "jour " + hours + "heure "
  + minutes + "min " + seconds + "s ";
  // If the count down is finished, write some text
  if (distance < 0) {
  	clearInterval(x);
  	document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
	
</body>
</html>


