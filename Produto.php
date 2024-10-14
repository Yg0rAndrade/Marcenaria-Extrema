<?php
    class Produto{
        private $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function cadastrarProduto($nome,$quantidade,$preco,$descricao){
            $insert = $this->pdo->prepare("INSERT INTO [TABELA] (nome,quantidade,preco,descricao) VALUES (?,?,?,?)");
            $insert->execute([$nome,$quantidade, $preco, $descricao]);

        }

        public function editarProduto($nome,$quantidade,$preco,$descricao){
            $edit = $this->pdo->prepare("UPDATE [TABELA] SET (nome,quantidade,preco,descricao) VALUES (?,?,?,?");
            $edit->execute([$nome,$quantidade, $preco, $descricao]);
        
        }    

        public function deletarProduto($id){
            $delete = $this->pdo->prepare("DELETE * FROM [TABELA] WHERE id = ?");
            $delete->execute([$id]);
        }

        public function listarProdutos(){
            $list = $this->pdo->query("SELECT * FROM [TABELA]");
            return $list->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>