<?php  

session_start() ;
require('config.php') ;
if(isset($_SESSION['username']) )
 
 { 
   
          if(isset($_GET['action'])=="supprimer")
            {
                  
                  
                    
                try {  

   
   
                        $query = "SELECT quantite FROM panier WHERE  id_panier='" .$_GET['id']."'";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $res = $stmt->fetch() ;
   
                   if ($res['quantite']>1)
                   {
                        $sql = "UPDATE  panier set quantite= quantite-1 where  id_panier ='".$_GET['id']."'";
                        $conn->exec($sql);
                   }
                   else
                   {
                        $sql = "DELETE FROM panier where id_panier= :id" ;
                        // prepare data 
                        $stmt = $conn->prepare($sql);
                        //
                
                        $stmt->bindValue(':id',$_GET['id']) ;
                        
                        // execute dta
                        $stmt->execute() ;
                        
                   }
   
                }
                catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
table {
  border-collapse: collapse;
  width: 50%;
}

th, td {
  text-align: left;
  padding: 8px;
}

/*tr:nth-child(even){background-color: #f2f2f2}*/

th {
  background-color: rgb(24, 24, 20);
  color: white;
}


</style>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Navigation section
================================================== -->
<section  class="navbar navbar-default navbar-fixed-top " role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">H&C</a>
		<!-- 	 <a href="#"  class="navbar-brand"><img src="image\17.jpg" style="width: 00px; height: 100px;"></a> -->
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right main-navigation">
			    <li><?php  echo "Welcome  :".$_SESSION['username']; ?></li>
			    <li><a href="Rapport_Projet.pdf" class="smoothScroll">Télécharger Rapport</a></li>
				<li><a href="index.php" class="smoothScroll">ACCEUIL</a></li>
				
                <li><a href="produit.php" class="smoothScroll">PRODUITS</a></li>
                
                <li><a href="index.php#contact" class="smoothScroll">CONTACT</a></li>
                 
			  <li><a href="logout.php?action=logout" class="smoothScroll">Logout</a></li>
				
			</ul>
		</div>

	</div>
</section>



<!-- Panier section
================================================== -->


<div class="w3-container w3-content w3-center w3-padding-64  style="max-width:800px" " id="band">
    <span>
    
     <a  href="index.php" class="w3-bar-item  w3-hide-small w3-hover-white"> <img src="image\23.jpg" style="width: 200px; height: 100px;"></a>
  </span>
  </div>
      <div class="container" style="max-width:800px" > 
     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Produit</th>  
                               <th width="10%">Prix</th>  
                               <th width="20%">Quantite</th>
                               <th width="20%">Action</th>
                               
                               
                          </tr>  
                          
                       
                          <?php
                          try{
                      

   $sql = "SELECT panier.id_panier, panier.prix , panier.quantite ,produits.image
   FROM panier
   INNER JOIN produits ON produits.id= panier.produit WHERE panier.client = :idcl";
    $stmt = $conn->prepare($sql);
    $id = $_SESSION['ID'] ;
    //Bind value.
    $stmt->bindValue(':idcl', $id);
  // $stmt->bindValue(':password', $password);
    
    //Execute.
     $stmt->execute();
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $total = 0;
     $repertoire = "image/";
     
    while ($row = $stmt->fetch()) {
        
        
        ?>
        <tr>  
                               <td> <img src="<?php echo $repertoire.$row["image"] ; ?>" class="img-responsive" style="width:100px;height:100px"></td>  
                               
                                
                               <td><?php echo $row["prix"]; ?>DH</td>  
                               <td><?php echo $row["quantite"]; ?></td> 
                               <td> <a href="Commandes.php?action=supprimer&id=<?php echo $row["id_panier"]; ?>">Supprimer</a></td>

                              
                              
        </tr>  
          
           <?php  
           
           $total = $total + ($row["quantite"] * $row["prix"]);  
    }
                          ?>  
          
          <tr>  
                               <td colspan="2" align="right">Total</td>  
                               <td align="right"><?php echo number_format($total, 2); ?>DH</td>  
                               
                          </tr>  
                           </table>
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
  <?php  
  
// echo "Welcome  :".$_SESSION['username']; 
 }catch(PDOException $e) {
 //   echo "Error: " . $e->getMessage();
}
}
 
 else
 {
     header('Location:login_signup.php') ;
   
     exit();
 }
 
  

 ?>

