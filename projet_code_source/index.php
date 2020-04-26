<?php

require('config.php');
if (isset($_POST['submit'])){
if (isset($_POST['name'], $_POST['email'], $_POST['subject'],  $_POST['message']))
{
   
      try {  

   
   
  
    $username = $_POST['name'] ;
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO Message (nom,email,sujet,message) 
          VALUES('$username', '$email', '$subject','$message')";
    // use exec() because no results are returned
    $conn->exec($sql);
   
  
   
    }
    catch(PDOException $e)
    {
    //echo $sql . "<br>" . $e->getMessage();
    }
  

    
}

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>H&C</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2077 Modern Town

http://www.tooplate.com/view/2077-modern-town

-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
   	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Home section
================================================== -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
       <h1 class="wow fadeInDown">H & C</h1>

			<h3 class="wow fadeInDown" style="color :#f9f7f3;" data-wow-delay="0.2s">TOUS POUR VOUS</h3>


			</div>

		</div>
	</div>
</section>


<!-- Navigation section
================================================== -->
<section class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">H&C</a>
		
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right main-navigation">
			    <li><a href="Rapport_Projet.pdf" class="smoothScroll">Télécharger Rapport</a></li>
				<li><a href="#home" class="smoothScroll">ACCEUIL</a></li>
				
                <li><a href="produit.php" class="smoothScroll">PRODUITS</a></li>
                <li> <a href="login_signup.php" class="smoothScroll">Log In</a></li>
                <li><a href="#contact" class="smoothScroll">CONTACT</a></li>
				<li>  <a href="Commandes.php"  class="smoothScroll"><i class="fa fa-shopping-cart w3-margin-right" classe="smoothScroll"></i> </a></li>
				
			</ul>
		</div>

	</div>
</section>




<!-- Testimonial section
================================================== -->
<section id="testimonial" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Service Owl Carousel section
			================================================== -->
			<div id="owl-testimonial" class="owl-carousel">

				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/1.jpg" class="img-responsive img-circle" alt="testimonial img" style="width: 300px; height: 300px;">
							<h2>Chaussures basket Fille</h2>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/2.jpg" class="img-responsive img-circle" alt="testimonial img" style="width: 300px; height: 300px;">
							<h2>Chaussures basket Fille</h2>
							
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/3.jpg" class="img-responsive img-circle" alt="testimonial img" style="width: 300px; height: 300px;">
							<h2>Nike-rose-blanc</h2>
							
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/4.jpg" class="img-responsive img-circle" alt="testimonial img" style="width: 300px; height: 300px;">
							<h2>Chaussures basket Fille</h2>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/5.jpg" class="img-responsive img-circle" alt="testimonial img"  style="width: 300px; height: 300px;">
							<h2>Mocassin</h2>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/6.jpg" class="img-responsive img-circle" alt="testimonial img"  style="width: 300px; height: 300px;">
							<h2>Mocassin Femme</h2>
							
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/8.jpg" class="img-responsive img-circle" alt="testimonial img"  style="width: 300px; height: 300px;">
							
							<p></p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/9.jpg" class="img-responsive img-circle" alt="testimonial img"  style="width: 300px; height: 300px;">
							<h2>MOCASSIN TOD'S VIEUX ROSE AVEC POMPONS FEUILLES POUR FEMME</h2>
							
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/10.jpg" class="img-responsive img-circle" alt="testimonial img"  style="width: 300px; height: 300px;">
							<h2>Mocassin Femme</h2>
						
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<img src="image/11.jpg" class="img-responsive img-circle" alt="testimonial img"  style="width: 300px; height: 300px;">
							<h2>Mocassin souple en cuire suede pour Femme </h2>
							
						</div>
					</div>
				</div>
				

			</div>


		</div>
	</div>
</section>








<!-- Contact section
================================================== -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Contact form section
			================================================== -->
			<div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-delay="0.6s" >
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="col-md-12 col-sm-12">
						<input type="text" class="form-control" placeholder="Name" name="name" id="name">
						<input type="email" class="form-control" placeholder="Email" name="email" id="email">
                        <input type="text" class="form-control" placeholder="Subject" name="subject">
                        <textarea name="message" rows="8" class="form-control" id="message" placeholder="Message" message="message"></textarea>
					</div>
					<div class="col-md-6 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="Envoyer un message">
					</div>
				</form>
			</div>

			<!-- Contact detail section
			================================================== -->
			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
				<div class="contact-detail">
					<h2>CONTACTEZ NOUS</h2>
						<div>
							<h4>H&C</h4>
							<p>Av. Mohamed V Imm. Chems Eddine</p>
						</div>
						<div>
							<h4>PARLE-NOUS</h4>
							<p>Email: H&C@gmail.com</p>

						</div>
				</div>
			</div>

		</div>
	</div>
</section>


<!-- Footer section
================================================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
			

</p>
				<p>Copyright &copy; H&C
                | Devloped : <a rel="nofollow" href="" target="_parent">Hasna Edmagh</a></p>
			

		</div>
	</div>

	<div class="col-md-12 col-sm-12">
		<div class="copyright-text wow bounceIn">

		</div>
	</div>

</footer>

<!-- Javascript
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>

</body>
</html>