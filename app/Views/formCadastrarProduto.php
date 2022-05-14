

  
  <body>
  <h1 style="color: white; text-align: center; font-size: 1.5em;">Cadastrar produto</h1>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        
 *{
        font-family: 'Roboto', sans-serif;
        font-size: 0.97em;
    }
input{
    background-color: #C7C7C7;
    padding: 1%;
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
            width: 450px;
            border-radius: 50px;
            display: flex;
            flex-direction: column;
        }

    button{
        background-color: #D36060;
        padding: 5%;
        width: 50%;
        border-radius: 51px;
        margin-top: 10%;
        margin-left: 11%;
        border: 0;
        color: white;
        
    }

    .labelinput{
margin-left: 18%;
margin-top: 7%;
display: flex;
flex-direction: column;
    }

 

    p{
      margin-left: -32%;
    }

.checkinput{

margin-left: -50%;
}


    </style>
  <div class="formulario">
<form action="/cadastrarProdutoToDB" method="post">
         <div class="labelinput">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">
            </div>

   <div class="labelinput">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control"  name = "descricao">
</div>

   <div class="labelinput">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" name="tipo">
            </div>

           <div class="labelinput">
            <label for="sistema">Sistema (pode deixar em branco se não for videogame)</label>
            <input type="text" class="form-control" name="sistema">
            </div>

 <div class="labelinput">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control"  name="quantidade">
            </div>

         <div class="labelinput">
            <label for="preco">Preço</label>
            <input class="form-control" name="preco">
            </div>

            <div class="labelinput">
            <label for="url">URL do produto</label>
            <input type="text" class="form-control" name="url">
            </div>

            <div class="labelinput">
            <label for="categorias">Categorias</label>
            <br>
            <br>
           <?php
                    /*echo "<label for=checkid class=checkboxes>
                    <input id=checkid class=checkboxes type='checkbox' name='".$categoria['id']."' value='".$categoria['id']."'>".$categoria['nome']."</label>";*/
            //<input type="checkbox" name="categoria">
            echo "<div class='checkinput'>";
            foreach ($categorias as $categoria) {
              echo "<label for=checkid class=checkboxes>
              <input id=checkid class=checkboxes type='checkbox' name='".$categoria['id']."' value='".$categoria['id']."'>".$categoria['nome']."</label>";
          };
          echo "</div";
        ?>
        <br>
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
</form>
  
</body>
