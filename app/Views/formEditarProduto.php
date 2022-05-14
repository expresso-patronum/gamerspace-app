<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>
<h1 style="color: white; text-align: center; font-size: 1.5em;">Editar produto</h1>
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
<?php
    echo "<form action='/editarProduto/".$data['id']."' method='post'>";
  ?>    
        <?php
         //<input type="checkbox" name="categoria">
         echo "<div class=labelinput>";
       echo "  <label for='id'>Id:</label>";  
           echo "<input type='text' name='id' style='border: transparent;' readonly value='".$data['id']."'>";
           echo "</div>";

           echo "<div class=labelinput>";
           echo "  <label for='nome'>Nome:</label>";  
           echo "<input type='text' name='nome' value='".$data['nome']."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='descricao'>Descrição:</label>";  
           echo "<input type='text' name='descricao' value='".$data['descricao']."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='tipo'>Tipo:</label>";  
           echo "<input type='text' name='tipo' value='".$data['tipo']."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='sistema'>Sistema: (pode ser deixado em branco se não for videogame)</label>";  
           echo "<input type='text' name='sistema' value='".$data['sistema']."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='quantidade'>Quantidade:</label>";  
           echo "<input type='number' name='quantidade' value='".$data['quantidade']."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='preco'>Preço:</label>";  
           echo "<input type='number' name='preco' value='".$data['preco']."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='url'>URL:</label>";  
           echo "<input type='text' name='url' value='".$data['url']."'>";
           echo "</div>";

           echo '<div class="labelinput">';
echo '<label for="categorias">Categorias</label>';
echo '<br>';
echo '<br>';

           /*echo "<div class=labelinput>";*/
           echo "<div class='checkinput'>";
           foreach ($categorias as $categoria) {
            echo "<label for=checkid class=checkboxes>
            <input id=checkid class=checkboxes type='checkbox' name='".$categoria['id']."' value='".$categoria['id']."'>".$categoria['nome']."</label>";
        };
        echo "</div>";
  
 
     ?>
     <br>
         <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
</form>
<br>
</div>
</body>
</html>