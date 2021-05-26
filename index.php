<?php
include_once("views/layout/header.php");
session_start();
?>
<main>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "cadastro") {
            include_once "classes/ClienteDAO.php";
            include_once "classes/Cliente.php";
            include_once("views/cadastro.php");

            $bd = new ClienteDAO();
            $novo = new Cliente();
            if (isset($_POST['cadastrar'])) {
                $valido = true;
                $warning = 0;
                $campos = array("name_field", "field_email", "password_field", "confirm_password_field", "adress_field", "field_bairro", "date_field");
                $senha = $_POST["password_field"];
                $senhalength = strlen((string)$senha);
                if ($senhalength <= 6) {
                    $valido = false;
                    echo '<p style = "text-align: center; color: tomato;">Senha muito pequena!</p>';
                }
                if ($_POST["password_field"] != $_POST["confirm_password_field"]) {
                    $valido = false;
                    echo '<p style = "text-align: center; color: tomato;">Senhas não conferem!</p>';
                }
                foreach ($campos as $campo) {
                    if (empty($_POST[$campo])) {
                        $warning = 1;
                        $valido = false;
                    }
                }
                if ($warning == 1)
                    echo '<p style = "text-align: center; color: tomato;">Campos em branco!</p>';
                if ($valido) {
                    $nome = $_POST['name_field'];
                    $email = $_POST['field_email'];
                    $senha = $_POST['password_field'];
                    $adress = $_POST['adress_field'];
                    $bairro = $_POST['field_bairro'];
                    $telefone = $_POST['phone_field'];
                    $data = $_POST['date_field'];

                    $novo->setNome($nome);
                    $novo->setEmail($email);
                    $novo->setSenha($senha);
                    $novo->setEndereco($adress);
                    $novo->setBairro($bairro);
                    $novo->setTelefone($telefone);
                    $novo->setDataNascimento($data);

                    $bd->cadastrar($novo);

                    $_SESSION['logado'] = true;
                    $_SESSION['cliente'] = $novo->getNome();
                    $_SESSION['codigo'] = $novo->getCodigo();
                    header("Location: index.php?action=minhaConta");
                } else {
                    echo '<p style = "text-align: center; color: tomato;">Erro na criação da conta!</p>';
                }
            }
        } elseif ($_GET['action'] == "login") {
            include_once "classes/ClienteDAO.php";
            $bd = new ClienteDAO();
            $cliente = new Cliente();
            if (isset($_POST['logar'])) {
                $emailUser = $_POST['field_email'];
                $senhaUser = $_POST['password_field'];
                $nomeUser = $_POST['field_email'];
                if ($bd->acessar($emailUser, $senhaUser) == false) {    
                    header("Location: index.php?action=cliente");
                    echo "<h2>" . $nomeUser . $senhaUser . "</h2>";
                    echo '<p style = "text-align: center; color: tomato;">Erro no login! Tente novamente!</p>';
                } else { // casos em que o método acessar retornou algo diferente de false
                    $cliente = new Cliente();
                    $cliente = $bd->loginAceito($emailUser);
                    $_SESSION['logado'] = true; 
                    $_SESSION['cliente'] = $cliente[0]->getNome();
                    echo '<p style = "text-align: center; color: tomato;">Login efetuado!</p>';
                    header("Location: index.php?action=minhaConta");
              }
            }
        } elseif ($_GET['action'] == "sair") {
            header("Location: index.php?action=cliente");
        } elseif ($_GET['action'] == "cliente" && (isset ($_SESSION['logado']) == true)){
            header("Location: index.php?action=minhaConta"); // se ja está logado, redireciona para minhaconta
        } elseif ($_GET['action'] == "addCarrinho") {
            include_once("classes/Pizza.php");
            $p = new Pizza();
            $p->setTamanho($_POST['tamanho']);
            foreach ($_POST['sabores'] as $item) {
                $item = explode("-", $item); // $item[0]: codigo; $item[1]: nome
                $escolhidos[] = array($item[0], $item[1]);
            }
            $p->setSabores($escolhidos);
            $p->setBorda($_POST['borda']);
            $_SESSION['cart'][] = serialize($p);
            header("Location: index.php?action=carrinho");
        } elseif ($_GET['action'] == "delCarrinho") {
            unset($_SESSION['cart'][$_GET['indice']]);
            header("Location: index.php?action=carrinho");
        } else {
            include_once("views/{$_GET['action']}.php"); // inclui genericamente as demais views
        }
    } else {
        include_once("views/start.php");
    }
    ?>
</main>
<?php
include_once("views/layout/footer.php");
?>