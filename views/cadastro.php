<div class="erro_cadastro">
    <?php
    if (isset($erros) && count($erros) != 0) {
        echo "<ul>";
        foreach ($erros as $e)
            echo "<li>$e</li>";
        echo "</ul>";
    }

    ?>
</div>

<div class="formCad">
    <h2>Crie sua conta!</h2>
    <form method="POST" action="?action=cadastro">

        <label for="name">Nome:</label>
        <input type="text" name="name_field" size="37" maxlength="50" placeholder="nome completo" id="name" autofocus autocomplete="off">
        <br>
        <label for="id_email">E-mail:</label>
        <input type="email" name="field_email" size="37" maxlength="50" placeholder="e-mail" id="email">
        <br>
        <label for="password">Senha:<input type="password" name="password_field" size="37" maxlength="45" placeholder="senha" id="password"></label>
        <br>
        <label for="confirm">Confirme a senha:<input type="password" name="confirm_password_field" size="37" maxlength="45" placeholder="senha" id="confirm"></label>
        <br>
        <label for="adress">Endereço:</label> <input type="text" name="adress_field" size="37" maxlength="50" placeholder="Rua, Número, Complemento" id="adress">
        <br>
        <label for="phone">Telefone: <input type="tel" name="phone_field" id="phone" size="37" placeholder="Número para contato"> </label>
        <br>
        <label for="date">Data de nascimento:<input type="date" name="date_field" size="37" maxlength="45" placeholder="sua data de nascimento" id="date"></label>
        <br>
        <div>
            <label for="id_bairro">Bairro:</label>
            <select id="id_bairro" name="field_bairro">
                <option value="Selecione">Selecione</option>
                <option value="Alvorada">Alvorada</option>
                <option value="Desbravador">Desbravador</option>
                <option value="Efapi">Efapi</option>
                <option value="Explanada">Explanada</option>
                <option value="Engenho Braun">Engenho Braun</option>
                <option value="Industrial">Industrial</option>
                <option value="Jardim América">Jardim América</option>
                <option value="Jardim Itália">Jardim Itália</option>
                <option value="Maria Goretti">Maria Goretti</option>
                <option value="São Cristóvão">São Cristóvão</option>
            </select>
        </div>
        <input type="reset" value="Limpar campos">
        <input type="submit" name="cadastrar" value="Criar conta">
    </form>
</div>