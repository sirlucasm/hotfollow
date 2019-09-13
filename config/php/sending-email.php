<?php
session_start();

require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$exibirMsgHTML ="$mensagem";
$exibirMsgALT ="Nome: ".$nome."Email: ".$email."Assunto: ".$assunto."Mensagem: ".$mensagem."";

$mail = new PHPMailer(true);
try {
    
        

     //Server settings  
    $mail->SMTPDebug = 3;             
    $mail->isSMTP();                               
    $mail->Host = 'mail.hotfollow.com.br';  
    $mail->SMTPAuth = true;             
    $mail->Username = 'contato@hotfollow.com.br';
    $mail->Password = 'vida280119';
    $mail->Priority = 1;     
    $mail->SMTPSecure = 'ssl';               
    $mail->Port = 465;                                 
    $mail->setLanguage("br");
    
    //Recipients
    $mail->setFrom('contato@hotfollow.com.br', 'Equipe HotFollow');
    $mail->addAddress('contatohotfollow@gmail.com', 'HotFollow');  
    
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = "| CONTATO HOTFOLLOW | $assunto";
    $mail->Body = "
        <center><img src=\"https://hotfollow.com.br/img/logo-hf.png\"></center><br>
        <center>Nome do usuário: $nome <br>
        Email do usuário: $email <br>
        Assunto do usuário: $assunto <br>
        Mensagem do usuário: $exibirMsgHTML <br><br><br><br>
        Atenciosamente,<br>
        Equipe HotFollow.</center>
        ";
    $mail->AltBody = "$exibirMsgALT";
    $mail->CharSet="utf-8";


    if ($mail->send()) {
        $_SESSION['contatoEnviado']=true;
        //echo ("<script> location.replace('../../contact-us.php'); </script>");
    } else {
        $_SESSION['contatoError']=true;
        //echo ("<script> location.replace('../../contact-us.php'); </script>");
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
