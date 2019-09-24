<?php
    require_once __DIR__.'/config/api/settings.php';
    require_once __DIR__.'/config/php/autoLinks.php';
    require_once __DIR__.'/config/api/instagramLogin/success.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Política de Privacidade - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="HotFollow - Política de privacidade">
        <meta name="description" content="Políticas de privacidade do Hot Follow.">
        <meta name="keywords" content="política de privacidade, politicas de privacidade, privacy policy, hotfollow">
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
        <link rel="stylesheet" href="css/privacy_page.css">
        
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
                    <h2>Política de privacidade</h2>
                </div>
            </div>
            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <p>Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível.</p>
                    <p>A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o Hot Follow.</p>
                    <p>Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o Hot Follow serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98).</p>
                    <p>A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p><p>O uso do Hot Follow pressupõe a aceitação deste Acordo de privacidade. A equipa do Hot Follow reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.</p>
                </div>
            </div>

            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <h4>Os anúncios</h4>
                    <p>Tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.</p>
                </div>
            </div>

            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <h4>Cookie DoubleClick Dart</h4>
                    <p>O Google, como fornecedor de terceiros, utiliza cookies para exibir anúncios no nosso website;</p>
                    <p>Com o cookie DART, o Google pode exibir anúncios com base nas visitas que o leitor fez a outros websites na Internet;</p>
                    <p>Os utilizadores podem desativar o cookie DART visitando a Política de <a href='http://politicaprivacidade.com/' title='privacidade da rede de conteúdo'>privacidade da rede de conteúdo</a> e dos anúncios do Google.</p>
                </div>
            </div>

            <div class="text-edit row justify-content-center">
                <div class="col-md-9">
                    <h4>Os Cookies e Web Beacons</h4>
                    <p>Utilizamos cookies para armazenar informação, tais como as suas preferências pessoas quando visita o nosso website. Isto poderá incluir um simples popup, ou uma ligação em vários serviços que providenciamos, tais como fóruns.</p>
                    <p>Em adição também utilizamos publicidade de terceiros no nosso website para suportar os custos de manutenção. Alguns destes publicitários, poderão utilizar tecnologias como os cookies e/ou web beacons quando publicitam no nosso website, o que fará com que esses publicitários (como o Google através do Google AdSense) também recebam a sua informação pessoal, como o endereço IP, o seu ISP, o seu browser, etc. Esta função é geralmente utilizada para geotargeting (mostrar publicidade de Lisboa apenas aos leitores oriundos de Lisboa por ex.) ou apresentar publicidade direcionada a um tipo de utilizador (como mostrar publicidade de restaurante a um utilizador que visita sites de culinária regularmente, por ex.).</p>
                    <p>Você detém o poder de desligar os seus cookies, nas opções do seu browser, ou efetuando alterações nas ferramentas de programas Anti-Virus, como o Norton Internet Security. No entanto, isso poderá alterar a forma como interage com o nosso website, ou outros websites. Isso poderá afetar ou não permitir que faça logins em programas, sites ou fóruns da nossa e de outras redes.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h4>Ligações a Sites de terceiros</h4>
                    <p>O Hot Follow possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p>
                    <p>Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.</p>
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















