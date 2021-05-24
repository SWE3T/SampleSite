<main class="table">
    <aside style="display: contents;" id="hideAside">
        <p>Promoção da semana:</p>
        <p>pizza pequena por R$10,99
        <p>com frete grátis!</p>
    </aside>
    <br>
    <p>Confira abaixo nossa tabela de preços!</p>
    <table border="1">
        <tr>
            <td>Pizza piccola</td>
            <td>Pizza media</td>
            <td>Pizza grandi</td>
            <td>Pizza gigante</td>
        </tr>
        <tr align="center">
            <td>R$ 14,99</td>
            <td>R$ 17,99</td>
            <td>R$ 21,99</td>
            <td>R$ 26,99</td>
        </tr>
        <tr align="center">
            <td>1 sabor </td>
            <td>3 sabores</td>
            <td>4 sabores</td>
            <td>6 sabores</td>
        </tr>
    </table>



    <button class="open-button" onclick="openForm()">Chat</button>
    <div class="chat-popup" id="myForm">
        <form action="" class="form-container">
            <h3>Converse com um de nossos atendentes!</h3>

            <textarea placeholder="Escreva uma mensagem..." name="msg" required></textarea>

            <button type="submit" class="btn">Enviar</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Minimizar</button>
        </form>
    </div>
</main>