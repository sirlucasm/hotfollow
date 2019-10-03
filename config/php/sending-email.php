<?php

    require_once __DIR__.'/phpmailer/PHPMailerAutoload.php';
    require_once __DIR__.'/../api/instagramLogin/success.php';


    //send to admin an email notifying the new user
    function newUserToAdminEmail(){  
        $mail = new PHPMailer;
        $mail->Host='mail.hotfollow.com.br';
        $mail->Port=465;
        $mail->isSMTP();  
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='ssl';
        $mail->Username='contato@hotfollow.com.br';
        $mail->Password='vida280119';
        $mail->Priority = 1; 

        $mail->setFrom('contato@hotfollow.com.br','Avisos HotFollow');
        $mail->addAddress('contatohotfollow@gmail.com','Equipe HotFollow');

        $mail->isHTML(true);
        $mail->Subject='|NOVO USUÁRIO| '.$_SESSION['fullname'];
        $mail->Body='
            
            <center><img style=\'width:200px;\' src=\'https://hotfollow.com.br/img/logo-hf.png\'></center><br>
            <center>
                <h1>FOI CADASTRADO UM NOVO USUÁRIO!! 😍</h1>
                <h2>Informações do usuário: </h2>
            </center>
            <h3>Nome:</h3> <i>'.$_SESSION['fullname'].'</i> <br>
            <h3>Usuário:</h3> <i>'.$_SESSION['username'].'</i> <br>
            <h3>Biografia:</h3> <i>'.$_SESSION['bio'].'</i> <br>
            <h3>ID do Instagram do usuário:</h3> <i>'.$_SESSION['user_id'].'</i> <br><br><br><br>
            <h4>Atenciosamente,<br>
            Equipe HotFollow. ✌</h4>
        ';
        $mail->AltBody = 'NOVO USUÁRIO CADASTRADO!!  Informações:      Nome: '.$_SESSION['fullname'].'Usuário: '.$_SESSION['username'].'Biografia: '.$_SESSION['bio'].'ID do Instagram do usuário: '.$_SESSION['user_id'];
        $mail->CharSet='utf-8';
        if($mail->send()){
            unset($_SESSION['sendEmailToAdmin']);
        }
    }

    //send contact us email
    function contactUSEmailSend(){
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


    function newUserToAdminEmailWithShareLink(){
        $mail = new PHPMailer;
        $mail->Host='mail.hotfollow.com.br';
        $mail->Port=465;
        $mail->isSMTP();  
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='ssl';
        $mail->Username='contato@hotfollow.com.br';
        $mail->Password='vida280119';
        $mail->Priority = 1; 

        $mail->setFrom('contato@hotfollow.com.br','Avisos HotFollow');
        $mail->addAddress('contatohotfollow@gmail.com','Equipe HotFollow');

        $mail->isHTML(true);
        $mail->Subject='|NOVO USUÁRIO| '.$_SESSION['fullname'];
        $mail->Body='
            
            <center><img style=\'width:200px;\' src=\'https://hotfollow.com.br/img/logo-hf.png\'></center><br>
            <center>
                <h1>FOI CADASTRADO UM NOVO USUÁRIO!! 😍</h1>
                <h3>Através de um link de compartilhamento</h3>
                <h2>Informações do usuário: </h2>
            </center>
            <h3>Nome:</h3> <i>'.$_SESSION['fullname'].'</i> <br>
            <h3>Usuário:</h3> <i>'.$_SESSION['username'].'</i> <br>
            <h3>Biografia:</h3> <i>'.$_SESSION['bio'].'</i> <br>
            <h3>ID do Instagram do usuário:</h3> <i>'.$_SESSION['user_id'].'</i> <br><br><br><br>
            <h4>Atenciosamente,<br>
            Equipe HotFollow. ✌</h4>
        ';
        $mail->AltBody = 'NOVO USUÁRIO CADASTRADO!!  Informações:      Nome: '.$_SESSION['fullname'].'Usuário: '.$_SESSION['username'].'Biografia: '.$_SESSION['bio'].'ID do Instagram do usuário: '.$_SESSION['user_id'];
        $mail->CharSet='utf-8';
        if($mail->send()){
            unset($_SESSION['sendEmailToAdmin']);
        }
    }

?>
