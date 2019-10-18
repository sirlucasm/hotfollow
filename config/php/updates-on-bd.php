<?php

    require_once __DIR__.'/../api/instagramLogin/success.php';   
    

    function updateID(mysqli $conexao){
        $verificaIDAtual1 = "SELECT user_id FROM users_info WHERE user_id='{$_SESSION['user_id']}'";
        $verificaIDAtual2 = "SELECT user_id FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $validaIDAtual1 = mysqli_query($conexao, $verificaIDAtual1);
        $validaIDAtual2 = mysqli_query($conexao, $verificaIDAtual2);
        if( $validaIDAtual1 != $_SESSION['user_id'] || $validaIDAtual2 != $_SESSION['user_id'] ){
            $atualizarID1 = "UPDATE users_info SET user_id='{$_SESSION['user_id']}' WHERE username='{$_SESSION['username']}'";
            $atualizarID2 = "UPDATE users_hotpoints SET user_id='{$_SESSION['user_id']}' WHERE username='{$_SESSION['username']}'";
            $mudarID1 = mysqli_query($conexao, $atualizarID1);
            $mudarID2 = mysqli_query($conexao, $atualizarID2);
        }
    }


    function updateUsuario(mysqli $conexao){
        $verificaUsuarioAtual = "SELECT username FROM users_info WHERE user_id='{$_SESSION['user_id']}'";
        $validaUsuarioAtual = mysqli_query($conexao, $verificaUsuarioAtual);
        if( $validaUsuarioAtual != $_SESSION['username'] ){
            $atualizarUsername = "UPDATE users_info SET username='{$_SESSION['username']}' WHERE user_id='{$_SESSION['user_id']}'";
            $mudarUsername = mysqli_query($conexao, $atualizarUsername);
        }
    }

    function updateNome(mysqli $conexao){
        $verificaNomeAtual = "SELECT fullname FROM users_info WHERE user_id='{$_SESSION['user_id']}'";
        $validaNomeAtual = mysqli_query($conexao, $verificaNomeAtual);
        if( $validaNomeAtual != $_SESSION['fullname'] ){
            $atualizarFullname = "UPDATE users_info SET fullname='{$_SESSION['fullname']}' WHERE user_id='{$_SESSION['user_id']}'";
            $mudarFullname = mysqli_query($conexao, $atualizarFullname);
        }
    }

    function updateHotPoints(mysqli $conexao, $adicionarPontos){
        $verificaPontosAtuais = "SELECT user_points FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $validaPontosAtuais = mysqli_query($conexao, $verificaPontosAtuais);
        // @@@@@##### OBTER INFORMAÇÕES DO BANCO DE DADOS
        $queryPoints = "SELECT * FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $dados1 = mysqli_query($conexao, $queryPoints);
        $users_hotpoints = $dados1->fetch_array();
        if( $validaPontosAtuais >= $_SESSION['user_points'] ){
            $atualizarPontos = "UPDATE users_hotpoints SET user_points='{$users_hotpoints['user_points']}'+$adicionarPontos WHERE user_id='{$_SESSION['user_id']}'";
            $mudarPontos = mysqli_query($conexao, $atualizarPontos); 
        }
        
    }

    function updateHotPointsUsuarioIndicado(mysqli $conexao, $adicionarPontos){
        $verificaPontosAtuais = "SELECT user_points FROM users_hotpoints WHERE user_id='{$_SESSION['shareId']}'";
        $validaPontosAtuais = mysqli_query($conexao, $verificaPontosAtuais);
        // @@@@@##### OBTER INFORMAÇÕES DO BANCO DE DADOS
        $queryPoints = "SELECT * FROM users_hotpoints WHERE user_id='{$_SESSION['shareId']}'";
        $dados1 = mysqli_query($conexao, $queryPoints);
        $users_hotpoints = $dados1->fetch_array();
        if( $validaPontosAtuais >= $_SESSION['user_points'] ){
            $atualizarPontos = "UPDATE users_hotpoints SET user_points='{$users_hotpoints['user_points']}'+$adicionarPontos WHERE user_id='{$_SESSION['shareId']}'";
            $mudarPontos = mysqli_query($conexao, $atualizarPontos); 
        }
        
    }




















    
    // function updateSharedCount(mysqli $conexao, $adicionarShares){
    //     $verificaSharesAtuais = "SELECT sharedCount FROM users_shared WHERE user_id='{$_SESSION['shareId']}'";
    //     $validaSharesAtuais = mysqli_query($conexao, $verificaSharesAtuais);
    //     // @@@@@##### OBTER INFORMAÇÕES DO BANCO DE DADOS
    //     $querySharedCount = "SELECT * FROM users_shared WHERE user_id='{$_SESSION['shareId']}'";
    //     $dados2 = mysqli_query($conexao, $querySharedCount);
    //     $users_shared = $dados2->fetch_array();
    //     if( $validaSharesAtuais != $_SESSION['sharedCount'] ){
    //         //pegar numero de counts
    //         $counts = "SELECT COUNT(sharedCount) AS count FROM users_shared WHERE user_id='{$_SESSION['user_id']}'";
    //         $shareCount = mysqli_query($conexao, $counts);
    //         $showCounts = $shareCount->fetch_array();
    //         //share count to bd insert
    //         $newSharedCount = $showCounts[count] + $adicionarShares;
            
    //         //insert share count do indicador
    //         $sql3 = "INSERT INTO users_shared(user_id, sharedCount, sharedToID) VALUES ('{$_SESSION['shareId']}','$newSharedCount', '{$_SESSION['user_id']}')";
    //         $insertShared = mysqli_query($conexao,$sql3);
    //     }
    // }



// TRUNCATE users_shared; TRUNCATE users_hotpoints; TRUNCATE users_info;







?>