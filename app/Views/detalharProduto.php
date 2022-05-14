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

input {
    margin-left: 7%;
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
hr {
    border-top: 2px solid white;
    margin-top: 5%;
}
h3{
    color: white;
    margin-left: 1.5%;
}
#formCadastrarUsuarioProduto{
margin: auto;

}

button{
    margin-top: 5%;
    margin-left: 5%;
    border: none;
    font-family: Roboto;
    color: white;
}
p{
    color: white;
}

#produtoImage{
    width: 400px;
    margin-bottom: 2%;
}

#descricao{
margin-left: 3%;
    }

a{
 text-decoration: none;
 color: black;
}
a:hover{
 text-decoration: none;
 color: black;
}

#idInput{
display: none;
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

echo "<button><a href='/formExcluirProduto/".$produto['id']."'>Excluir</a></button>";
?>

<?php


echo "<button><a href='/formEditarProduto/".$produto['id']."'>Editar</a></button>";
echo "<br>";
echo "<br>";
echo "<div id='descricao'>";
echo "<img src= '".$produto['url']."' id='produtoImage'/>";
 echo "<p>Descrição: ".$produto['descricao']."</p>";
 echo "<p>Preço: R$ ".floatval($produto['preco'])."</p>";
 echo "<p>Quantidade: ".intval($produto['quantidade'])." unidade(s)</p>";
 echo "<p>".$produto['tipo']."</p>";

 if($produto['sistema']!==NULL && $produto['sistema'] !== []){
    echo "<p>".$produto['sistema']."</p>";
 }
echo "<p>| ";
 foreach($categorias as $categoria) {
     
    echo "".$categoria." | ";
 }
 echo "</p>";
echo "</div>";
?>
<hr>
<h3>Formulário para o cliente comprar</h3>

<form action=<?php echo base_url('/cadastrarUsuarioProduto/'.$produto['id']) ?> id="formCadastrarUsuarioProduto" method='post'>

<input type="text" name="nome"  placeholder='Usuário'></input>

<input type="number" name="quantidade" placeholder='Quantidade'></input>

<button type='submit' value="Submit">Adicionar compra ao usuário</button>
</form>
<br><br>
</body>

</body>
