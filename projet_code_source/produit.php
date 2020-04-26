<?php
 require('config.php');
 session_start();
 
 if(isset($_POST["add_to_cart"]))  
 {
if(isset($_SESSION['username']) )
 
 {
    
   try {  

   
   
   $query = "SELECT produit,client FROM panier WHERE produit='" .$_GET['id']. "'AND client='" . $_SESSION['ID']."'";
 //$t=$conn->exec($query) ;
 $stmt = $conn->prepare($query);
 $stmt->execute();
   
   if ($stmt->fetch() == true)
   {
       $sql = "UPDATE  panier set quantite= quantite+1 where produit ='".$_GET['id']."'and client ='".$_SESSION['ID']."'";
  
    // use exec() because no results are returned
    $conn->exec($sql);
   }
   else
   {
     $id= $_SESSION['ID'] ;
     $id_pr=$_GET["id"] ;
     //$q = $_POST["quantity"];
     $prix = $_POST["hidden_price"];
     $sql = "INSERT INTO panier (client,produit,prix,quantite)
    VALUES ($id,$id_pr,$prix,1)";
    // use exec() because no results are returned
    $conn->exec($sql);
   }
   
    }
    catch(PDOException $e)
    {
    //echo $sql . "<br>" . $e->getMessage();
    }
 }
 else
 {
      header('Location:login_signup.php') ;
   
     
     exit();
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





<!-- Navigation section
================================================== -->
<section class="navbar navbar-default navbar-fixed-top " role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">H&C</a>
		 	 <a href="#"  class="navbar-brand"><img src="image\17.jpg" style="width: 00px; height: 100px;"></a> 
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right main-navigation">
			    <li><a href="Rapport_Projet.pdf" class="smoothScroll">Télécharger Rapport</a></li>
				<li><a href="index.php" class="smoothScroll">ACCEUIL</a></li>
                <li> <a href="login_signup.php" class="smoothScroll">Log In</a></li>
                <li><a href="index.php#contact" class="smoothScroll">CONTACT</a></li>
				<li>  <a href="Commandes.php" class="smoothScroll"><i class="fa fa-shopping-cart w3-margin-right" classe="smoothScroll"></i> </a></li>
				
			</ul>
		</div>

	</div>
</section>


<!-- Produits section
================================================== -->
 <div class="w3-container  w3-padding-32">
<div class="w3-content  w3-container w3-padding-64" id="Produits">
  <h3 class="w3-center">Produits Populaires</h3>
  <p class="w3-center"><em><br></em></p><br>


    <?php  
                 
                 require('config.php');
                 $stmt = $conn->prepare("select * from produits");
                  $stmt->execute();
                  
                

    // set the resulting array to associative
  
   $repertoire = "image/";
              while ($row = $stmt->fetch()) {
                  $user_image = $row['image'];
                ?>  
                
             
                <div class="col-md-4">  
                     <form method="post" action="produit.php?action=add&id=<?php echo $row["id"]; ?>" >  
                          <div style="border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $repertoire.$user_image ; ?>" class="img-responsive" style="width:300px;height:300px"><br />
                               
                               <span class="text-info"><?php echo $row["nom"]; ?></span>  
                               <span class="text-danger"><?php echo $row["prix"]; ?> DH</span>  
                               <!--<input type="text" name="quantity" class="form-control" value="1" />  -->
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-block btn-primary" value="Add to Cart" />  
                               
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                
                ?>  

    </div>

 
</div>


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
