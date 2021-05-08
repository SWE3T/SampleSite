<?php
include_once("views/layout/header.php");
?>   
    <main>
    <?php
    if(isset($_GET['action'])){
        if($_GET['action'] == "cadastro"){
            // logica para cadastro (semelhante ao clienteController)
            include_once("views/cadastro.php");          
        }
        elseif($_GET['action'] == "login"){
           include_once "classes/ClienteDAO.php";
           $bd = new ClienteDAO();
           if($resultado = $bd->acessar($_POST['field_email'], $_POST['field_senha'])){
                $_SESSION['logado'] = true;
                $_SESSION['cliente'] = $resultado->getNome();
                $_SESSION['codigo'] = $resultado->getCodigo();
                header("Location: index.php?action=minhaconta");
           }
           else{ // casos em que o método acessar retornou false
               header("Location: index.php?action=cliente&erro=1");
           }
        }
        elseif($_GET['action'] == "sair"){
            session_destroy();
            header("Location: index.php?action=cliente");
        }
        elseif($_GET['action'] == "cliente" && isset($_SESSION['logado'])){
            header("Location: index.php?action=minhaconta"); // se ja está logado, redireciona para minhaconta
        } 
        elseif($_GET['action'] == "addCarrinho"){
            include_once("classes/Pizza.php");
            $p = new Pizza();
            $p->setTamanho($_POST['tamanho']);
            foreach($_POST['sabores'] as $item){
                $item = explode("-", $item); // $item[0]: codigo; $item[1]: nome
                $escolhidos[] = array($item[0], $item[1]); 
            } 
            $p->setSabores($escolhidos);
            $p->setBorda($_POST['borda']);
            $_SESSION['cart'][] = serialize($p);
            header("Location: index.php?action=carrinho");
        }
        elseif($_GET['action'] == "delCarrinho"){
            unset($_SESSION['cart'][$_GET['indice']]);
            header("Location: index.php?action=carrinho");
        }
        else{
            include_once("views/{$_GET['action']}.php"); // inclui genericamente as demais views
        }
    }
    else{
        include_once("views/start.php");
    }
    ?>
    </main>
<?php
include_once("views/layout/footer.php");
?>  