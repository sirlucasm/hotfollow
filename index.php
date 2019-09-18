<?php
    require_once __DIR__.'/config/api/settings.php';
    require_once __DIR__.'/config/php/some-configs.php';
    require_once __DIR__.'/config/php/autoLinks.php';
    require_once __DIR__.'/config/api/instagramLogin/success.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Seguidores e Curtidas Grátis no Instagram">
        <meta name="description" content="Com o Hot Follow você consegue seguidores no instagram de uma forma rápida e eficaz para sua conta bombar e ter vários acessos.">
        <meta name="keywords" content="seguidores instagram, followers for instagram, follow4follow, follow for follow, seguir e seguir de volta, seguidores, instagram, insta followers, insta seguidores, seguidores insta, insta follow, coins insta, hot follow, hotfollow, followers, f4f, ganhar seguidores no instagram, seguidores no instagram gratis">
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
        <link rel="stylesheet" href="css/main.css">
        
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
            avisoLoginDirectError();
        ?>

                <!-- //////////  PAGE START  /////////// -->
        <div class="container-fluid" id="top">
            <nav class="row justify-content-between">
                <div class="ml-lg-5 ml-md-4 mt-2">
                    <a href="https://hotfollow.com.br"><img style="width:180px;" src="img/logo-hf.png"></a>
                </div>

            <?php 
                // se não existir uma sessão logada irá aparecer 'Entrar'
                if( !isset($_SESSION['logado']) ): 
            ?>
                <div class="edit-but-pos">
                    <button class="mr-lg-5 mr-md-4 mr-sm-4 mr-3 btn btn-outline mt-4" type="button" onclick="javascript: window.location='<?php echo $loginUrl; ?>';">Entrar</button>
                </div>
            <?php
                else:
            ?>
                <div class="row justify-content-end">
                    <div class="logged-part mt-4 mr-4 text-center">
                        <a href="<?php echo $linkInicio; ?>">
                            <img class="rounded-circle" src="<?php echo $_SESSION['profile_pic']; ?>">
                            <span><?php echo $_SESSION['fullname']; ?></span>
                        </a>
                    </div>
                </div>
            <?php
                endif;
            ?>

            </nav>
            <div class="row justify-content-lg-start justify-content-md-start justify-content-start edit-front-text">
                <div class="col-4 ml-4 mt-3 mt-lg-5 mt-sm-3 mt-md-5 col-sm-10 col-md-auto col-lg-auto">
                    <h2>Simples. Rápido.<br>Funcional.</h2>
                </div>
            </div>

            <div class="edit-btn row justify-content-lg-start justify-content-md-start justify-content-sm-start justify-content-center ">
                <div class=" col-lg-4 mt-lg-3 ml-lg-5 col-md-4 ml-md-5 col-sm-6 mt-sm-3 ml-sm-5 col-9 mt-3">
                    <button type="button" onclick="javascript: window.location='<?php echo $loginUrl; ?>';" class="btn" data-toggle="button" aria-pressed="false" autocomplete="off" >Começar agora</button>
                </div>                    
            </div>
            
            <div class="mt-5 row no-gutters justify-content-center justify-content-lg-center" id="about">
                <div class="pos-main-img col-lg-2 col-md-2 col-sm-3 col-3">
                    <img src="img/more-flw.png">
                </div>
                <div class=" pos-text-part pt-5 col-lg-5 col-md-9 col-sm-8 col-10 mt-lg-5 mt-auto">
                    <h2 align="center">Ganhe seguidores e curtidas grátis.</h2>
                    <p align="center">Basta entrar com sua conta do instagram, juntar HotPoints (HP) e trocar eles por curtidas ou seguidores reais. </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <section class="border-on-text col-lg-10 mt-lg-5 col-md-10 mt-md-5 col-sm-10 mt-sm-5 col-9 mt-5" align="center"><b>border</b></section>
            </div>

            <div class="row no-gutters justify-content-center justify-content-lg-center">
                <div class="pos-main-img col-lg-2 col-md-2 col-sm-3 col-3 ">
                    <img src="img/security-system.png">
                </div>
                <div class=" pos-text-part pt-5 col-lg-5 col-md-9 col-sm-8 col-10 mt-auto">
                    <h2 align="center">Sua segurança é por conta da casa.</h2>
                    <p align="center">O <b>HotFollow</b> não compartilha nenhuma informação dos utilizadores do nosso sistema, além disso, criptografamos os dados para uma maior segurança</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <section class="border-on-text col-lg-10 mt-lg-5 col-md-10 mt-md-5 col-sm-10 mt-sm-5 col-9 mt-5" align="center"><b>border</b></section>
            </div>

            <div class="row no-gutters justify-content-center justify-content-lg-center">
                <div class="pos-main-img col-lg-2 col-md-2 col-sm-3 col-3 ">
                    <img src="img/real-flw.png">
                </div>
                <div class=" pos-text-part pt-5 col-lg-5 col-md-9 col-sm-8 col-10 mt-auto">
                    <h2 align="center">Seguidores reais</h2>
                    <p align="center">Os seguidores/curtidas ganhos são de perfis reais que utilizam a nossa plataforma. Basta começar e aumentar seus seguidores...</p>
                </div>
            </div>

            <div class="row justify-content-lg-center justify-content-sm-center pos-card-gif" align="center">
                <div class="card col-lg-6 col-sm-7">
                    <img class="card-img-top" src="img/insta-simulator-gf.gif">
                    <div class="pos-text-card-part card-body">
                        <h3 class="card-title">Forma rápida de ganhar...</h3>
                        <p class="card-text">Temos uma fácil interface para você ganhar acessos em seu perfil rapidamente, podendo ganhar em apenas 1 dia mais de <b>200 seguidores</b>; em uma semana <b>1400 seguidores</b></p>
                        <div class="pos-main-btn edit-btn col-md-9">
                            <button type="button" onclick="javascript: window.location='<?php echo $loginUrl; ?>';" class="btn" data-toggle="button" aria-pressed="false" autocomplete="off" >Ganhar Seguidores Agora</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" align="center" id="what-do">
                <div class="pos-what-do">
                    <img src="img/search-what-do.png">
                    <div>
                        <h1><b>O que fazer?</b></h1>
                    </div>
                </div>
            </div>

            <div class="row list-group list-group-horizontal justify-content-md-center edit-howdo-text" align="center">
                <div class="col-md-5 col-lg-3 h-auto list-group-item" style="background:#ff7d38;">
                    <img src="img/login.png">
                    <h3>Login</h3>
                    <p>Faça o login com sua conta do instagram <a href="javascript:function() { return false; }" onclick="javascript: window.location='<?php echo $loginUrl; ?>';">aqui</a> no <b>HotFollow</b>, na primeira vez logado aqui, você deve autorizar o acesso no aplicativo do Instagram, em "Fui eu".</p>
                </div>
                <div class="col-md-5 col-lg-3 h-auto list-group-item" style="background:#ff7d38;">
                    <img src="img/like-or-follow.png">
                    <h3>Escolha entre curtidas e seguidores</h3>
                    <p>Aqui você tem a opção de aumentar seus seguidores ou aumentar suas curtidas em suas publicações.</p>
                </div>
                <div class="col-md-5 col-lg-3 h-auto list-group-item" style="background:#ff7d38;">
                    <img src="img/wait-time.png">
                    <h3>Relaxe enquanto espera</h3>
                    <p>Depois de trocado os HP (HotPoints) por curtidas/seguidores você tem um tempo de espera de 25 min até realizar uma outra troca.</p>
                </div>
                <div class="col-md-5 col-lg-3 h-auto list-group-item" style="background:#ff7d38;">
                    <img src="img/collaboration-share.png">
                    <h3>+HotPoints</h3>
                    <p>O usuário de nossa plataforma tem o benefício de ganhar ainda mais pontos se compartilhar o <b>HotFollow</b> para os amigos...</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="edit-img-up ml-3 pl-1">
                    <img src="img/up-page.png" class="to-top" onclick="scrTop();">
                </div>
            </div>

            <footer class="row edit-footer-part box-infos justify-content-center justify-content-lg-center justify-content-md-center">
                <ul class="col-md-2 col-lg-2 box-info-item" align="center">
                    <li><h3>Contato</h3></li>
                    <li><a href="contact-us.php">Enviar mensagem</a></li>
                </ul>
                <ul class="col-md-2 col-lg-2 box-info-item" align="center">
                    <li><h3>Atalhos</h3></li>
                    <li><a href="javascript:function() { return false; }" onclick="javascript: window.location='<?php echo $loginUrl; ?>';">Ganhar Seguidores/curtidas</a></li>
                    <li><p onclick="scrTopWhatDO();">O que fazer?</p></li>
                    <li><p onclick="scrTopAbout();">Sobre</p></li>
                </ul>
                <ul class="col-md-2 col-lg-2 box-info-item" align="center">
                    <li><h3>Informações</h3></li>
                    <li><a href="TermsUse.php">Termos de utilização</a></li>
                    <li><a href="PrivacyPolicy.php">Política de Privacidade</a></li>
                </ul>     
                <div class="col-lg-12 edit-share-btn sharethis-inline-share-buttons"></div>
                
            </footer>
            <div class="row pt-3 bg-copyright ">
                <div class="col-lg-12" align="center">
                        <p>© 2019 Copyright: <a href="https://hotfollow.com.br"><i>HotFollow</i></a></p>
                </div>
            </div>
        </div>        


<!--  DEVELOPED IN 22/08/2019  -->
    </body>
</html>


