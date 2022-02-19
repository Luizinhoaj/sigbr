<?php
    require "banco_de_dados/logout.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/8f10281738.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/css/bootstrap-icons.css">
        <link rel="stylesheet" href="css/login.css">

        <link rel="shortcut icon" href="imagens/sigbr.ico" type="image/x-icon">
        <title>SIGBR - Login</title>
    </head>
    <body>
        <div class="contanier"> <!-- inicio div geral -->

            <div class="content first-content"> <!-- inicio da div content -->
                <div class="first-column"> <!-- inicio da Primeira coluna -->
                    <div id="image">
                        <h1 class="titulo-um">SIGBR</h1>
                        <h2 class="sub-titulo">Sistema Gerenciador de Bar e Restaurantes</h2>
                        </div>
                </div>

                <div class="second-column"> <!-- inicio da Segunda coluna -->
                    <? if(isset($_GET['acessar']) && $_GET['acessar'] == 1 ) {?>
                        <div class="bg-sucess pt-2 text-white d-flex justify-content-center">
                            <h5>Usuario ou Senha incorreto!</h5>
                            <p>
                            <h5>Tenta Novamente</h5>
                        </div>
                    <? } ?>
                    <h1 class="titulo-dois">Login</h1>
                    <form action="banco_de_dados/login.php" method="POST" class="form-control card-principal" id="for-cadastro">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-floating">
                                    <input type="text" name="tusuario" id="cusuario" class="form-control" placeholder="Usuario"/>
                                    <label for="tusuario">Usuario</label>
                                </div>

                                <div class="form-floating">
                                    <input type="password" name="tsenha" id="csenha" class="form-control" placeholder="Senha"/>
                                    <label for="tsenha" class="form-label">Senha</label> 
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn">Login</button>
                        <div class="alert alert-danger d-none">
                            Preecha o campo <span id="campo-erro"></span>!
                        </div>
                    </form>
                    <?php
                        if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="senha-erro">
                      <h4>ERRO: Usuário ou Senha inválidos.</h4>
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>
                </div>
            </div>
        </div>
        <script src="js/js/jquery-3.4.1.slim.min.js"></script>
        <script src="js/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>