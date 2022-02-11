<?php
    session_start();
    include_once 'conexao.php';
    $id = $_SESSION['id'];
    $_SESSION['id'] = $id;

    $descricao = filter_input(INPUT_POST, 'tdescicao', FILTER_SANITIZE_SPECIAL_CHARS);
    $valor     = filter_input(INPUT_POST, 'tvalor', FILTER_VALIDATE_FLOAT);
    
    $imagem    = $_FILES['user_avatar']['tmp_name'];

    $queryUpdate = $link->query("update acompanhamento set Descricao='$descricao',  Valor=' $valor', Imagem='$imagem' where IdCodigo='$id'");
    $affected_rows = mysqli_affected_rows($link);

    if($affected_rows > 0):
        header("Location:../acompanhamento.php");
    endif;
?>