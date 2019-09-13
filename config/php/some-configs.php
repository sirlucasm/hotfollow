<?php
    
    require_once __DIR__.'/../api/instagramLogin/success.php';
    
    function loginDirectError(){
        if(!isset($_SESSION['logado'])){
            echo "<script> location.replace('index.php'); </script>";
            $_SESSION['aviso']=true;
            die();
        }
    }

    function avisoLoginDirectError(){
        if(isset($_SESSION['aviso'])){
            echo "<script> swal({
                            title: 'OPS!!...',
                            text: 'Você deve logar com sua conta do Instagram para iniciar sua Sessão :)',
                            icon: 'error',
                            button: 'Ok!',
                        }); 
                </script>";
                session_destroy();
        }
    }

?>