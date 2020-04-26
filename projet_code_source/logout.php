<?php

session_start();
    if(isset($_GET['action'])=="logout")
    {
        session_destroy() ;
        header('Location:login_signup.php');
        exit ;
    }

?>