<?php
    // exibe o erro
        ini_set("display_errors", 1);

        require_once __DIR__.'/config/api/instagramLogin/success.php';
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

        <title>Ajuda - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Ajuda">
        <meta name="description" content="Tire suas dúvida - Perguntas frequentes - Deixe seu Feedback">
        <meta name="keywords" content="pagina de ajuda, help page, ajuda, ajuda hotfollow">
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
        <link rel="stylesheet" href="css/help_page.css">
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
                <div class="help-title row justify-content-center">
                    <h2>Ajuda</h2>
                </div>
                <div class="text-top row justify-content-center">
                    <h5 class="col-lg-5">Olá <strong><?php echo $_SESSION['fullname']; ?></strong>, estamos aqui para responder de forma rápida algumas dúvidas que você talvez possa ter. 🙃</h5>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="list-duvida-1" data-toggle="list" href="#list-duvida1" role="tab" aria-controls="duvida1">A plataforma é segura?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-2" data-toggle="list" href="#list-duvida2" role="tab" aria-controls="duvida2">Sou novo por aqui, como ganho seguidores?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-3" data-toggle="list" href="#list-duvida3" role="tab" aria-controls="duvida3">Como ganho curtidas?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-4" data-toggle="list" href="#list-duvida4" role="tab" aria-controls="duvida4">Quantos seguidores/curtidas irei ganhar?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-5" data-toggle="list" href="#list-duvida5" role="tab" aria-controls="duvida5">Como funciona o HotFollow?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-6" data-toggle="list" href="#list-duvida6" role="tab" aria-controls="duvida6">E se eu der unfollow? Irei ser penalizado?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-7" data-toggle="list" href="#list-duvida7" role="tab" aria-controls="duvida7">O que são HP's?</a>
                            <a class="list-group-item list-group-item-action" id="list-duvida-8" data-toggle="list" href="#list-duvida8" role="tab" aria-controls="duvida8">Como consigo esses HP's?</a>
                        </div>
                    </div>
                    <div class="col-10 col-lg-6 my-lg-auto my-md-auto mt-5 ml-3 text-lg-left text-md-left text-sm-left text-center">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="list-duvida1" role="tabpanel" aria-labelledby="list-duvida-1">Sim!! Quanto a segurança pode ficar tranquilo, somos os mais seguros e visamos o seu bem estar, além disso, nós não temos nosso próprio login, o login é do próprio Instagram que irá redirecionar sua conta para cá.</div>
                            <div class="tab-pane fade" id="list-duvida2" role="tabpanel" aria-labelledby="list-duvida-2">É simples, basta ir no menu, em seguida 'Upar a Conta'. A partir dai você escolhe ganhar seguidores e selecionar a quantidade. Lembre-se de deixar sua conta em <strong>público</strong>, caso esteja privada. :)</div>
                            <div class="tab-pane fade" id="list-duvida3" role="tabpanel" aria-labelledby="list-duvida-3">Vá em 'Upar a Conta' no menu, escolha por ganhar curtidas, irá aparecer suas fotos, basta escolher uma e selecionar a quantidade. Lembre-se de deixar sua conta em <strong>público</strong>, caso esteja privada. :)</div>
                            <div class="tab-pane fade" id="list-duvida4" role="tabpanel" aria-labelledby="list-duvida-4">Você pode ganhar aproximadamente <strong>200 seguidores</strong> por dia; quando trocar seus pontos por seguidores/curtidas, você deve esperar 25 minutos até trocar novamente.</div>
                            <div class="tab-pane fade" id="list-duvida5" role="tabpanel" aria-labelledby="list-duvida-5">Assim que você loga com sua conta, você está aceitando os <a href="<?php echo $linkTermsUse; ?>">Termos de Uso</a> do HotFollow. Aqui você poderá seguir outros usuários, curtir fotos e assistir anúncios para ganhar mais HP's, podendo, então, trocá-los por Seguidores/Curtidas.</div>
                            <div class="tab-pane fade" id="list-duvida6" role="tabpanel" aria-labelledby="list-duvida-6">O ato de unfollow (deixar de seguir) é ilegal aqui no HotFollow, pois irá prejudicar outro usuário. Você não gostaria de ser prejudicado né? Caso você dê unfollow, seus pontos irâo cair progressivamente e poderá ficar com saldo negativo. Ex:<br>1° unfollow<b>-2 HP's</b><br>2° unfollow<b>-4 HP's</b><br>3° unfollow<b>-6 HP's</b><br>4° unfollow<b>-8 HP's</b><br>...</div>
                            <div class="tab-pane fade" id="list-duvida7" role="tabpanel" aria-labelledby="list-duvida-7">HP's = HotPoints. Os pontos são necessários para trocar por seguidores ou curtidas.</div>
                            <div class="tab-pane fade" id="list-duvida8" role="tabpanel" aria-labelledby="list-duvida-8">Para conseguir HP's você pode seguir outros usuários (com um determinado limite, para o instagram não bloquear), curtir as fotos de outros usuários (o limite é necessário aqui também), assistindo pequenos anúncios publicitários ou compartilhando o HotFollow para seus amigos. 😉</div>
                        </div>
                    </div>
                </div>

                <div class="feedback-part">
                    <div class="row fdback-ico-img justify-content-center">
                        <div>
                            <img src="img/feedback-ico.png" alt="feedback img ico">
                        </div>
                    </div>
                    <div class="row fdback-text justify-content-center">
                        <div class="col-lg-7 text-center">
                            <h4>Precisamos de seu feedback com a utilização de nosso site. Para nos mandar algum recado <a href="contact-us.php">clique aqui</a> ou vá em 'Contato' no menu. :)</h4>
                            <h5 class="mt-4">Aguardamos sua mensagem!! 😉</h5>
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





















