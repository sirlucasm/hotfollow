<?php
    
    if (!isset($_SESSION)){
        session_start();
    }
    // exibe o erro
    ini_set("display_errors", 1);

    require_once __DIR__.'/../../php/conexaoBancoDados.php';
    require_once __DIR__.'/../Instagram.php';
    require_once __DIR__.'/verify_share_link.php';
    require_once __DIR__.'/../../php/sending-email.php';
    require_once __DIR__.'/../../php/updates-on-bd.php';
    

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
            $user_id = $result->data->id;
            $posts = $result->data->counts->media;
            $follow = $result->data->counts->follows;
            $followers = $result->data->counts->followed_by;
            $username = $data->user->username;
            $fullname = $data->user->full_name;
            $bio = $data->user->bio;
            $website = $data->user->website;
            $token = $data->access_token;
            
            $_SESSION['user_id'] = $result->data->id;
            $_SESSION['profile_pic'] = $data->user->profile_picture;
            $_SESSION['posts'] = $result->data->counts->media;
            $_SESSION['follow'] = $result->data->counts->follows;
            $_SESSION['followers'] = $result->data->counts->followed_by;
            $_SESSION['username'] = $data->user->username;
            $_SESSION['fullname'] = $data->user->full_name;
            $_SESSION['bio'] = $data->user->bio;
            $_SESSION['access_token'] = $data->access_token;
            
            // GENERATOR de link de compartilhamento apenas se o usuario existir
            $_SESSION['shareLink'] = "https://hotfollow.com.br/?sharelink=".$_SESSION['user_id'];
            $sharedCount = 1;
            $_SESSION['sharedCount'] = $sharedCount;

            $user_points = 0;
            $_SESSION['user_points'] = $user_points;
            

            // Verify user details in USERS table
            $resultUserInfo = "SELECT user_id FROM users_info WHERE user_id='{$_SESSION['user_id']}'";       
            $resultUserPoints = "SELECT user_id FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
            
            $validacao_final1 = mysqli_query($conexao, $resultUserInfo);
            $validacao_final2 = mysqli_query($conexao, $resultUserPoints);


            if( mysqli_num_rows($validacao_final1)>0 && mysqli_num_rows($validacao_final2)>0){
                $_SESSION['alreadySigned'] = true;

                //UPDATES ON BD
                updateID($conexao);
                updateUsuario($conexao);
                updateNome($conexao);
            }else{
                $_SESSION['firstWelcome'] = true;
                $_SESSION['sendEmailToAdmin'] = true;

                // Inserting values into 'USERS_INFO' table
                $sql1 = "INSERT INTO users_info(user_id, username, fullname, profile_pic, followers, follows, post, access_token) VALUES ('{$_SESSION['user_id']}','$username','$fullname','$profile_pic','$followers','$follow','$posts','$token')";
                $insertInfo = mysqli_query($conexao,$sql1);
                // Inserting values into 'USERS_HOTPOINTS' table
                $sql2 = "INSERT INTO users_hotpoints(user_id, username, user_points) VALUES ('{$_SESSION['user_id']}','$username','$user_points')";
                $insertPoints = mysqli_query($conexao,$sql2);
                // // Inserting values into 'USERS_SHARED' table
                // $sql3 = "INSERT INTO users_shared(user_id, sharedCount, sharedToID) VALUES ('{$_SESSION['user_id']}','{$_SESSION['sharedCount']}', '{$_SESSION['shareId']}')";
                // $insertShared = mysqli_query($conexao,$sql3);
                if(!isset($_SESSION['estaUsandoShareLink'])){
                    newUserToAdminEmail();
                }
            }
            
            if(isset($_SESSION['estaUsandoShareLink'])){
                shareLinkConfigs($conexao);
            }
            
            
            echo "<script> location.replace('/../../../inicio.php'); </script>";
            
        
    }
    //verificar se o usuario esta usando algum link de compartilhamento
    if( isset($_GET['sharelink']) ){
        $_SESSION['shareId'] = $_GET['sharelink'];
        $_SESSION['estaUsandoShareLink'] = true;
    }


?>