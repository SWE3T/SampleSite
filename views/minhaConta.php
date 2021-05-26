<h2>Área do Cliente</h2>
<hr>
<?php
    if(($_SESSION['logado']==true)){
        echo "<p>{$_SESSION['cliente']}</p>";
        echo "<p>Em breve você verá aqui sua lista de pedidos!</p>";
    }
    else{
        echo "<p>É necessário se identificar. Acesse a página de <a href='index.php?action=cliente'>login</a></p>"; 
    }
?>