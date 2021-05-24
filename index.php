<?php
include_once("views/layout/header.php");
?>
<main>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "cadastro") {
            include_once "classes/ClienteDAO.php";
            include_once "classes/Cliente.php";
            $bd = new ClienteDAO();
            $novo = new Cliente();
            if (isset($_POST['name_field'])) {
                $nome = isset($_POST['name_field']) ? $_POST['name_field'] : "";
                $email = isset($_POST['field_email']) ? $_POST['field_email'] : "";
                $senha = isset($_POST['password_field']) ? $_POST['password_field'] : "";
                $adress = isset($_POST['adress_field']) ? $_POST['adress_field'] : "";
                $bairro = isset($_POST['field_bairro']) ? $_POST['field_bairro'] : "";
                $data = isset($_POST['date_field']) ? $_POST['date_field'] : "";
                
                $novo->setNome($nome);
                $novo->setEmail($email);
                $novo->setSenha($senha);
                $novo->setEndereco($adress);
                $novo->setBairro($bairro); 
                $novo->setDataNascimento($data);   
            
                $bd->cadastrar($novo);
            }
            else{
                include_once("views/cadastro.php");
                echo "Erro na efetuação do cadastro. Atualize a página e tente novamente!";
            }
            
        } elseif ($_GET['action'] == "login") {
            include_once "classes/ClienteDAO.php";
            $bd = new ClienteDAO();
            if ($resultado = $bd->acessar($_POST['field_email'], $_POST['password_field'])) {
                $_SESSION['logado'] = true;
                $_SESSION['cliente'] = $resultado->getNome();
                $_SESSION['codigo'] = $resultado->getCodigo();
                header("Location: index.php?action=minhaConta");
            } else { // casos em que o método acessar retornou false
                header("Location: index.php?action=cliente&erro=1");
            }
        } elseif ($_GET['action'] == "sair") {
            session_destroy();
            header("Location: index.php?action=cliente");
        } elseif ($_GET['action'] == "cliente" && isset($_SESSION['logado'])) {
            header("Location: index.php?action=minhaconta"); // se ja está logado, redireciona para minhaconta
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