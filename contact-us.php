<?php
    session_start();

    if(isset($_POST['enviar'])){

        require_once 'config/php/phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->Host='mail.hotfollow.com.br';
        $mail->Port=465;
        $mail->isSMTP();  
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='ssl';
        $mail->Username='contato@hotfollow.com.br';
        $mail->Password='vida280119';
        $mail->Priority = 1; 

        $mail->setFrom($_POST['email'],$_POST['nome']);
        $mail->addAddress('contatohotfollow@gmail.com','Equipe HotFollow');
        $mail->addReplyTo($_POST['email'],$_POST['nome']);

        $mail->isHTML(true);
        $mail->Subject='|CONTATO HOTFOLLOW| '.$_POST['assunto'];
        $mail->Body='
        
            <center><img style=\'width:200px;\' src=\'https://hotfollow.com.br/img/logo-hf.png\'></center><br>
            <center><h3>Nome do usuário:</h3> '.$_POST['nome'].' <br>
            <h3>Email do usuário:</h3> '.$_POST['email'].' <br>
            <h3>Assunto do usuário:</h3> '.$_POST['assunto'].' <br>
            <h3>Mensagem do usuário:</h3> '.$_POST['mensagem'].' <br><br><br><br>
            <h4>Atenciosamente,<br>
            Equipe HotFollow.</h4></center>
        ';
        $mail->AltBody = 'Nome do usuário: '.$_POST['nome'].'Email do usuário: '.$_POST['email'].'Assunto do usuário: '.$_POST['assunto'].'Mensagem do usuário: '.$_POST['mensagem'];

        $mail->CharSet='utf-8';

        if($mail->send()){
            $_SESSION['contatoEnviado']=true;
        }else{
            $_SESSION['contatoError']=true;
        }

    }

    require_once __DIR__.'/config/api/settings.php';
    require_once __DIR__.'/config/php/autoLinks.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Contato - HotFollow</title>
        <link rel="icon" href="img/f-icon.png" sizes="32x32" >
                <!-- //////////  META TAGS  /////////// -->
        <meta name="title" content="Contate-nos - HotFollow">
        <meta name="description" content="Mande mensagem para nós, tire suas dúvidas e receba nosso suporte!">
        <meta name="keywords" content="contato, suporte, support, contact, hotfollow, contato hotfollow, suporte hotfollow">
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
        <link rel="stylesheet" href="css/contact_page.css">
        
        <script src="http://code.jquery.com/jquery-1.5.js"></script>
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

            <div class="row edit-send-us-title  justify-content-center">
                <div class="text-center">
                    <h2>Envie-nos uma mensagem</h2>
                </div>
            </div>
            <div class="row edit-text-assuntos">
                <ul>
                    <h4>Assuntos para a mensagem:</h4>
                    <li>Relatar um erro</li>
                    <li>Nos dê sua opnião sobre o site</li>
                    <li>Problemas com seguidores/curtidas</li>
                    <li>Problemas com os pontos</li>
                    <li>Tirar dúvidas</li>
                </ul>
            </div>

            <?php
				if(isset($_SESSION['contatoEnviado'])):
			?>
            <div class="msg row justify-content-center position-absolute" style="z-index:10; margin-top:-110px; width:100%;">
                <div class="col-lg-6 text-lg-center">
                    <section class="list-group-item list-group-item-action list-group-item-success">Seu contato foi enviado com sucesso. Entraremos em contato em breve ;)</section>
                </div>
            </div>
            <?php
				endif;
			    unset($_SESSION['contatoEnviado']);
            ?>


            <?php
				if(isset($_SESSION['contatoError'])):
			?>
            <div class="msg row justify-content-center position-absolute" style="z-index:10; margin-top:-100px; width:100%;">
                <div class="col-lg-6 text-lg-center">
                    <section class="list-group-item list-group-item-action list-group-item-danger">A mensagem não pôde ser enviada :( Tente novamente</section>
                </div>
            </div>
            <?php
				endif;
				unset($_SESSION['contatoError']);
            ?>
            
            <div class="row card edit-mother-form-part">
                <form class="card-body edit-container-form mx-auto col-lg-4 col-md-6 col-sm-7 col-10" action="" method="POST">
                    <div class="row form-group">
                        <div class="col-12">
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Seu nome" maxlength="30" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <input class="form-control" type="email" name="email" id="email" placeholder="seuemail@example.com" maxlength="30" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <input class="form-control" type="text" name="assunto" id="assunto" placeholder="Assunto" maxlength="20" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <textarea class="form-control" name="mensagem" id="mensagem" placeholder="Mensagem..." maxlength="250" onkeyup="countChar(this)" required></textarea>
                        </div>
                        <p id="charLeft" class="ml-3 mt-1">250</p>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar">
                        </div>
                    </div>
                </form>
            </div>

            <footer class="row edit-footer-part box-infos justify-content-center justify-content-lg-center justify-content-md-center">
                <ul class="col-md-2 col-lg-2 box-info-item" align="center">
                    <li><h3>Contato</h3></li>
                    <li><p onclick="javascript: window.location='';">Enviar mensagem</p></li>
                </ul>
                <ul class="col-md-2 col-lg-2 box-info-item" align="center">
                    <li><h3>Atalhos</h3></li>
                    <li><a href="javascript: function(){ return false; }" onclick="javascript: window.location='<?php echo $loginUrl; ?>';">Ganhar Seguidores/curtidas</a></li>
                    <li><p onclick="javascript: window.location='https://hotfollow.com.br#what-do';">O que fazer?</p></li>
                    <li><p onclick="javascript: window.location='https://hotfollow.com.br#about';">Sobre</p></li>
                </ul>
                <ul class="col-md-2 col-lg-2 box-info-item" align="center">
                    <li><h3>Informações</h3></li>
                    <li><p onclick="javascript: window.location='TermsUse.php';">Termos de utilização</p></li>
                    <li><p onclick="javascript: window.location='PrivacyPolicy.php';">Política de Privacidade</p></li>
                </ul>     
                <div class="col-lg-12 edit-share-btn sharethis-inline-share-buttons"></div>
                
            </footer>
            <div class="row pt-3 bg-copyright ">
                <div class="col-lg-12" align="center">
                    <p>© 2019 Copyright: <a href="https://hotfollow.com.br"><i>HotFollow</i></a></p>
                </div>
            </div>
        </div>        


                <!--  script para mostrar quantos caracteres faltam para exceder o limite do textarea  -->
        <script>
            function countChar(val) {
                var len = val.value.length;
                if (len >= 10000) {
                    val.value = val.value.substring(50, 10000);
                } else {
                $('#charLeft').text(250 - len);
                }
            };
        </script>
                <!--  script para tirar a mensagem de mensagem enviada ou não enviada da tela  -->
        <script>
            setTimeout(function(){ 
                var msg = $('.msg');
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
                msg.fadeOut(3000);
            }, 3000);
        </script>


    </body>
</html>















