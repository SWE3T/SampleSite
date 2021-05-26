<h2>Área do Cliente</h2>
<a href='index.php?action=sair'>sair</a>
<hr>
<?php
    if(($_SESSION['logado']==true)){
        echo "<p>{$_SESSION['cliente']}, em breve você verá sua lista de pedidos!</p>";
    }
    else{
        echo "<p>É necessário se identificar. Acesse a página de <a href='index.php?action=cliente'>login</a></p>"; 
    }
?>