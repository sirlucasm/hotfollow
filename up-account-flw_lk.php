<?php
    // exibe o erro
        ini_set("display_errors", 1);

        require_once __DIR__.'/config/api/instagramLogin/success.php';
        require_once __DIR__.'/config/php/autoLinks.php';
        require_once __DIR__.'/config/php/some-configs.php';
        loginDirectError(); 

        // @@@@@##### OBTER INFORMAÇÕES DO BANCO DE DADOS
        $query = "SELECT * FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $dados = mysqli_query($conexao, $query);
        $users_hotpoints = $dados->fetch_array();
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

        <title>Upar Conta Agora - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Upar a Conta">
        <meta name="description" content="Escolha entra ganhar seguidores ou ganhar curtidas no HotFollow">
        <meta name="keywords" content="pagina de upar conta, up account page, upar conta instagram, upar conta hotfollow, ganhar seguidores instagram, ganhar curtidas instagram, ganhar likes instagram, get instagram likes, get instagram followers">
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
        <link rel="stylesheet" href="css/up-acc_page.css">
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
                        <p><a href="https://instagram.com/<?php echo $userName; ?>" target="_blank"> <?php echo $_SESSION['username']; ?> </a></p>
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

                <div class="row justify-content-center get-area">
                    <div class="">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-followers-tab" data-toggle="tab" href="#nav-followers" role="tab" aria-controls="nav-followers" aria-selected="true">Ganhar Seguidores</a>
                                <a class="nav-item nav-link" id="nav-likes-tab" data-toggle="tab" href="#nav-likes" role="tab" aria-controls="nav-likes" aria-selected="false">Ganhar curtidas</a>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="tab-content get-area get-margin-bottom" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-followers" role="tabpanel" aria-labelledby="nav-followers-tab">
                        <div class="get-followers">
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-angle-double-up"></i> +15 seguidores</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-5 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-angle-double-up"></i> +30 seguidores</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-15 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-angle-double-up"></i> +50 seguidores</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-30 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-angle-double-up"></i> +80 seguidores</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-50 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-likes" role="tabpanel" aria-labelledby="nav-likes-tab">
                        <div class="get-likes">
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-heart"></i> +15 curtidas</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-5 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-heart"></i> +30 curtidas</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-15 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-heart"></i> +50 curtidas</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-30 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="ml-5">
                                    <div class="">
                                        <h5><i class="fas fa-heart"></i> +80 curtidas</h5>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm"><strong>-50 HP's</strong></button>
                                    </div>
                                </div>
                            </div>
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
    </body>
</html>





















