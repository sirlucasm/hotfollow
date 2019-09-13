<?php
    // exibe o erro
        ini_set("display_errors", 1);

        require_once __DIR__.'/config/api/instagramLogin/success.php';

        //require_once __DIR__.'/config/php/some-configs.php';
        //loginDirectError(); //tirar o comentario depois

        
        
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Inicio - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Inicio">
        <meta name="description" content="Entre aqui no HotFollow com sua conta do Instagram para ganhar seguidores/curtidas">
        <meta name="keywords" content="pagina de inicio, start page, inicio, inicio hotfollow">
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
        <link rel="stylesheet" href="css/inicio_page.css">
        <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
        
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar" style="background:none; border:none; outline:none;">
                            <i class="fas fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </nav>
            
            

            <nav id="sidebar" class="nav-left-edit row collapse show width">
                <div class="mx-auto mt-4 user-nav-part">
                    <div class="ml-4">
                        <img src="<?php echo $profilePic; ?>">
                    </div>
                    <div class="text-center">
                        <h4><?php echo $user_info['fullname']; ?></h4>
                        <p><a href="https://instagram.com/<?php echo $user_info['username']; ?>" target="_blank"> <?php echo $user_info['username']; ?> </a></p>
                        <a href="config/php/logout-session.php" class="exit-edit"><i class="fas fa-sign-out-alt"></i> sair</a>
                    </div>
                </div>
                <ul class="mx-auto">
                    
                    <li class="ch1"><a href="inicio.php"><i class="fas fa-home"></i> Inicio</a></li>
                    
                    <li class="ch2"><a href="up-account-flw_lk.php"><i class="fas fa-plus-square"></i> Upar a conta</a></li>
                    
                    <li class="ch3"><a href="get-hotpoints.php"><i class="fab fa-hotjar"></i> Ganhar HPs</a></li>
                    
                    <li class="ch4"><a href="help.php"><i class="fas fa-info-circle"></i> Ajuda</a></li>
                    
                    <li class="ch5"><a href="contact-us.php"><i class="fas fa-envelope"></i> Contato</a></li>
				</ul>
            </nav>
            
            <main>
                <div class="row">
                    <h2>Seu perfil do Instagram <i class="far fa-hand-point-down"></i></h2>
                </div>
                <div class="row">
                    <div>
                        <img src="<?php echo $_SESSION['profile_pic']; ?>">
                    </div>
                    
                    <div>
                        <span><?php 99 ?></span>
                        <p>postagens</p>
                    </div>

                    <div>
                        <span><?php 99999 ?></span>
                        <p>seguidores</p>
                    </div>
                    <div>
                        <span><?php 999 ?></span>
                        <p>seguindo</p>
                    </div>
                </div>

                
            </main>

        </div>
    </body>
</html>





















