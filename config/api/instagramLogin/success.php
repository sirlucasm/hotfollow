<?php
    
    if (!isset($_SESSION)){
        session_start();
    }
    // exibe o erro
    ini_set("display_errors", 1);

    require_once __DIR__.'/../../php/conexaoBancoDados.php';
    require_once __DIR__.'/../Instagram.php';

    

    use MetzWeb\Instagram\Instagram;

    // check whether an error occurred
    if (isset($_GET['error'])) {
        echo "<script> swal({
                    title: 'OPS!!...',
                    text: 'Você deve aceitar para logar em sua conta :)',
                    icon: 'error',
                    button: 'Entendido',
                }); 
            </script>";
        echo "<script> location.replace('/../../../index.php'); </script>";
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
            $_SESSION['posts'] = $data->counts->media;
            $_SESSION['follow'] = $data->counts->follows;
            $_SESSION['followers'] = $data->counts->followed_by;
            $_SESSION['username'] = $data->user->username;
            $_SESSION['fullname'] = $data->user->full_name;
            $_SESSION['bio'] = $data->user->bio;

            setcookie('userID', $user_id, time()+86400);
            $id_user = $_COOKIE['userID'];

            echo "<pre>";
            var_dump($result);


            // TESTES
            if($_SESSION['logado']==1){
                echo "<br><br>Usuário logado. :)";
            }else echo "<br><br>Usuário offline. :(";
            
            echo "<br>o ID do usuário é: ".$id_user;
            echo "<br><br><br>Voce tem ".$posts." postagens";
            echo "<br><br><br>Nome de usuario: ".$_SESSION['username'];

            
            $_SESSION['user_points'] = 0;
            $user_points = $_SESSION['user_points'];
            $erro;
            // Verify user details in USERS table
            $resultUserInfo = "SELECT user_id FROM users_info WHERE user_id='$user_id'";
            $resultUserImg = "SELECT user_id FROM users_img WHERE user_id='$user_id'";
            $resultUserPoints = "SELECT user_id FROM users_hotpoints WHERE user_id='$user_id'";
            
            $validacao_final1 = mysqli_query($conexao, $resultUserInfo);
            $validacao_final2 = mysqli_query($conexao, $resultUserImg);
            $validacao_final3 = mysqli_query($conexao, $resultUserPoints);

            //updates on BD
            $verificaFotoDePerfilAtual = "SELECT profile_pic FROM users_img WHERE user_id='$user_id'";
            $verificaUserIDAtual = "SELECT user_id FROM users_info WHERE username='$username'";
            $verificaUsuarioAtual = "SELECT username FROM users_info WHERE user_id='$user_id'";
            $verificaNomeAtual = "SELECT fullname FROM users_info WHERE user_id='$user_id'";
            $verificaBioAtual = "SELECT bio FROM users_info WHERE user_id='$user_id'";
            
            $validaFotoAtual = mysqli_query($conexao, $verificaFotoDePerfilAtual);
            $validaUserIDAtual = mysqli_query($conexao, $verificaUserIDAtual);
            $validaUsuarioAtual = mysqli_query($conexao, $verificaUsuarioAtual);
            $validaNomeAtual = mysqli_query($conexao, $verificaNomeAtual);
            $validaBioAtual = mysqli_query($conexao, $verificaBioAtual);

            if(($validacao_final1) AND ($validacao_final1->num_rows != 0)){
                $erro = true;
            }
            if(($validacao_final2) AND ($validacao_final2->num_rows != 0)){
                $erro = true;
            }
            if(($validacao_final3) AND ($validacao_final3->num_rows != 0)){
                $erro = true;
            }
            if(!$erro){
                // Inserting values into USERS table
                $sql1 = "INSERT INTO users_info(user_id, username, fullname, bio, access_token) VALUES ('$user_id','$username','$fullname','$bio','$token')";
                $sql2 = "INSERT INTO users_img(user_id, username, profile_pic) VALUES ('$user_id','$username','$profile_pic')";
                $sql3 = "INSERT INTO users_hotpoints(user_id, username, user_points) VALUES ('$user_id','$username','$user_points')";
                $showInfo = mysqli_query($conexao,$sql1);
                $showImg = mysqli_query($conexao,$sql2);
                $showPoints = mysqli_query($conexao,$sql3);
                $conexao->close();
            }
            
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
            
            if( $validaNomeAtual != $_SESSION['fullname'] ){
                $atualizarBio = "UPDATE users_info SET bio WHERE user_id='$user_id'";
                $mudarBio = mysqli_query($conexao, $atualizarBio);
            }



            // @@@@@##### OBTER INFORMAÇÕES DO BANCO DE DADOS
            /*    
            $query1 = "SELECT * FROM users_img WHERE user_id='$id_user'";
            $dados1 = mysqli_query($conexao, $query1);

            if ($user_img = mysqli_fetch_assoc($dados1)) {
                $profilePic = $user_img['profile_pic'];
            }

            $query2 = "SELECT * FROM users_info WHERE user_id='$id_user'";
            $dados2 = mysqli_query($conexao, $query1);

            if ($user_info = mysqli_fetch_assoc($dados2)) {
                $userName = $user_info['username'];
                $fullName = $user_info['fullname'];
                $userID = $user_info['user_id'];
            }
            */
            
            
            echo "<script> location.replace('/../../../inicio.php'); </script>";
            
        
    }
    
    
?>