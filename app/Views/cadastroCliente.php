<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do cliente</title>
</head>
<body>
    <h1 style="color: white; text-align: center; font-size: 1.5em;">Cadastro do cliente</h1>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        
 *{
        font-family: 'Roboto', sans-serif;
    }
input{
    background-color: #C7C7C7;
    padding: 3%;
    width: 70%;
    margin-top: 5%;
    border: 0;
}
body{
    background-color:#201335;
}
        .formulario {
            background: #95BF8F;
            margin: auto;
              width:  300px;
              height: 400px;
            border-radius: 50px;
            display:flex;
            flex-direction: column;
        }

    button{
        background-color: #D36060;
        padding: 5%;
        width: 50%;
        border-radius: 51px;
        margin-top: 10%;
        margin-left: 23%;
        
    }

    .labelinput{
margin-left: 18%;
margin-top: 7%;
display: flex;
flex-direction: column;
    }
    </style>

    <div class="formulario">

    <form action="/cadastrarCliente" method="post">
    

    <div class='labelinput'>
    <label for="nome">Nome </label>
    <input type="text" name="nome" required>
    </div>
   

    
<div class='labelinput'>
<label for="cpf">CPF </label>
<input type="number" name="cpf" required>
    </div>
   


    <div class='labelinput'>

    <label for="email">E-mail </label>
        <input type="text" name="email" required>
    </div>


    <button type="submit">Cadastrar</button>



    </form>

    </div>

</body>
</html>