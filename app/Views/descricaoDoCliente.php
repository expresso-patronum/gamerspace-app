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

button{
    background: #D36060;
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
    font-family: Roboto;
}
p{
    color: white;
}

#descricao{
    width: 300px;
height: 300px;
    margin-top: 2%;
margin-left: 5%;
    
  
    }

a{
 text-decoration: none;
 color: black;
}
a:hover{
 text-decoration: none;
 color: black;
}

#produtos {
    margin-top: 5%;
    margin-left: 33%;
}

td{
    color: white;
    font-size: 1.2em;
}
.nome {
    width: 180px;
    text-align: center;
}

.quantidade {
    width: 180px;
    text-align: center;
}
.preco {
    width: 180px;
    text-align: center;
}

.produtosImage {
    width: 80px;
    height: 70px;
}
#idInput{
display: none;
}

h5 {
    color: white;
    margin-top: 2%;
    margin-left: 5%;
}

h3 {
    color: white;
    margin: auto;
    margin-left: 12%;
}

.total {
    text-align: right;
    padding-right: 2%;
}
</style>
<body>

<nav>
<img src= "<?php echo base_url('gamerSpaceNavLogo.jpg'); ?>" id="logo"/>
    <ul>
        <li><a href='/rankings'>Rankings</a></li>
        <li><a href='/categorias'>Categorias</a></li>
        <li><a href='/clientes'>Clientes</a></li>
        <li><a href='/'>Produtos</a></li>
</ul>
</nav>

<?php 
//echo "<button><a href='/formExcluirProduto/".$produto['id']."></a></button>";

//echo "<button><a href='/formExcluirCliente/".$cliente['cpf']."'>Excluir</a></button>";
?>

<?php

/*
echo '<form action="/formEditarCliente" method="POST" id="form1">
<input id="idInput" name="id" value="'.$cliente['cpf'].'" />
<button type="submit" form="form1" value="Editar">Editar</button>
</form>';*/

echo "<button><a href='/formEditarCliente/".$cliente['cpf']."'>Editar</a></button>";
echo "<button><a href='/deleteCliente/".$cliente['cpf']."'>Excluir</a></button>";

 echo "<h1>Cliente: ".$cliente['nome']."</h1>";
 echo "<h5>CPF: ".$cliente['cpf']."</h5>";
 echo "<h5>E-mail: ".$cliente['email']."</h5>";

echo '<div id="produtos">';
    foreach ($produtos as $produto) {
        echo '<table border=collapse>';
        echo '<tr>';
        echo '<td class=url><img src= '.$produto['url'].' class=produtosImage></img></td>';
        echo '<td class=nome>'.$produto['nome'].'</td>';
        //echo '<td class=quantidade>'.$produto['quantidade'].'</td>';
        echo '<td class=preco>R$ '.floatval($produto['preco']).'</td>';
        echo '</tr>';

//echo "<p>".$cliente['nome']."</p>"."<a style='color: white;' href='/detalharCliente'>".'➜'."</a>";
    };
    $subtotal = 0;
    foreach($produtos as $produto) {
        $subtotal += floatval($produto['preco']);
    }

    echo '<tr>';
    if(count($produtos) == 0) { echo '<h3>Sem compras :(</h3>'; } else {
    echo '<td colspan=3 class=total>Subtotal: R$ '.$subtotal.'</td>'; }
    echo '</tr>';
    echo '</table>';
    echo '</div>';
    
?>
<br><br>
</body>
