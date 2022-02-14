<?php
    session_start();
    include_once 'conexao.php';
    $id = $_SESSION['id'];
    $_SESSION['id'] = $id;

    $descricao = filter_input(INPUT_POST, 'tdescicao', FILTER_SANITIZE_SPECIAL_CHARS);
    $valor     = filter_input(INPUT_POST, 'tvalor', FILTER_VALIDATE_FLOAT);   
    $imagem    = $_FILES['user_avatar']['tmp_name'];

     //  VERIFICA SE FOI PASSADO UMA FOTO
    if (empty($_FILES['user_avatar']['name'])) {
        $queryUpdate = $link->query("update acompanhamento set Descricao='$descricao',  Valor=' $valor' where IdCodigo='$id'");
        $affected_rows = mysqli_affected_rows($link);
    }else{
        if(!empty($descricao))
        {
                //  PEGANDO O NOME DA FOTO  SALVANDO NA PASTA
                
            if($_FILES['user_avatar']['type'] == 'image/png'){
                $nome_arquivo = md5($_FILES['user_avatar']['name'].rand(1,999)).'.png';
                $imagem_tempo = imagecreatefrompng($_FILES['user_avatar']['tmp_name']);
                
                $largura_orig = imagesx($imagem_tempo);
                $altura_orig  = imagesy($imagem_tempo);

                $nova_largura = $largura ? $largura : floor(($largura_orig / $altura_orig) * $altura);
                $nova_autura  = $altura  ? $altura  : floor(($altura_orig / $largura_orig) * $largura);
                $imagem_redim = imagecreatetruecolor( $nova_largura, $nova_autura);
                imagecopyresampled($imagem_redim, $imagem_tempo, 0, 0, 0, 0, $nova_largura, $nova_autura, $largura_orig, $altura_orig);
                imagepng($imagem_redim, '../img/'.$nome_arquivo);

               // move_uploaded_file($_FILES['user_avatar']['tmp_name'], '../img/'.$nome_arquivo);

            }elseif($_FILES['user_avatar']['type'] == 'image/jpeg'){
                $nome_arquivo = md5($_FILES['user_avatar']['name'].rand(1,999)).'.jpg';
                $imagem_tempo = imagecreatefromjpeg($_FILES['user_avatar']['tmp_name']);

                $largura_orig = imagesx($imagem_tempo);
                $altura_orig  = imagesy($imagem_tempo);

                $nova_largura = $largura ? $largura : floor(($largura_orig / $altura_orig) * $altura);
                $nova_autura  = $altura  ? $altura  : floor(($altura_orig / $largura_orig) * $largura);
                $imagem_redim = imagecreatetruecolor( $nova_largura, $nova_autura);
                imagecopyresampled($imagem_redim, $imagem_tempo, 0, 0, 0, 0, $nova_largura, $nova_autura, $largura_orig, $altura_orig);
                imagejpeg($imagem_redim, '../img/'.$nome_arquivo);

               // move_uploaded_file($_FILES['user_avatar']['tmp_name'], '../img/'.$nome_arquivo);
            }else{
                echo "Só é possivel enviar arquivos JPG e PNG!";
            }
            
            $queryUpdate = $link->query("update acompanhamento set Descricao='$descricao',  Valor=' $valor', Imagem='$nome_arquivo' where IdCodigo='$id'");
            $affected_rows = mysqli_affected_rows($link);

            if($affected_rows > 0 ):
                ?>
                    <script type="text/javascript">
                        alert('Altração Realizada com Sucesso!');
                    </script>
                <?php
                header("Location:../acompanhamento.php");
            endif;
        }else
        {
            ?>
                <script type="text/javascript">
                    alert('Preencha o campo Decrição ele é obrigtório!');
                </script>
            <?php
        }
    }
    if($affected_rows > 0):
        header("Location:../acompanhamento.php");
    endif;
?>