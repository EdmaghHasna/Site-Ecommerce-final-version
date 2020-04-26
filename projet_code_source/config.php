
<!--pour gerer la connexion de la base de donnee-->

<?php
$servername = "localhost";
$name = "id12823486_hasna";
$pass = "1234@hya";
$dbname = "id12823486_hcsite";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name , $pass );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>