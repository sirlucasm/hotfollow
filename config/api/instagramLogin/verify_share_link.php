<?php

    require_once __DIR__.'/../../php/sending-email.php';
    // require_once __DIR__.'/../../php/conexaoBancoDados.php';

    function shareLinkConfigs($conexao){
        
        //verificação para saber se o novo usuário existe
        $resultUserShared = "SELECT user_id FROM users_shared WHERE user_id='{$_SESSION['user_id']}'"; 
        $validacao_final2 = mysqli_query($conexao, $resultUserShared);

        if( mysqli_num_rows($validacao_final2)>0 ){
            $jaTemConta = 1;
            echo "<script> alert('ja registrado no shared link'); </script>";
        }else{
            // Inserting values into 'USERS_SHARED' table
            $sql2 = "INSERT INTO users_shared(user_id, sharedCount, sharedToID) VALUES ('{$_SESSION['shareId']}','{$_SESSION['sharedCount']}, '{$_SESSION['user_id']}')";
            $insertShared = mysqli_query($conexao,$sql2);
            
            newUserToAdminEmailWithShareLink();
            
            
            $idUsuarioIndicado = $_SESSION['user_id'];
            if($_SESSION['shareId'] != $idUsuarioIndicado){
                $_SESSION['congratulations'] = true;
                //update points do indicador e do indicado
                $atualizarPontos = "UPDATE users_hotpoints SET user_points='{$_SESSION['user_points']}'+10 WHERE user_id='{$_SESSION['shareId']}' AND user_id='{$_SESSION['user_id']}'";
                $mudarPontos = mysqli_query($conexao, $atualizarPontos);

                //increment share count do indicador
                $atualizarSharedCount = "UPDATE users_shared SET sharedCount='{$_SESSION['sharedCount']}'+1 WHERE user_id='{$_SESSION['shareId']}'";
                $mudarSharedCount = mysqli_query($conexao, $atualizarSharedCount);
            }

        }
    }


?>