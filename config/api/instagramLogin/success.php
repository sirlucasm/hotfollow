<?php

    // exibe o erro
    ini_set("display_errors", 1);

    require_once __DIR__.'/../../php/conexaoBancoDados.php';
    require_once __DIR__.'/../Instagram.php';

    

    //use MetzWeb\Instagram\Instagram;


    // check whether the user has granted access
    if (isset($_GET['code'])) {
        
            // Storing instagram user data into session
            session_start();
            $_SESSION['logado'] = true;

            $data = $instagram->getOAuthToken($_GET['code']);
            $instagram->setSignedHeader(true); //security
            // store user access token
            $instagram->setAccessToken($data);
            // now you have access to all authenticated user methods
            $result = $instagram->getUser();

            
            
            $profile_pic=$data->user->profile_picture;
            $user_id=$data->user->id;
            $posts = $data->counts->media;
            $follow = $data->counts->follows;
            $followers = $data->counts->followed_by; 
            $username=$data->user->username;
            $fullname=$data->user->full_name;
            $bio=$data->user->bio;
            $website=$data->user->website;
            $token=$data->access_token;
            
            if(isset($_SESSION['logado'])){
                setcookie('userID', $user_id, time()+86400);
            }
            //echo "<pre>";
            //var_dump($result);


            // TESTES
            if($_SESSION['logado']==1){
                echo "<br><br>Usuário logado. :)";
            }else echo "<br><br>Usuário offline. :(";
                
            echo "<br>o ID do usuário é: ".$_COOKIE['userID'];
            echo "<br><br><br>Voce tem ".$followers." seguidores";
            echo "<br><br><br>Nome de usuario: ".$username;

            
            $_SESSION['user_points'] = 0;
            $user_points = $_SESSION['user_points'];
            $erro;
            // Verify user details in USERS table
            $resultUserInfo = "SELECT user_id FROM users_info WHERE user_id='$user_id'";
            $resultUserImg = "SELECT user_id FROM users_img WHERE user_id='$user_id'";
            $resultUserPoints = "SELECT user_id FROM users_hotpoints WHERE user_id='$user_id'";
            $verificaFotoDePerfilAtual = "SELECT profile_pic FROM users_img WHERE user_id='$user_id'";

            $validacao_final1 = mysqli_query($conexao, $resultUserInfo);
            $validacao_final2 = mysqli_query($conexao, $resultUserImg);
            $validacao_final3 = mysqli_query($conexao, $resultUserPoints);
            $validaFotoAtual = mysqli_query($conexao, $verificaFotoDePerfilAtual);

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

            // CREATING SESSIONS WITH USER INFO
                
            $query1 = "SELECT * FROM users_img WHERE user_id='{$_COOKIE['userID']}'";
            $dados1 = mysqli_query($conexao, $query1);

            if ($user_img = mysqli_fetch_assoc($dados1)) {
                $profilePic = $user_img['profile_pic'];
            }

            $query2 = "SELECT * FROM users_info WHERE user_id='{$_COOKIE['userID']}'";
            $dados2 = mysqli_query($conexao, $query1);

            if ($user_info = mysqli_fetch_assoc($dados2)) {
                $userName = $user_info['username'];
                $fullName = $user_info['fullname'];
                $userID = $user_info['user_id'];
            }
            



            // Fica atualizando a foto de perfil caso o usuário mude no Instagram
            if( $validaFotoAtual != $profile_pic ) {
                $atualizarFoto = "UPDATE users_img SET profile_pic WHERE user_id='$user_id'";
                $mudarAFoto = mysqli_query($conexao, $atualizarFoto);
            }
            
            
            echo "<script> location.replace('/../../../inicio.php'); </script>";
            
        
    }
    
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
?>