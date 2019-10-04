<?php

    require_once __DIR__.'/../api/instagramLogin/success.php';   
    
    

    function updatesBD(mysqli $conexao){
        $verificaIDAtual1 = "SELECT user_id FROM users_info WHERE user_id='{$_SESSION['user_id']}'";
        $verificaIDAtual2 = "SELECT user_id FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $verificaUsuarioAtual = "SELECT username FROM users_info WHERE user_id='{$_SESSION['user_id']}'";
        $verificaNomeAtual = "SELECT fullname FROM users_info WHERE user_id='{$_SESSION['user_id']}'";
        // $verificaPontosAtuais = "SELECT user_points FROM users_hotpoints WHERE user_id='{$_SESSION['user_id']}'";
        $validaIDAtual1 = mysqli_query($conexao, $verificaIDAtual1);
        $validaIDAtual2 = mysqli_query($conexao, $verificaIDAtual2);
        $validaUsuarioAtual = mysqli_query($conexao, $verificaUsuarioAtual);
        $validaNomeAtual = mysqli_query($conexao, $verificaNomeAtual);
        // $validaPontosAtuais = mysqli_query($conexao, $verificaPontosAtuais);
        

        if( $validaIDAtual1 != $_SESSION['user_id'] || $validaIDAtual2 != $_SESSION['user_id'] ){
            $atualizarID1 = "UPDATE users_info SET user_id='{$_SESSION['user_id']}' WHERE username='{$_SESSION['username']}'";
            $atualizarID2 = "UPDATE users_hotpoints SET user_id='{$_SESSION['user_id']}' WHERE username='{$_SESSION['username']}'";
            $mudarID1 = mysqli_query($conexao, $atualizarID1);
            $mudarID2 = mysqli_query($conexao, $atualizarID2);
        }
        if( $validaUsuarioAtual != $_SESSION['username'] ){
            $atualizarUsername = "UPDATE users_info SET username='{$_SESSION['username']}' WHERE user_id='{$_SESSION['user_id']}'";
            $mudarUsername = mysqli_query($conexao, $atualizarUsername);
            
        }
        if( $validaNomeAtual != $_SESSION['fullname'] ){
            $atualizarFullname = "UPDATE users_info SET fullname='{$_SESSION['fullname']}' WHERE user_id='{$_SESSION['user_id']}'";
            $mudarFullname = mysqli_query($conexao, $atualizarFullname);
            
        }
        // if( $validaPontosAtuais != $_SESSION['user_points'] ){
        //     $atualizarPontos = "UPDATE users_hotpoints SET user_points='{$_SESSION['user_points']}' WHERE user_id='{$_SESSION['user_id']}'";
        //     $mudarPontos = mysqli_query($conexao, $atualizarPontos); 
        // }

    }

?>