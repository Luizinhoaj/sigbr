<?php
    session_start();
    include_once 'banco_de_dados/conexao.php';
    $querySelect = $link->query("SELECT * FROM acompanhamento ORDER BY IdCodigo ASC LIMIT 1");
    
    while($regitro = $querySelect->fetch_assoc()):
        $codigo = $regitro['IdCodigo'];
        $descricao = $regitro['Descricao'];
        $valor = $regitro['Valor'];
        $imagem = $regitro['Imagem'];
    endwhile;

    if(!$codigo > 0){
        $codigo = 1;
        $descricao = "";
        $valor = "";
        $imagem = "sem-imagem.jpg";
    }
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
                <h1 class="text-center">Acompanhamento</h1>
                <div class="">      <!-- Inicio da div col 12 Formulario -->
                    <form action="banco_de_dados/create.php" method="post" enctype="multipart/form-data" class="form-control card-principal" id="for-cadastro">
                        <div class="card">
                            <div class="corpo">
                                <div class="dados">
                                    <p>
                                        <label for="ccodigo">Código :</label>
                                        <input type="text" name="tcodigo" id="ccodigo" value="<?php echo $codigo ?>" disabled/>
                                    </p>
                                    <p>
                                        <label class="lb-descricao" for="cdescricao">Descrição :</label> 
                                        <input type="text" name="tdescicao" id="cdescricao" size="25" oninput="maiuscula(event)" value="<?php echo $descricao ?>" disabled/>
                                    </p> 
                                    <p>
                                        <label for="cvalor">Valor :</label>
                                        <input type="text" name="tvalor" id="cvalor" step='0.01' onkeypress="return(moeda(this,',','.',event))" value="<?php echo $valor ?>" disabled/>
                                    </p>
                                </div>
                                <div class="cad-imagem">
                                    <div>
                                        <fieldset id="img-fomulario"><legend>Imagem</legend>
                                            <?php
                                                if ($codigo > 0)
                                                {
                                                    echo '<img name="timagem" src="img/'.$imagem. '" id="timagem" class="avatar" alt="imagem do produto"/>';
                                                }else{
                                            ?>
                                                <img name="timagem" width="100px" src="img/sem-imagem.jpg" id="timagem" class="avatar" alt="imagem do produto"/>
                                            <?php
                                                };
                                            ?>
                                            <input type="file" accept="image/*" name="user_avatar" id="arquivo" class="file-upload" style="display:none">
                                            <p>&ensp;</p>
                                            <a id="btnbusca" onclick="escolherArquivo()" href="#">Buscar</a>
                                            <p>&ensp;</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-groupo">
                                    <fieldset><legend class="legenda">Acompanhamento Cadastrados</legend>
                                        <table class="rTable" id='minhaTabela'>
                                            <thead>
                                                <tr>
                                                    <th>Codigos</th>
                                                    <th>Descrição</th>
                                                    <th >Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include_once 'banco_de_dados/read.php';?>
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="btnMenu" class="menu-for">
                                <nav>
                                    <div class="content nav-botao">
                                        <button type="button" id="btnincluir"   onclick="incluirregistro()" href="#">Incluir</button>
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
