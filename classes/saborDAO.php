<?php
    require_once "conection.php";
    require_once "sabor.php";

    class SaborDAO{
        
        public $conection;

        public function __construct(){
            $this->conection = conection::conect();
        }

        public function listar(){
            try{
                $query = $this->conection->prepare("select * from sabor order by nome");
                $query->execute();
                $registros = $query->fetchAll(PDO::FETCH_CLASS, "Sabor");
                return $registros;
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

        public function buscar($cod){
            try{
                $query = $this->conection->prepare("select * from sabor where codigo=:cod");
                $query->bindParam(":cod", $cod, PDO::PARAM_INT);
                $query->execute();
                $registro = $query->fetchAll(PDO::FETCH_CLASS, "Sabor");
                return $registro[0];
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }        

        public function inserir(Sabor $sabor){
            try{
                $query = $this->conection->prepare("insert into sabor values (NULL, :n, :i, :f)");
                $query->bindValue(":n", $sabor->getNome());
                $query->bindValue(":i", $sabor->getIngredientes());
                $query->bindValue(":f", $sabor->getNomeImagem());
                return $query->execute();
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

        public function alterar(Sabor $sabor){
            try{
                $query = $this->conection->prepare("update sabor set nome = :n, 
                ingredientes = :i, nomeImagem = :f 
                 where codigo = :cod");
                $query->bindValue(":n", $sabor->getNome());
                $query->bindValue(":i", $sabor->getIngredientes());
                $query->bindValue(":f", $sabor->getNomeImagem());
                $query->bindValue(":cod", $sabor->getCodigo());
                return $query->execute();
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

        public function excluir($cod){
            try{
                $query = $this->conection->prepare("delete from sabor where codigo = :cod");
                $query->bindValue(":cod", $cod);
                return $query->execute();
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

    }

?>   