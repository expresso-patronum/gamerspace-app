<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    *{
        font-family: 'Roboto', sans-serif;
       font-size: 0.95em;
    }

body{

background: #201335;

}


nav{
    background-color: #F6C5AF;
    display: flex;
    align-items: center;
}
ul{
    display: flex;
    margin-left: 70%
}
li{
    list-style: none;
    margin-right: 0.5%;
    padding: 2%;
}

li:hover{
    color: #D36060;
    cursor: pointer;
}
#logo{
    width: 7%;
    margin:0;
}
h1{
    color: white;
    margin-left: 38%;
}
button{
    margin-top: 5%;
    margin-left: 5%;
    border: none;
    color: white;
    background-color: transparent;
}
p{
    color: white;
    font-size: 1.2em;
}

input{
  
  display:none;
}

a{
 text-decoration: none;
 color: black;
}
a:hover{
 text-decoration: none;
 color: black;

}

#buttonCadastrar{
    background: #D36060;
    margin-top: 5%;
    margin-left: 5%;
    border: none;
    font-family: Roboto;
}
#clientes {
    margin-top: 5%;
    margin-left: 41%;
}
td{
    color: white;
    font-size: 1.2em;

}

.nome {
    width: 180px;
    text-align: center;
}
</style>
<body>

<nav>
    <img src= "gamerSpaceNavLogo.jpg" id="logo"/>
    <ul>
        <li><a href='/rankings'>Rankings</a></li>
        <li><a href='/categorias'>Categorias</a></li>
        <li><a href='/clientes'>Clientes</a></li>
        <li><a href='/'>Produtos</a></li>
</ul>
</nav>

<button id='buttonCadastrar'><a href='/cadastroCliente' style="color: white;">Cadastrar cliente</a></button>
<h1>Nossos clientes</h1>


<?php
/*
echo '<div id="clientes">';
    foreach ($clientes as $cliente) {
echo "<div class='cliente' ><form method='post' action='/descricaoDoCliente'> 
      <input name= 'cliente' value=".intval($cliente['cpf'])."></input>

      <button type='submit'>".$cliente['nome']."</button>  
</form>
'</div>';";
//echo "<p>".$cliente['nome']."</p>"."<a style='color: white;' href='/detalharCliente'>".'➜'."</a>";
    };
    echo '</div>';*/
 
echo '<div id="clientes">';
    foreach ($clientes as $cliente) {
        echo '<table border=collapse>';
        echo '<tr>';
        echo "<td class=nome><a href='/descricaoDoCliente/".$cliente['cpf']."' style='color:white'>".$cliente['nome']."</a></td>";
        echo '</tr>';
        echo '</table>';

        /*echo "<div class='cliente' ><form method='post' action='/descricaoDoCliente'> <input name= 'cpf' value= ".$cliente['cpf'].">".$cliente['cpf']." </input>
       <button type='submit' style='color:white'>".$cliente['nome']."</button>  
       </form> </div>";*/


    };
    echo '</div>';?>
    
    


</body>
