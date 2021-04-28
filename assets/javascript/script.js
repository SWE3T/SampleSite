function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function showMenu(){
  menu = document.getElementsByTagName("nav")[0];
  if(menu.style.display == 'block')
    menu.style.display = 'none';
  else
    menu.style.display = 'block';
}

function login() {
  var email = document.getElementById("id_email").value;
  var password = document.getElementById("password").value;
  if (email == "") {
    alert("Insira o seu e-mail!");
  }
  else if (password == "") {
    alert("Insira a sua senha!");
  }
  else {
    alert("*Procurando na Banco de Dados se o usuário existe...");
  }
}

function signup(){
  var pass = document.getElementById("password").value
  var conf = document.getElementById("confirm").value
  var name = document.getElementById("name").value
  var email = document.getElementById("email").value
  var date = document.getElementById("date").value
  var adress = document.getElementById("adress").value

  if(pass != conf){
    alert("A senha inserida não foi confirmada corretamente!")
  }
  else if (name == "") {
    alert("Insira o seu nome!");
  }
  else if (email == "") {
    alert("Insira o seu e-mail!");
  }
  else if (date == "") {
    alert("Insira sua data de nascimento!");
  }
  else if (adress == "") {
    alert("Insira o seu e-mail!");
  }
  else if (pass == "") {
    alert("Insira uma senha!");
  }
  else if (conf == "") {
    alert("Confirme sua senha!");
  }
  else {
    alert("*Cadastrando usuário no Banco de Dados...");
  }
}

function pizzaSize(){
  currentSize = document.getElementById("tamanho").value;
  if(currentSize == ""){
      document.getElementById("opcoes_pedido").style.display = "none";
  }
  else{
      document.getElementById("opcoes_pedido").style.display = "block";
  }
  document.getElementById("limiteSabores").innerText = sizes[currentSize];
  lista = document.querySelectorAll("input[type=checkbox]");
  for (i = 0; i < lista.length; i++)
      lista[i].checked = false;
  document.getElementById("numSabores").innerText = 0;    
}
