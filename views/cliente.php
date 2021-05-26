<main>
    
    <div class="forms">
        <h2>Área do cliente</h2>
        <form method="POST" action="index.php?action=login">
            <?php
            if(isset($_GET['erro']))
                echo "<br><div>Dados de acesso inválidos</div><br>";
            ?>    
            <br>
            <label for="id_email">E-mail:</label>
            <input type="email" name="field_email" size="37" maxlength="50" placeholder="e-mail utilizado no cadastro" id="id_email">
            <br>
            <label for="password">Senha:
            <input type="password" name="password_field" size="37" maxlength="45" placeholder="senha utilizada no cadastro" id="password"></label>
            <br>
            <br>
            <input type="reset" value="Limpar campos">
            <input type="submit" name="logar" value="Acessar">
        </form>
        <br>
        Ainda não possui uma conta? <a href="index.php?action=cadastro">Crie sua conta!</a>
    </div>

</main>
