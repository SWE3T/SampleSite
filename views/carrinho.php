<h2>Meu carrinho</h2>
<hr>
<p></p>
<?php
    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
        echo "<p>Seu carrinho está vazio.</p>";
    }
    else{
    ?>
    <table>
        <tr>
            <th>Tamanho</th>
            <th>Sabores</th>
            <th>Borda</th>
            <th>Valor</th>
            <th>Excluir</th>
        </tr>
        <?php
        include_once("classes/Pizza.php");
        $total = 0;
        foreach($_SESSION['cart'] as $indice => $item){
            $item = unserialize($item);
            $total+=$item->getPreco();
            echo "<tr>
                    <td>".$item->getTamanho()."</td>
                    <td>".$item->getListaSabores()."</td>
                    <td>".$item->getBorda()."</td>
                    <td>R$ ".$item->getPreco()."</td>
                    <td><a href='index.php?acao=delCarrinho&indice=$indice'>excluir</a></td>
                </tr>"; 
        }
        ?>
        <tr>
            <th colspan="3">Total:</th>
            <th><b>R$ <?=$total?></b></th>
            <th></th>
        </tr>
    </table>
    <?php    
    }
?>