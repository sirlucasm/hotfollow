<?php
    // exibe o erro
        ini_set("display_errors", 1);

        require_once __DIR__.'/config/api/instagramLogin/success.php';
        require_once __DIR__.'/config/php/autoLinks.php';
        require_once __DIR__.'/config/php/some-configs.php';
        loginDirectError(); 

        // @@@@@##### OBTER INFORMAÇÕES DO BANCO DE DADOS
        $queryPoints = "SELECT * FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $querySharedCount = "SELECT * FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $dados1 = mysqli_query($conexao, $queryPoints);
        $dados2 = mysqli_query($conexao, $querySharedCount);
        $users_hotpoints = $dados1->fetch_array();
        $users_shared = $dados2->fetch_array();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Ganhar Mais HP's - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Ganhar HP's">
        <meta name="description" content="Ganhe mais HotPoints e troque por seguidores/curtidas em seu perfil do Instagram">
        <meta name="keywords" content="pagina de HotPoints, hotpoints page, ganhar pontos, hotpoints hotfollow, ganhar pontos hotfollow, compartilhar com amigos hotfollow, hotfollow, ganha mais pontos, get more points, get points, follow4follow, like4like, likeforlike, followforfollow">
        <meta name="robots" content="">
        <meta name="revisit-after" content="1 day">
        <meta name="language" content="Portuguese">
        <meta name="generator" content="N/A">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="author" content="Lucas Matheus - Fire4Dev">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
                <!-- //////////  LINKS CSS,JS,ICON ETC  /////////// -->
        <link rel="stylesheet" href="css/bootstrap-4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/get-hp_page.css">
        <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d669ef25fea9f001288d6c9&product=inline-share-buttons" async="async"></script>
        <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="config/js/bootstrap-4.3.1/js/bootstrap.min.js"></script>
        <script src="config/js/scrollTopAction.js"></script>
    </head>
    <body>
                <!-- //////////  PAGE START  /////////// -->
        <div class="container-fluid" id="top">
            <nav class="row bg-nav edit-nav">
                <div class="ml-lg-5 ml-md-4 mt-1">
                    <a href="https://hotfollow.com.br"><img style="width:180px;" src="img/logo-hf.png"></a>
                </div>
                <div class="row navbar-header">
                    <div class="mt-4 ml-4 nav-btn-menu">
                        <button type="button" id="buttonOpen" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar" style="background:none; border:none; outline:none;">
                            <i class="fas fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </nav>

            <nav id="sidebar" class="nav-left-edit row collapse show width">
                <div class="mx-auto mt-4 user-nav-part">
                    <div class="ml-4">
                        <img onclick="javascript: window.open('<?php echo $_SESSION['profile_pic']; ?>', '_blank');" src="<?php echo $_SESSION['profile_pic']; ?>">
                    </div>
                    <div class="text-center">
                        <h4><?php echo $_SESSION['fullname']; ?></h4>
                        <p><a href="https://instagram.com/<?php echo $userName; ?>" target="_blank"> <?php echo "@".$_SESSION['username']; ?> </a></p>
                        <a href="config/php/logout-session.php" class="exit-edit"><i class="fas fa-sign-out-alt"></i> sair</a>
                    </div>
                </div>
                <ul class="mx-auto">
                    
                    <li class="ch1"><a href="<?php echo $linkInicio; ?>"><i class="fas fa-home"></i> Inicio</a></li>
                    
                    <li class="ch2"><a href="<?php echo $linkUPAcc; ?>"><i class="fas fa-plus-square"></i> Upar a conta</a></li>
                    
                    <li class="ch3"><a href="<?php echo $linkGetHPS; ?>"><i class="fab fa-hotjar"></i> Ganhar HPs</a></li>
                    
                    <li class="ch4"><a href="<?php echo $linkHelp; ?>"><i class="fas fa-info-circle"></i> Ajuda</a></li>
                    
                    <li class="ch5"><a href="<?php echo $linkContactUS; ?>"><i class="fas fa-envelope"></i> Contato</a></li>
                </ul>
                <footer class="my-auto row edit-footer-part box-infos justify-content-center justify-content-lg-center justify-content-md-center">
                    <div class="col-lg-12 edit-share-btn sharethis-inline-share-buttons"></div>
                </footer>
            </nav>
            
            <div class="main-part">

                <div class="hotpoints-area">
                    <div class="row justify-content-lg-end justify-content-center">
                        <div class="input-group mb-3 mr-lg-3 mr-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><img src="img/hot-points-ico.png" alt="hotpoint icon"></span>
                            </div>
                            <div class="show-points form-control" aria-label="Default">
                                <p><?php echo $users_hotpoints['user_points']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="get-cards-edit row card-deck justify-content-center">
                    <div class="card col-lg-3 col-10 mx-auto">
                        <img class="card-img-top" src="img/get-following.png" alt="ganhar seguindo pessoas">
                        <div class="get-hps-text card-body">
                            <h3 class="card-title text-center">+ HP's Seguindo</h3>
                            <h5 class="card-text mt-4">Siga outros perfis e ganhe <b>HotPoints</b></h5>
                            <button type="button" class="btn btn-primary btn-lg btn-block mt-5">Ganhar Agora</button>
                        </div>
                    </div>
                    <div class="card col-lg-3 col-10 mx-auto">
                        <img class="card-img-top" src="img/get-liking.png" alt="ganhar curtindo fotos">
                        <div class="get-hps-text card-body">
                            <h3 class="card-title text-center">+ HP's Curtindo</h3>
                            <h5 class="card-text mt-4">Curta fotos de outros perfis e ganhe <b>HotPoints</b></h5>
                            <button type="button" class="btn btn-primary btn-lg btn-block mt-5">Ganhar Agora</button>
                        </div>
                    </div>
                    <div class="card col-lg-3 col-10 mx-auto">
                        <img class="card-img-top" src="img/get-watching.png" alt="ganhar assistindo anúncios">
                        <div class="get-hps-text card-body">
                            <h3 class="card-title text-center">+ HP's Assistindo</h3>
                            <h5 class="card-text mt-4">Assista pequenos anúncios publicitários e ganhe mais <b>HotPoints</b></h5>
                            <button type="button" class="btn btn-primary btn-lg btn-block mt-5">Ganhar Agora</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="share-area">
                <div class="row justify-content-center">
                    <div class="share-now px-4 text-center">
                        <h2>Compartilhar Agora</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="share-ico">
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="share-link share-link-text ml-4 mr-auto mr-lg-0 mr-md-0 mr-sm-0">
                        <p>Link de compartilhamento <i class="fas fa-level-down-alt"></i></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="share-link input-group mb-3 px-3 col-lg-4 col-md-7 col-sm-9">
                        <input type="text" readonly class="form-control" id="share-link" value="<?php echo $_SESSION['shareLink']; ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-clone"></i></button>
                        </div>
                    </div>
                </div>
                <div class="count-shared-area">
                    <div class="row justify-content-center">
                        <div class="mt-3">
                            <h5><?php 
                                if(isset($users_shared['sharedCount'])){ 
                                    if($users_shared['sharedCount']<=3){ 
                                        echo $users_shared['sharedCount'].' pessoas utilizaram seu link 😔';
                                    } 
                                    elseif($users_shared['sharedCount']>3 && $users_shared['sharedCount']<=6){ 
                                        echo '👏'; 
                                    } 
                                    elseif($users_shared['sharedCount']>6 && $users_shared['sharedCount']<=12){ 
                                        echo $users_shared['sharedCount'].' pessoas utilizaram seu link 😱'; 
                                    } 
                                    elseif($users_shared['sharedCount']>12){ 
                                        echo $users_shared['sharedCount'].' pessoas utilizaram seu link 🙀'; 
                                    }    
                                } 
                                else{ 
                                    echo 'Você ainda não compartilhou com niguém 😔'; 
                                } 
                                ?></h5>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row pt-3 bg-copyright ">
                <div class="col-lg-12" align="center">
                    <p>© 2019 Copyright: <a href="https://hotfollow.com.br"><i>HotFollow</i></a></p>
                </div>
            </div>
        </div>






        
        <script>
            //  botão para copiar link de compartilhamento

            $('#button-addon2').click(function(){
                //Visto que o 'copy' copia o texto que estiver selecionado, talvez você queira colocar seu valor em um txt escondido
                $('#share-link').select();
                try {
                    var ok = document.execCommand('copy');
                    if (ok){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            type: 'success',
                            title: 'Link copiado para área de transferência'
                        });
                    }
                }
                catch (e){
                    alert(e);
                }
            });
        </script>

    </body>
</html>





















