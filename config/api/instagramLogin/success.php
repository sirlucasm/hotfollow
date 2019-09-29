<?php
    
    if (!isset($_SESSION)){
        session_start();
    }
    // exibe o erro
    ini_set("display_errors", 1);

    require_once __DIR__.'/../../php/conexaoBancoDados.php';
    require_once __DIR__.'/../Instagram.php';
    require_once __DIR__.'/../../php/phpmailer/PHPMailerAutoload.php';

    

    use MetzWeb\Instagram\Instagram;

    // check whether an error occurred
    if (isset($_GET['error'])) {
        
        echo "<script> location.replace('/../../../index.php'); </script>";
        echo "<script> swal({
                    title: 'OPS!!...',
                    text: 'Você deve aceitar para logar em sua conta :)',
                    icon: 'error',
                    button: 'Entendido',
                }); 
            </script>";
    }

    
    // check whether the user has granted access
    if (isset($_GET['code'])) {
        
            $_SESSION['logado'] = true;
            // Storing instagram user data into session
            $data = $instagram->getOAuthToken($_GET['code']);
            $instagram->setSignedHeader(true); //security
            // store user access token
            $instagram->setAccessToken($data);
            // now you have access to all authenticated user methods
            $result = $instagram->getUser();

            //echo "<pre>";
            //var_dump($result);
            
            $profile_pic = $data->user->profile_picture;
            $user_id = $data->user->id;
            $posts = $data->counts->media;
            $follow = $data->counts->follows;
            $followers = $data->counts->followed_by; 
            $username = $data->user->username;
            $fullname = $data->user->full_name;
            $bio = $data->user->bio;
            $website = $data->user->website;
            $token = $data->access_token;
            
            $_SESSION['user_id'] = $data->user->id;
            $_SESSION['profile_pic'] = $data->user->profile_picture;
            $_SESSION['posts'] = $result->data->counts->media;
            $_SESSION['follow'] = $result->data->counts->follows;
            $_SESSION['followers'] = $result->data->counts->followed_by;
            $_SESSION['username'] = $data->user->username;
            $_SESSION['fullname'] = $data->user->full_name;
            $_SESSION['bio'] = $data->user->bio;
            $_SESSION['access_token'] = $data->access_token;
            
            // GENERATOR de link de compartilhamento
            $_SESSION['shareLink'] = "https://hotfollow.com.br/?sharelink=".$_SESSION['username'];
            $_SESSION['sharedCount'] = 0;

            $_SESSION['user_points'] = 0;
            $user_points = $_SESSION['user_points'];
            

            // Verify user details in USERS table
            $resultUserInfo = "SELECT user_id FROM users_info WHERE user_id='$user_id'";
            $resultUserImg = "SELECT user_id FROM users_img WHERE user_id='$user_id'";
            $resultUserPoints = "SELECT user_id FROM users_hotpoints WHERE user_id='$user_id'";
            
            $validacao_final1 = mysqli_query($conexao, $resultUserInfo);
            $validacao_final2 = mysqli_query($conexao, $resultUserImg);
            $validacao_final3 = mysqli_query($conexao, $resultUserPoints);


            if( mysqli_num_rows($validacao_final1)>0 && mysqli_num_rows($validacao_final2)>0 && mysqli_num_rows($validacao_final3)>0){
                $_SESSION['alreadySigned'] = true;
            }else{
                require_once __DIR__.'/verify_share_link.php';
                $_SESSION['firstWelcome'] = true;
                $_SESSION['sendEmailToAdmin'] = true;

                // Inserting values into 'USERS_INFO' table
                $sql1 = "INSERT INTO users_info(user_id, username, fullname, bio, access_token) VALUES ('$user_id','$username','$fullname','$bio','$token')";
                $showInfo = mysqli_query($conexao,$sql1);
                // Inserting values into 'USERS_IMG' table
                $sql2 = "INSERT INTO users_img(user_id, username, profile_pic) VALUES ('$user_id','$username','$profile_pic')";
                $showImg = mysqli_query($conexao,$sql2);
                // Inserting values into 'USERS_HOTPOINTS' table
                $sql3 = "INSERT INTO users_hotpoints(user_id, username, user_points) VALUES ('$user_id','$username','$user_points')";
                $showPoints = mysqli_query($conexao,$sql3);

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
        

            
            //updates on BD
            $verificaFotoDePerfilAtual = "SELECT profile_pic FROM users_img WHERE user_id='$user_id'";
            $verificaUserIDAtual = "SELECT user_id FROM users_info WHERE username='$username'";
            $verificaUsuarioAtual = "SELECT username FROM users_info WHERE user_id='$user_id'";
            $verificaNomeAtual = "SELECT fullname FROM users_info WHERE user_id='$user_id'";
            $verificaBioAtual = "SELECT bio FROM users_info WHERE user_id='$user_id'";
            $verificaPontosAtuais = "SELECT user_points FROM users_hotpoints WHERE user_id='$user_id'";

            $validaFotoAtual = mysqli_query($conexao, $verificaFotoDePerfilAtual);
            $validaUserIDAtual = mysqli_query($conexao, $verificaUserIDAtual);
            $validaUsuarioAtual = mysqli_query($conexao, $verificaUsuarioAtual);
            $validaNomeAtual = mysqli_query($conexao, $verificaNomeAtual);
            $validaBioAtual = mysqli_query($conexao, $verificaBioAtual);
            $validaPontosAtuais = mysqli_query($conexao, $verificaPontosAtuais);

            // Fica atualizando as informações do perfil caso o usuário mude no Instagram
            if( $validaFotoAtual != $_SESSION['profile_pic'] ){
                $atualizarFoto = "UPDATE users_img SET profile_pic WHERE user_id='$user_id'";
                $mudarAFoto = mysqli_query($conexao, $atualizarFoto);
            }

            if( $validaUserIDAtual != $_SESSION['user_id'] ){
                $atualizarUserID = "UPDATE users_info SET user_id WHERE username='$username'";
                $mudarUserID = mysqli_query($conexao, $atualizarUserID);
            }

            if( $validaUsuarioAtual != $_SESSION['username'] ){
                $atualizarUsername = "UPDATE users_info SET username WHERE user_id='$user_id'";
                $mudarUsername = mysqli_query($conexao, $atualizarUsername);
            }

            if( $validaNomeAtual != $_SESSION['fullname'] ){
                $atualizarFullname = "UPDATE users_info SET fullname WHERE user_id='$user_id'";
                $mudarFullname = mysqli_query($conexao, $atualizarFullname);
            }
            
            if( $validaNomeAtual != $_SESSION['bio'] ){
                $atualizarBio = "UPDATE users_info SET bio WHERE user_id='$user_id'";
                $mudarBio = mysqli_query($conexao, $atualizarBio);
            }
            
            if( $validaPontosAtuais != $_SESSION['user_points'] ){
                $atualizarPontos = "UPDATE users_hotpoints SET user_points WHERE user_id='$user_id'";
                $mudarPontos = mysqli_query($conexao, $atualizarPontos);
            }

            


            
            
           echo "<script> location.replace('/../../../inicio.php'); </script>";
            
        
        }


?>