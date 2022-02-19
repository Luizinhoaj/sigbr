<?php
    require "tarefa.service.php";
    require "conexao.php";

    $conexao = new Conexao();
  
    $tarefaService = new TarefaService($conexao, $tarefa);
    
?>
