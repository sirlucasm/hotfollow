<?php

    require_once __DIR__.'/success.php';

    if( $_GET['sharelink'] ){
        $_SESSION['sharedCount']++;
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
                <h3>Através do link de compartilhamento do usuário '.$_GET['sharelink'].'</h3>
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

        $_SESSION['congratulations'] = true;


    }

?>