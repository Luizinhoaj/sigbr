<?php 
    session_start();
    include_once 'includes/header.inc.php';
    include_once 'includes/menu.inc.php';

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
        <div class="container">     <!-- Inicio da div container -->
            <div class="container-for">     <!-- Inicio da div col-md-12 -->
                <h1 class="text-center">Altração Acompanhamento</h1>
                <div class="">      <!-- Inicio da div col 12 Formulario -->
                    <form action="banco_de_dados/update.php" method="post" enctype="multipart/form-data" class="form-control card-principal" id="for-cadastro">
                        <div class="card">
                            <?php
                                if(isset($_SESSION['msg'])):
                                    echo $_SESSION['msg'];
                                    session_unset();
                                endif;
                            ?>
                            <div class="corpo">
                                <div class="dados">
                                    <p>
                                        <label for="ccodigo">Código :</label>
                                        <input type="text" name="tcodigo" id="ccodigo" value="<?php echo $id ?>" disabled/>
                                    </p>
                                    <p>
                                        <label class="lb-descricao" for="cdescricao">Descrição :</label> 
                                        <input type="text" name="tdescicao" id="cdescricao" value="<?php echo $descricao ?>"/>
                                    </p> 
                                    <p>
                                        <label for="cvalor">Valor :</label>
                                        <input type="number" name="tvalor" id="cvalor" value="<?php echo $valor ?>"/>
                                    </p>
                                </div>
                                <div class="cad-imagem">
                                    <div>
                                        <fieldset id="img-fomulario"><legend>Imagem</legend>
                                            <?php
                                                echo '<img name="timagem" src="data:image/jpeg;base64,' . base64_encode($imagem) . '" id="timagem" class="avatar" alt="imagem do produto"/>';
                                            ?>
                                            <input type="file" accept="image/*" name="user_avatar" id="arquivo" class="file-upload" style="display:none">
                                            <p>&ensp;</p>
                                            <a id="btnbusca" onclick="escolherArquivo()" href="#">Buscar</a>
                                            <p>&ensp;</p>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-for">
                                <nav>
                                    <div class="content nav-botao">
                                        <button type="button" id="btnincluir"   href="#">Incluir</button>
                                        <button type="button" id="btnalterar"   href="#">Alterar</button>
                                        <button type="button" id="btnexcluir"   href="#">Excluir</button>
                                        <button type="submit" id="btnconfirmar" href="#">Confirmar</button>
                                        <button onclick="carregaacompa() type="reset"  id="btncancelar"  href="#">Cancelar</button>
                                    </div>
                                </nav>
                            </div>
                        </div>  
                    </form>
                </div>  <!-- Fim da div col 12 Formulario -->
            </div>  <!-- Fim da div col md 12 -->
        </div>      <!-- Fim da div container -->   
        <?php include_once 'includes/footer.inc.php'?>