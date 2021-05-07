<h2>Área do Cliente</h2>
<hr>
<?php
    if(isset($_SESSION['logado'])){
        echo "<p>{$_SESSION['cliente']}</p>";
        echo "<p>Em breve você verá aqui sua lista de pedidos!</p>";
    }
    else{
        echo "<p>É necessário se identificar. Acesse a página de <a href
        ='index.php?acao=cliente'>login</a></p>"; 
    }
?>