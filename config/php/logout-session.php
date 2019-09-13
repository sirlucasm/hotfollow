<?php
    session_start();
        
    if(isset($_SESSION['logado'])){
        echo "<script> location.replace('/../../index.php'); </script>";
        session_unset();
        session_destroy();
        exit();
    }
?>