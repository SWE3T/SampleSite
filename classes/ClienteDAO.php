<?php
require_once "conection.php";
require_once "Cliente.php";

class ClienteDAO
{

    public $conexao;

    public function __construct()
    {
        $this->conexao = conection::conect();
    }

    public function cadastrar(Cliente $cliente)
    {
        try {
            $query = $this->conexao->prepare("INSERT INTO cliente values (NULL, :n, :e, :p, :dt, :s, :en, :ba, NULL, NULL, NULL, NULL);");
            $query->bindValue(":n", $cliente->getNome());
            $query->bindValue(":e", $cliente->getEmail());
            $query->bindValue(":dt", $cliente->getDataNascimento());
            $query->bindValue(":s", $cliente->getSenha());
            $query->bindValue(":en", $cliente->getEndereco());
            $query->bindValue(":ba", $cliente->getBairro());
            $query->bindValue(":p", $cliente->getTelefone());
            return $query->execute();
        } catch (PDOException $e) {
            echo "Erro no acesso aos dados: " . $e->getMessage();
        }
    }

    public function alterar(Cliente $cliente)
    {
        try {
            $query = $this->conexao->prepare("update cliente set nome = :n, email = :e, telefone = :p, dataNascimento = :dt, senha = :s, endereco = :en, bairro = :ba");
            $query->bindValue(":n", $cliente->getNome());
            $query->bindValue(":e", $cliente->getEmail());
            $query->bindValue(":dt", $cliente->getDataNascimento());
            $query->bindValue(":s", $cliente->getSenha());
            $query->bindValue(":en", $cliente->getEndereco());
            $query->bindValue(":ba", $cliente->getBairro());
            $query->bindValue(":p", $cliente->getTelefone());

            return $query->execute();
        } catch (PDOException $e) {
            echo "Erro no acesso aos dados: " . $e->getMessage();
        }
    }

    public function acessar($email, $senha)
    {
        try {
            $query = $this->conexao->prepare("select codigo, nome, telefone, senha from cliente where email = :e");
            $query->bindParam(':e', $email);
            $query->execute();
            $registro = $query->fetchAll(PDO::FETCH_CLASS, "Cliente");

            if ($query->rowCount() == 1) {
                if ($senha == $registro[0]->getSenha()) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo "Erro no acesso aos dados: " . $e->getMessage();
        }
    }
    public function loginAceito($email)
    {
        $query = $this->conexao->prepare("select codigo, nome, telefone, senha from cliente where email = :e");
        $query->bindParam(':e', $email);
        $query->execute();
        $registro = $query->fetchAll(PDO::FETCH_CLASS, "Cliente");
        return $registro;
    }
}
