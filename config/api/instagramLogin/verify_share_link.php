<?php

    require_once __DIR__.'/../../php/sending-email.php';
    // require_once __DIR__.'/../../php/conexaoBancoDados.php';

    function shareLinkConfigs(mysqli $conexao){
        
        //verificação para saber se o novo usuário existe
        
        $idUsuarioIndicado = $_SESSION['user_id'];
        if($_SESSION['shareId'] != $idUsuarioIndicado){
            $resultUserShared = "SELECT sharedToID FROM users_shared WHERE sharedToID='{$_SESSION['user_id']}'"; 
            $validacao_final3 = mysqli_query($conexao, $resultUserShared);
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
                $sql3 = "INSERT INTO users_shared(user_id, sharedCount, sharedToID) VALUES ('{$_SESSION['shareId']}','{$_SESSION['sharedCount']}', '{$_SESSION['user_id']}')";
                $insertShared = mysqli_query($conexao,$sql3);
                updateHotPoints($conexao,10);
                updateHotPointsUsuarioIndicado($conexao,10);
                updateSharedCount($conexao,1);

                newUserToAdminEmailWithShareLink();
                $_SESSION['congratulations'] = true;
                
            }
        }else{
            $_SESSION['ownShareLinkAccess'] = true;
        }
    }


?>