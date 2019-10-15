<?php
    
    require_once __DIR__.'/../api/instagramLogin/success.php';
    require_once __DIR__.'/autoLinks.php';
    function loginDirectError(){
        if(!isset($_SESSION['logado'])){
            echo "<script> location.replace('/../../index.php'); </script>";
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
        if(isset($_SESSION['firstWelcome']) && !isset($_SESSION['alreadySigned'])){
            echo "<script>
                Swal.fire({
                    position: 'center',
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

    function congratulationsSharedLink(){
        if(isset($_SESSION['congratulations'])){
            echo "<script>
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Parabéns!!',
                    html: '<h3> Você usou link de compartilhamento e ganhou 10 pontos 😝</h3>',
                    showConfirmButton: false,
                    timer: 5000
                })
            </script>";
            unset($_SESSION['congratulations']);
        }
    }

    function ownShareLinkAccess(){
        if(isset($_SESSION['ownShareLinkAccess'])){
            echo "<script>
                Swal.fire({
                    type: 'warning',
                    title: 'Eii!! Você não pode utilizar seu próprio link de compartilhamento 😉',
                    animation: false,
                    customClass: {
                    popup: 'animated tada'
                    }
                })
            </script>";
            unset($_SESSION['ownShareLinkAccess']);
        }
    }


?>