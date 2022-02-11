<?php
    session_start();
    include_once 'conexao.php';

    if(empty($_POST['tusuario']) || empty($_POST['tsenha'])){
        header('Location: ../index.php');
        exit();
    }

    $usuario = filter_input(INPUT_POST, 'tusuario', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha   = filter_input(INPUT_POST, 'tsenha', FILTER_SANITIZE_SPECIAL_CHARS);


    $querySelect = $link->query("select * from usuarios where Usuario= '{$usuario}' and senha = '{$senha}'");
    $affected_rows = mysqli_affected_rows($link);

    $row = mysqli_num_rows($querySelect);

    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        header('Location: ../principal.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../index.php');
        exit();
    }

?>