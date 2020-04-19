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
	<script src="script.js"></script>
	<!-- Custom styles for this template -->
	<link href="startbootstrap-shop-homepage-gh-pages/css/shop-homepage.css" rel="stylesheet">

	<style>


		.fond-orange{background-color: #FA8B07;}
		.param_selected{ background-color: #FA8B07; }


html, body {
    height: 100%;
}

.round {
	position: fixed;
  border-radius: 50%;
  background-color: #f1f1f1;
  color: black;
    text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  margin-left:  70px;
  margin-top: 30px;
}

.fixed {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px;*/
        /*background: #eee;*/
}

.page-wrap {
        padding-top: 100px;
    min-height: 100%;
    margin-bottom: -80px; 
        box-sizing:border-box;
}
.page-wrap:after {
    content: "";
    display: block;
}
.site-footer, .page-wrap:after {
    height: 80px; 
}


		#description{font-size: 14px;
			letter-spacing: 0px;
			word-spacing: 0px;
			color: #000000;
			font-weight: normal;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: none;}



			#item{  position: fixed;
				top: 50%;
				left: 50%;
				/* bring your own prefixes */
				transform: translate(-50%, -60%);

			}

			.mybtn{float:left;padding:15px;display:inline-block;}

.mycontainer{display:flex;align-items:center;}

			</style>

		
		</head>
		<body>

						<a href="#" class="previous round" id="fixed">&#8249;</a>

<div class="page-wrap">
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
		

			<div class="container shadow-lg " style="border-radius: 8px;" id="item">
				<div class="row justify-content-md-center" >





					<div class=" col-lg-6" style=""id='pic'>
						 <img class="" style="  border-radius: 16px;   width: 100%;
  height: auto;"  
						src="arbre.jpg" alt="" id="photo" title=""> 
					</div>

					<div class="col-lg-6">

						<div class="card" style="border: 3px solid black; border-radius: 15px;">
							<h3 class="card-header" style="border-radius: 15px;">Titre Item</h3>
							<div class="card-body" style="margin-top: 20px;margin-bottom: 5px;">
							<div style="margin-bottom: 89px;">
								<h5 class="card-title"><strong>Vendeur:</strong> Elpacino<br></h5>
								<p class="card-text" id="description"><strong>Description:</strong> (du latin arbor issu du vieux latin arbos, à l'étymologie incertaine, le linguiste Julius Pokorny le rapprochant de arduus et de l'indo-européen commun er(ə)d-, « grandir, grand », </p>
							</div>



								<div class="row">
									<div class="col-9">

										<div class="row" id=signup>

											<div class="col-md-9 ">
												<p>Obtenez directement pour <strong>29$99</strong></p>

											</div>



											<div class="col-md-2">

												<a href="#" class="btn btn-primary">Achat immédiat</a>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-9">


										<div class="row" id=signup>
											<div class="col-md-9">
												<p>Départ des enchères: <strong>15$</strong></p>

											</div>
											<div class="col-md-2">

												<a href="#" class="btn btn-primary">Enchérir</a>
											</div>

										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-9">
										<div class="row justify-content-center border rounded-pill" style="margin-top: 10px; margin-bottom:10px;">
											<div class="col-md-6" style="margin-top: 5px;" >
												<p >Fin des enchères dans:</p>
											</div>

											<div class="col-md-6" >
												<p id="demo" style="margin-top: 5px;" ></p>
											</div>

										</div> 
									</div>



								</div>

								<div class="row">
									<div class="col-9">

										<div class="row" id=signup>

											<div class="col-md-9 ">
												<p>départ des offres:<strong>29$99</strong></p>

											</div>



											<div class="col-md-2">

												<a href="#" class="btn btn-primary">Faire une offre</a>
											</div>
										</div>
									</div>
								</div>


							</div>

						</div>

					</div>
				</div>
			</div>
		</div>

			  <footer class="py-3 site-footer " style="background-color:#FA8B07; ">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; ECEBay 2020</p>
    </div>
    <!-- /.container -->
  </footer>








				<script>
  // Set the date we're counting down to
  var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

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
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
  	clearInterval(x);
  	document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>


	
</body>
</html>