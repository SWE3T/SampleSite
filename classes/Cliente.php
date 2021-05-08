<?php
class Cliente
{
    // atributos
    private $codigo;
    private $nome;
    private $email;
    private $telefone;
    private $dataNascimento;
    private $senha;
    private $senha2;
    private $endereco;
    private $bairro;
    private $comoConheceu;
    private $promoPizza;
    private $promoParceiros;
    private $observacoes;


    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }
   
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getSenha2()
    {
        return $this->senha2;
    }

    public function setSenha2($senha2)
    {
        $this->senha2 = $senha2;

        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getComoConheceu()
    {
        return $this->comoConheceu;
    }

    public function setComoConheceu($comoConheceu)
    {
        $this->comoConheceu = $comoConheceu;

        return $this;
    }

    public function getPromoPizza()
    {
        return $this->promoPizza;
    }

    public function setPromoPizza($promoPizza)
    {
        $this->promoPizza = $promoPizza;

        return $this;
    }

    public function getPromoParceiros()
    {
        return $this->promoParceiros;
    }

    public function setPromoParceiros($promoParceiros)
    {
        $this->promoParceiros = $promoParceiros;

        return $this;
    }

    public function getObservacoes()
    {
        return $this->observacoes;
    }

    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;

        return $this;
    }

    public function validate(){
        $erros = array();
        if(empty($this->getNome()))
            $erros[] = "É necessário informar um nome";
        if(empty($this->getEmail()))
            $erros[] = "É necessário informar um endereço de e-mail";
        elseif(!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL))
            $erros[] = "Verifique o formato do endereço de e-mail";            
        if(empty($this->getTelefone()))
            $erros[] = "É necessário informar um número de telefone";   
        if(strlen($this->getSenha()) < 6)
            $erros[] = "A senha deve ter no mínimo 6 caracteres";          
        if($this->getSenha() !=  $this->getSenha2())
            $erros[] = "As senhas não conferem";                   
        return $erros;                                 
    }     
}
