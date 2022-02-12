<?php
    session_start();
    if(isset($_POST['tdescicao'])){
        $altura  = "100";
        $largura = "100";
        include_once 'conexao.php';
        $codigo    = filter_input(INPUT_POST,'tcodigo', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST,'tdescicao', FILTER_SANITIZE_SPECIAL_CHARS);
        $valor     = filter_input(INPUT_POST,'tvalor', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $imagem    = filter_input(INPUT_POST,'timagem', FILTER_SANITIZE_SPECIAL_CHARS);

        $valor = number_format(str_replace(",",".",str_replace(".","",$valor)), 2, '.', '');

        $queryUltimo = $link->query("SELECT IdCodigo FROM acompanhamento ORDER BY IdCodigo DESC LIMIT 1");

        while($regitro = $queryUltimo->fetch_assoc()):
            $codigo = $regitro['IdCodigo'];
        endwhile;

        $codigo = $codigo+1;
    
        //  VERIFICAR SE FOI PREENCIDO OS CAMPOS
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

              //  move_uploaded_file($_FILES['user_avatar']['tmp_name'], '../img/'.$nome_arquivo);

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


              //  move_uploaded_file($_FILES['user_avatar']['tmp_name'], '../img/'.$nome_arquivo);
            }else{
                echo "Só é possivel enviar arquivos JPG e PNG!";
            }
            
            $querySelect = $link->query("SELECT Descricao from acompanhamento ASC");
            $array_descr = [];
                   
            if(in_array($descicao, $array_descr )):
                $_SESSION['msg'] = "<p class='center alert'>".'Já existe um Acompanhamento com essa Descrição'."</p>";
                header("Location:../acompanhamento.php");
            else:
                $queryInsert = $link->query("insert into acompanhamento values('$codigo', '$descricao','$valor','$nome_arquivo')");
                $affected_rows = mysqli_affected_rows($link);
        
                if($affected_rows > 0 ):
                    $_SESSION['msg'] = "<p class='center alert'>".'Cadastro efeturado com sucesso'."</p>";
                    header("Location:../acompanhamento.php");
                endif;
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


?>