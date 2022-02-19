<?php
    session_start();
    require "conexao.php";

    $conexao = new Conexao();

    
    if(empty($_POST['tusuario']) || empty($_POST['tsenha'])){
        header('Location: ../index.php');
        exit();
    }

    $usuario = filter_input(INPUT_POST, 'tusuario', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha   = filter_input(INPUT_POST, 'tsenha', FILTER_SANITIZE_SPECIAL_CHARS);

    $query = "SELECT * FROM usuarios WHERE Usuario = :usuario AND senha = :senha";
    $stmt  = $conexao->conectar()->prepare($query);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();
    $dados = $stmt->fetch();

    if($dados == 1){
        $_SESSION['usuario'] = $usuario;
        header('Location: ../principal.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../index.php?acessar=1');
        exit();
    }

    /*
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
*/
?>