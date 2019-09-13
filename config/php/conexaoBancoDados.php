<?php 
    $host = "hotfollow.com.br";
    $user = "firedevt_hotfoll";
    $pass = "vida280119";
    $db = "firedevt_hotfollow";

    $conexao = mysqli_connect($host, $user, $pass, $db);
    if (!$conexao) {
        printf("Erro de conexão: %s\n", mysqli_connect_error());
        exit();
    }
?>