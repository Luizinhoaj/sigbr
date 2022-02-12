<?php 
    session_start();
    include_once 'includes/header.inc.php';

    include_once 'banco_de_dados/conexao.php';
    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id'] = $id;

    $querySelect = $link->query("SELECT * FROM acompanhamento WHERE IdCodigo='$id'");

    while($registros = $querySelect->fetch_assoc()):
        $codigo     = $registros['IdCodigo'];
        $descricao  = $registros['Descricao'];
        $valor      = $registros['Valor'];
        $imagem     = $registros['Imagem'];

    endwhile;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/estilos.css">

        <link rel="shortcut icon" href="imagens/sigbr.ico" type="image/x-icon">
        <title>SIGBR - Principal</title>
       
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
        <script src="https://kit.fontawesome.com/8f10281738.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include_once 'includes/menu.inc.php';
        ?>
        <div class="container">     <!-- Inicio da div container -->
            <div class="container-for">     <!-- Inicio da div col-md-12 -->
                <h1 class="text-center">Altração Acompanhamento</h1>
                <div class="">      <!-- Inicio da div col 12 Formulario -->
                    <form action="banco_de_dados/update.php" method="post" enctype="multipart/form-data" class="form-control card-principal" id="for-cadastro">
                        <div class="card">
                            <div class="corpo">
                                <div class="dados">
                                    <p>
                                        <label for="ccodigo">Código :</label>
                                        <input disabled type="text" name="tcodigo" id="ccodigo" value="<?php echo $id ?>"/>
                                    </p>
                                    <p>
                                        <label class="lb-descricao" for="cdescricao">Descrição :</label> 
                                        <input type="text" name="tdescicao" id="cdescricao" size="50" onkeyup="maiuscula(this)" value="<?php echo $descricao ?>"/>
                                    </p> 
                                    <p>
                                        <label for="cvalor">Valor :</label>
                                        <input type="text" name="tvalor" id="cvalor" step='0.01' onkeypress="return(moeda(this,',','.',event))" value="<?php echo $valor ?>"/>
                                    </p>
                                </div>
                                <div class="cad-imagem">
                                    <div>
                                        <fieldset id="img-fomulario"><legend>Imagem</legend>
                                            <?php
                                                echo '<img name="timagem" src="img/'.$imagem. '" id="timagem" class="avatar" alt="imagem do produto"/>';
                                            ?>
                                            <input type="file" accept="image/*" name="user_avatar" id="arquivo" class="file-upload" style="display:none">
                                            <p>&ensp;</p>
                                            <a name="btn-busca" id="btnbusca" onclick="escolherArquivo()" href="#">Buscar</a>
                                            <p>&ensp;</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-for">
                                <nav>
                                    <div class="content nav-botao">
                                        <button type="button" id="btnincluir"   href="#">Incluir</button>
                                        <button type="submit" id="btnconfirmar"                             href="#">Confirmar</button>
                                        <button type="reset"  id="btncancelar"  onclick="cancelaregistro()" href="#">Cancelar</button>
                                    </div>
                                </nav>
                            </div>
                        </div>  
                    </form>
                </div>  <!-- Fim da div col 12 Formulario -->
            </div>  <!-- Fim da div col md 12 -->
        </div>      <!-- Fim da div container -->
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script src="js/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>    
    </body>
</html>
<script>
    /* UPLOAD DE IMAGENS SRC */

    $(document).ready(function(){

        var readUrl = function(input){
        if(input.files && input.files[0]){
            
            var reader = new FileReader();
            
            reader.readAsDataURL(input.files[0]);
            
            reader.onload = function(e){
            $(".avatar").attr('src', e.target.result);
            }
        }
        }

        $(".file-upload").on('change',function(){
        readUrl(this);
        });

    });

    function escolherArquivo(){
        // vamos obter uma referência ao elemento file
        var arquivo = document.getElementById("arquivo");
        // vamos disparar seu evento onclick()
        arquivo.click();
    }
</script>
