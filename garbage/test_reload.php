<!DOCTYPE html>
<html lang="en">
<?php 

  $param=array();
  $param["all-items"]=TRUE;
  $param["enchere"]=FALSE;
  $param["meill-offre"]=FALSE;
  $param["achat-imme"]=FALSE;
  $param["cat1"]=FALSE;
  $param["cat2"]=FALSE;
  $param["cat3"]=FALSE;


?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ECEbay :: Admin : <?php echo $nom_user.' '.$prenom_user ?></title>

  <!-- Bootstrap core CSS -->
  <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   -->
  <link href="startbootstrap-shop-homepage-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  

  <!--JS-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
  <link href="startbootstrap-shop-homepage-gh-pages/css/shop-homepage.css" rel="stylesheet">
    <style>

    </style>
    <script>
    

        function refreshIframe() {
        var ifr = document.getElementsByName('Right')[0];
         ifr.src = ifr.src;
            }

    </script>

</head>

<body>

<h1>HELLO THIS IS MY IFRAME</h1>
    <iframe name="Right" src="template_acheteur.php" frameborder="0" style="height: 500px; width: 100%">

    <p>you are in it</p>

    </iframe>

    

    <button onclick="refreshIframe();">Refresh Iframe</button>

</body>
</html>