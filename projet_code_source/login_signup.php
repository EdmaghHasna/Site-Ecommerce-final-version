<?php
if(!isset($_SESSION))
{
session_start();

}
require('config.php');
if (isset($_POST['reg_user'])){
if (isset($_POST['Username'], $_POST['Email'], $_POST['Password'],  $_POST['Phone']))
{
    if (testMail( $_POST['Email'])===true)
  {
      try {  

   
   
   $query = "SELECT Email FROM User WHERE Email='" .$_POST['Email']."'";
 //$t=$conn->exec($query) ;
 $stmt = $conn->prepare($query);
 $stmt->execute();
   
   if ($stmt->fetch() == false)
   {
    $username = $_POST['Username'] ;
    $email = $_POST['Email'] ;
    $password = $_POST['Password'];
    $phone = stripslashes($_POST['Phone']);
    
    $sql = "INSERT INTO User (Username,Email,Password,phone) 
  			  VALUES('$username', '$email', '$password','$phone')";
    // use exec() because no results are returned
    $conn->exec($sql);
   }
   else
   {
    $message = "Username Exist.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
   }
   
    }
    catch(PDOException $e)
    {
    //echo $sql . "<br>" . $e->getMessage();
    }
  }
  else
 {
  // die ('Mot de passe ou Email  ou phone invalide') ;
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}

    
}
}

elseif(isset($_POST['log_in'])){
if (isset($_POST['mail'],$_POST['pass']))
{
    
    //Retrieve the field values from our login form.
    $mail = $_POST['mail'];
    $password =$_POST['pass'];
    
  
   
    //Retrieve the user account information for the given username.
    $sql = "SELECT  ID,Username,Email, Password FROM User WHERE Email = :mail and Password =:password";
    $stmt = $conn->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':mail', $mail);
    $stmt->bindValue(':password', $password);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        //echo('Incorrect username / password combination!');
        
         $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
      //  $validPassword = password_verify($passwordAttempt, $user['Password']);
        
        //If $validPassword is TRUE, the login has been successful.
      // if($validPassword){
            
            //Provide the user with a login session.
           
            $_SESSION['username'] = $user['Username'];
         
            $_SESSION['ID'] = $user['ID'];
         
            //  $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('location:Commandes.php');
            exit;
            
        // } else{
        //     //$validPassword was FALSE. Passwords do not match.
        //     die('Incorrect username / password combination!');
        // }
    }
    
}

}


function testmot($password){
    
        //  $password = $_POST['password'];
   
      if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password) && strlen($password) >= 8) {
          return true ;
      }
      
      else {
          return false ;
      }
          
      
    }
/// verifier phone
function testphone($phone){
    
        
      if (preg_match('[0-9]', $phone) && strlen($phone)==10) {
         
          return true ;
      }
      
      else {
          return false ;
      }
          
      
    }

    

/// verifier l'email

    function testMail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true ;

          }
        else 
        {
            return false ;
        }
    } 
    

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/style1.css">

</head>
<body>
<div class="pen-title">
  <span>
    
     <a  href="index.php" class="w3-bar-item  w3-hide-small w3-hover-white"> <img src="image\23.jpg" style="width: 200px; height: 100px;"></a>
  </span>
</div>
 <!--Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">CLIQUER POUS S'INSCRIRE</div>
  </div>
   
  <div class="form">
    <h2>S'Authentifier</h2>
 <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                  <label>Nom Utilisateur :</label><input type = "email" name = "mail" class = "box"  required/><br /><br />
                  <label>Mot de passe :</label><input type = "password" name = "pass" class = "box" required/><br/><br />
                  <button type="submit" class="btn" name="log_in">Se connecter</button>
               </form>
  </div>
  
  <div class="form">
      
    <h2>Créer votre compte</h2>
  
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	
  	<div class="input-group">
  	  <label>Nom Utilisateur</label>
  	  <input type="text" name="Username" value="" required>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="Email" value="" required>
  	</div>
  	<div class="input-group">
  	  <label>Mot de passe</label>
  	  <input type="password" name="Password" required>
  	</div>
  	<div class="input-group">
  	  <label>Phone</label>
  	  <input type="text" name="Phone" required>
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">S'insrire</button>
  	</div>
  	
  </form>
  </div>
  <div class="cta"></div>
</div>
 
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!--<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>-->
<script  src="js/script.js"></script>
<script type="text/javascript">
$(document).on('click', '.formsubmitbutton', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $(".form").attr('action'),
        data: $(".form").serialize(),
        success: function(response) {
             if (response === "success") {
                  window.reload;
             } else {
                   alert("invalid username/password.  Please try again");
             }
        }
    });
});
</script>

</body>
</html>







