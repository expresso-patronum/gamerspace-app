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

}

.produtosImage{
    width: 200px;
    height: 200px;
}

#produtos{
    display: flex;
    flex-wrap: wrap;
    margin-left: 3%;
    margin-top: 5%;
}

.produto{
    display: flex;
    flex-direction: column;
    justify-content: center;
  flex-wrap: wrap; 
   align-items: center;
}
a{
 text-decoration: none;
 color: black;
}
a:hover{
 text-decoration: none;
 color: black;
}

h4{
    color: white;
    float: left;
    margin-left: 3%;

}

.filtros {
    display: flex;
    margin-left: 2%;
}
#produtoImage{
    width: 400px;
    margin-bottom: 2%;
}

#produtoButton {
inline-size: 150px;
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

<button><a href='/cadastrarProduto' style="color: white">Cadastrar produto</a></button>
<h1>Nossos produtos</h1>


<?php
echo"<br>";
echo"<br>";
echo "<h4>Filtros</h4>";
echo "<br>";
echo "<br>";
echo "<div class='filtros'>";
echo "<form method='post' action='/pesquisar'>";
echo "<input type='text' name='pesquisa'>";
echo '<button type="submit">Pesquisar</button>';
echo"</form>";



echo "<form method='post' action='/'>";
echo "<select name='categoriaFiltro'>";
foreach ($categorias as $categoria){
 echo  "<option value=".$categoria['id'].">".$categoria['nome']."</option>";
}
echo "</select>";
echo '<button type="submit">Filtrar</button>';
echo "</form>";
echo "</div>";
echo "<br>";
echo '<div id="produtos">';
    foreach ($data as $produto){
        echo "<div class='produto' ><form method='post' action='/descricaoDoProduto/".$produto['id']."'>
      <img src= '".$produto['url']."' class = 'produtosImage' />
       <button type='submit' style='color:white' id='produtoButton'>".$produto['nome']."</button>  
       </form> </div>";

    };
    echo '</div>';?>
</body>
