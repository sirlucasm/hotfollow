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

    function firstTimeLogin(){
        if(isset($_SESSION['firstWelcome'])){
            echo "<script>
                Swal.fire({
                    position: 'center-center',
                    type: 'success',
                    title: 'Eaii&nbsp;<strong>".$_SESSION['fullname']."</strong>!!',
                    html: '<h3> Seja bem vindo ao HotFollow. 😝</h3>',
                    showConfirmButton: false,
                    timer: 5000
                })
            </script>";
            unset($_SESSION['firstWelcome']);
        }
    }
    
    function alreadyLogged(){
        if(isset($_SESSION['alreadySigned'])){
            echo "<script>
                Swal.fire({
                    position: 'top',
                    html: '<h3> Bem vindo novamente!! 🤪</h3>',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>";
            unset($_SESSION['alreadySigned']);
        }
    }

?>