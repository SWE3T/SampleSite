<div class="formCad">
        <h2>Crie sua conta!</h2>
        <form method="POST" action="">

            <label for="name">Nome:</label>
            <input type="text" name="name_field" size="37" maxlength="50" placeholder="nome completo" id="name" required autofocus autocomplete="off">
            <br>
            <label for="id_email">E-mail:</label>
            <input type="email" name="field_email" size="37" maxlength="50" placeholder="e-mail" id="email" required>
            <br>
            <label for="password">Senha:<input type="password" name="password_field" size="37" maxlength="45" placeholder="senha" id="password" required></label>
            <br>
            <label for="confirm">Confirme a senha:<input type="password" name="password_field" size="37" maxlength="45" placeholder="senha" id="confirm" required></label>
            <br>
            <label for="adress">Endereço:</label> <input type="text" name="adress_field" size="37" maxlength="50" placeholder="Rua, Número, Complemento" id="adress" required>
            <br>
            <label for="date">Data de nascimento:<input type="date" name="date_field" size="37" maxlength="45" placeholder="sua data de nascimento" id="date" required></label>
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
            <input type="submit" value="Criar conta" onclick="signup()">
        </form>
    </div>