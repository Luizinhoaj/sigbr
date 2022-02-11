<?php

    class Acompanhamento_class
    {
        private $pdo;
        public function __construct($dbname, $host, $user, $senha)
        {
            try
            {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
            } catch(PDOException $e)
            {
                Echo 'Ero com Banco de Dados: '.$e->getMessage();
            } catch(Exception $e)
            {
                Echo 'Ero generico: '.$e->getMessage();
            }
        }

        public function enviarAcompanhamento($descricao, $valor, $imagem)
        {
            // INSERIR O ACOMPANHAMENTO
            echo $descricao;
            echo $valor;
            echo $imagem;
            $cmd = $this->pdo->prepare('INSERT INTO acompanhamento (Descricao, Valor, Imagem) values (:de, va, im)');
            $cmd->bindValue(':de', $descricao);
            $cmd->bindValue(':va', $valor);
            $cmd->bindValue(':im', $imagem);
            $cmd->execute();
        }


        public function buscarAcompanhamento()   // BUSCA TODOS ACOMPAMHAMENTO
        {
            
        }

        
        public function buscarAcompanhamentoId($id)  // BUSCA APENAS 1 ACOMPAMHAMENTO
        {
            
        }

    }

?>