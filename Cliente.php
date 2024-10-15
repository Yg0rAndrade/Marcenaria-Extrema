<?php
    class Cliente{
        private $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }
        public function cadastrarCliente($nome,$email,$telefone,$endereco){
            $cadastrar = $this->pdo->prepare("INSERT INTO [TABELA] (nome,email,telefone,endereco) VALUES (?,?,?,?)");
            $cadastrar->execute([$nome,$email,$telefone,$endereco]);
        }
        public function editarCliente($nome,$email,$telefone,$endereco){
            $editar = $this->pdo->prepare("UPDATE [TABELA] set (nome,quantidade,preco,descricao) VALUES (?,?,?,?)");
            $editar->execute([$nome,$email,$telefone,$endereco]);
        }
        public function deletarCliente($id){
            $deletar = $this->pdo->prepare("DELETE * FROM [TABELA] WHERE id=?");
            $deletar->execute([$id]);
        }
        public function listarClientes(){
            $list = $this->pdo->query("SELECT * FROM [TABELA]");
            return $list->fetchAll(PDO::FETCH_ASSOC);
        }
        public function listarClienteId($id){
            $list = $this->pdo->prepare("SELECT * FROM [TABELA] WHERE id=?");
            $list->execute([$id]);
            return $list->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>