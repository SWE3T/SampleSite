<?php
    require_once "conection.php";
    require_once "Cliente.php";

    class ClienteDAO{
        
        public $conexao;

        public function __construct(){
            $this->conexao = conection::conect();
        }

        public function acessar($email, $senha){
            try{
                $query = $this->conexao->prepare("select codigo, nome, telefone, senha
                from cliente where email = :e");
                $query->bindParam(":e", $email);
                $query->execute();
                $registro = $query->fetchAll(PDO::FETCH_CLASS, "Cliente");
                // verificacao do e-mail / senha     
                if($query->rowCount() == 1){ // email informado existe no BD
                    if(!password_verify($senha, $registro[0]->getSenha())){
                        return false; // senha incorreta
                    }
                    else{ // email e senha estão corretos
                        return $registro[0];
                    }
                }       
                else{
                    return false; // nao encontrou email
                }     
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }                 

 

    }

?>   