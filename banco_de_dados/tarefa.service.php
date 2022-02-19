<?php

    class TarefaService{

        private $conexao;

        public function __construct(Conexao $conexao){
            $this->conexao = $conexao->conectar();
        }

        public function inserir() {

        }
    
        public function recuperar() {

        }

        public function atualizar() {

        }
        
        public function remover() {

        }
    
    }

?>