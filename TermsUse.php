<?php
    require_once __DIR__.'/config/api/settings.php';
    require_once __DIR__.'/config/php/autoLinks.php';
    require_once __DIR__.'/config/api/instagramLogin/success.php';
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

        <title>Termos de Uso - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Termos de Uso">
        <meta name="description" content="Termos de Uso do Hot Follow.">
        <meta name="keywords" content="termos de uso, termos de utilização, terms use, use terms, hotfollow">
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
        <link rel="stylesheet" href="css/terms_page.css">
        
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
            <nav class="row justify-content-between bg-nav edit-nav">
                <div class="ml-lg-5 ml-md-4 mt-3">
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

            <div class="text-edit row justify-content-center">
                <div class="text-center">
                    <h2>Termos de Utilização</h2>
                </div>
            </div>
            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <p>Ao fazer o login em nosso site, entendemos para fins legais que você concordou com nossos termos e está ciente dos problemas que isso possa causar.</p>
                    <h4>I - Privacidade:</h4>
                    <p>I.I - O HotFollow armazena a foto do usuário por facilitção na hora de adquirir os usuários para seguir/curtir, mas são guardadas e <b>criptografadas</b>.</p>
                    <p>I.II - O HotFollow não armazena nenhuma senha do Instagram.</p>
                    <p>I.III - O HotFollow armazena nome, id entre outros dados do utilizador.</p>
                    <p>I.IV - O HotFollow usa a API do Instagram como forma de conexão, além de uma conexão direta e segura com o servidor.</p>
                    <p>I.V - O HotFollow não tem permissão de excluir a conta do Instagram, não somos responsáveis por qualquer problema em sua conta.</p>
                </div>
            </div>

            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <h4>2 - Suas responsabilidades:</h4>
                    <p>2.1 - O uso do HotFollow é voluntário e de sua responsabilidade.</p>
                    <p>2.2 - O HotFollow não é responsável por qualquer erro ou problema que possa ser causado pelo uso do sistema.</p>
                </div>
            </div>

            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <h4>3 - Acesso ao Instagram:</h4>
                    <p>3.1 - O HotFollow, após sua autorização,  pode curtir à qualquer momento outros usuários usando sua conta.</p>
                    <p>3.2 - O HotFollow, após sua autorização,  pode seguir à qualquer momento outros usuários usando sua conta.</p>
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
                    <li><a href="javascript: function(){ return false; }" onclick="javascript: window.location='<?php if(!isset($_SESSION['logado'])){ echo $loginUrl; }else{ echo $linkInicio; } ?>';">Ganhar Seguidores/curtidas</a></li>
                    <li><p onclick="javascript:window.location='https://hotfollow.com.br#what-do';">O que fazer?</p></li>
                    <li><p onclick="javascript:window.location='https://hotfollow.com.br#about';">Sobre</p></li>
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
    </body>
</html>





















