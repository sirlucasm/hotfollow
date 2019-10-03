<?php
    // exibe o erro
        ini_set("display_errors", 1);

        require_once __DIR__.'/config/api/instagramLogin/success.php';
        require_once __DIR__.'/config/api/instagramLogin/verify_share_link.php';
        require_once __DIR__.'/config/php/autoLinks.php';
        require_once __DIR__.'/config/php/some-configs.php';
        loginDirectError(); 

        
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148698821-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-148698821-1');
        </script>

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
        <?php
            firstTimeLogin();
            alreadyLogged();
            congratulationsSharedLink();
        ?>

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
                        <img onclick="javascript: window.open('<?php echo $_SESSION['profile_pic']; ?>', '_blank');" src="<?php echo $_SESSION['profile_pic']; ?>">
                    </div>
                    <div class="text-center">
                        <h4><?php echo $_SESSION['fullname']; ?></h4>
                        <p><a href="https://instagram.com/<?php echo $_SESSION['username']; ?>" target="_blank"> <?php echo "@".$_SESSION['username']; ?> </a></p>
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
            
            <div class="main-part mx-auto">
                <div class="row justify-content-center text-title-profile">
                    <div class="mx-auto p-2 px-4">
                        <h2 class="text-center">Seu perfil do Instagram <i class="far fa-hand-point-down"></i></h2>
                    </div>
                </div>
                <div class="profile-part">
                    <div class="row justify-content-center">
                        <div class="main-profile-img">
                            <img src="<?php echo $_SESSION['profile_pic']; ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="text-center main-user-info">
                            <h4><?php echo $_SESSION['fullname']; ?></h4>
                            <p><a href="https://instagram.com/<?php echo $_SESSION['username']; ?>" target="_blank"> <?php echo "@".$_SESSION['username']; ?> </a></p>
                        </div>
                    </div>
                    <div class="row justify-content-center main-profile-foll">                    
                        <div class="ml-2 mb-2 text-center col-10 col-lg-2">
                            <span><?php echo $_SESSION['posts']; ?></span>
                            <p>postagens</p>
                        </div>
                        <div class="ml-2 mb-2 text-center col-10 col-lg-2">
                            <span><?php echo $_SESSION['followers']; ?></span>
                            <p>seguidores</p>
                        </div>
                        <div class="ml-2 mb-2 text-center col-10 col-lg-2">
                            <span><?php echo $_SESSION['follow']; ?></span>
                            <p>seguindo</p>
                        </div>
                    </div>
                    <div class=" main-profile-bio mt-4 ml-3">
                        <div class="row justify-content-center ">
                            <div class="text-center">
                                <h5 >Biografia:</h5>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="mt-3 ml-3 col-11 col-lg-3">
                                <p><?php echo $_SESSION['bio']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="help-instructions">
                <div class="row justify-content-center help-ico">
                    <span><i class="fas fa-exclamation-circle"></i></span>
                </div>
                <div class="row help-text justify-content-center text-center">
                    <div class="col-10 col-lg-6">
                        <p>Nosso site possui algumas regras que são necessárias saber antes de começar a usar. Para saber mais sobre as regras basta clicar <a href="help.php">aqui</a> ou vá no menu e procure por 'ajuda'.</p>
                    </div>
                </div>
            </div>

            <div class="row pt-3 bg-copyright ">
                <div class="col-lg-12" align="center">
                    <p>© 2019 Copyright: <a href="https://hotfollow.com.br"><i>HotFollow</i></a></p>
                </div>
            </div>


        </div>
    </body>
</html>





















