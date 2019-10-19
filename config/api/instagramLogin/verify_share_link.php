<?php

    require_once __DIR__.'/../../php/sending-email.php';
    // require_once __DIR__.'/../../php/conexaoBancoDados.php';

    function shareLinkConfigs(mysqli $conexao){
        
        //verificação para saber se o novo usuário existe
        
        $idUsuarioIndicado = $_SESSION['user_id'];
        if($_SESSION['shareId'] != $idUsuarioIndicado){
            $validacao_final3 = mysqli_query($conexao, "SELECT sharedToID FROM users_shared WHERE sharedToID='{$_SESSION['user_id']}'");
            if( mysqli_num_rows($validacao_final3)>0 ){
                echo "<script> 
                        Swal.fire({
                            position: 'top',
                            type: 'error',
                            title: 'Você não pode mais usar links de compartilhamento!!',
                            showConfirmButton: false,
                            timer: 2500
                        });
                </script>";
            }else{
                // Inserting values into 'USERS_SHARED' table
                $insertShared = mysqli_query($conexao,"INSERT INTO users_shared(user_id, sharedToID) VALUES ('{$_SESSION['shareId']}', '{$_SESSION['user_id']}')");
                updateHotPoints($conexao,10);
                updateHotPointsUsuarioIndicado($conexao,10);

                newUserToAdminEmailWithShareLink();
                $_SESSION['congratulations'] = true;
                
            }
        }else{
            $_SESSION['ownShareLinkAccess'] = true;
        }
    }


?>