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
    margin-top: 2%;
    color: white;
    text-align: center;
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

input{
  
  display:none;
}

#produtosImage{
    width: 200px;
    height: 200px;
}

#produtos{
    display: flex;
}

.produto{
    display: flex;
    flex-direction: column;
    justify-content: center;
   align-items: center;
}
a{
 text-decoration: none;
 color: black;
}
a:hover{
 text-decoration: none;
 color : black;
}

h3, h5{
    color: white;

}

#ranking{
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

<h1>Nossos Rankings</h1>
<br>
<div id='ranking'>
<h3>Produto de maior quantidade</h3>

<?php
echo "<h5>".$maiorQtd['nome']."</h5>";
echo "<br>";
echo "<div id='descricao'>";
echo "<img src= '".$maiorQtd['url']."' id='produtosImage'/>";
echo "<p>Quantidade: ".intval($maiorQtd['quantidade'])." unidade(s)</p>";
echo "<a href= '/descricaoDoProduto/".$maiorQtd['id']."' style='color:white'>Ver página do produto</a>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h3>Produto mais caro</h3>";

echo "<h5>".$maisCaro['nome']."</h5>";
echo "<br>";
echo "<div id='descricao'>";
echo "<img src= '".$maisCaro['url']."' id='produtosImage'/>";
echo "<p>Preço: R$ ".floatval($maisCaro['preco'])."</p>";
echo "<a href= '/descricaoDoProduto/".$maisCaro['id']."' style='color:white'>Ver página do produto</a>";
?>
</div>
<br>
<br>

</body>
