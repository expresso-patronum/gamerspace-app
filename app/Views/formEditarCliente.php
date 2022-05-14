<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
</head>
<body>
<h1 style="color: white; text-align: center; font-size: 1.5em;">Editar cliente</h1>
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
    echo "<form method='post'>";
  ?>    
        <?php
         //<input type="checkbox" name="categoria">
         echo "<div class=labelinput>";
       echo "  <label for='cpf'>CPF:</label>";  
           echo "<input type='text' name='cpf' style='border: transparent;' readonly value='".$cpf."'>";
           echo "</div>";

           echo "<div class=labelinput>";
           echo "  <label for='nome'>Nome:</label>";  
           echo "<input type='text' name='nome' value='".$nome."'>";
           echo "</div>";

 echo "<div class=labelinput>";
           echo "  <label for='email'>E-mail:</label>";  
           echo "<input type='text' name='email' value='".$email."'>";
           echo "</div>";
 
     ?>
         <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
</form>

</div>
</body>
</html>