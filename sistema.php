<?php
session_start();
include 'config/conexao.php';
if(!isset($_SESSION['logado']) || $_SESSION['logado'] != 'SIM'){
  header("Location: index.php?erroSistema");
  
 
}
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Estocar</title>
	<link rel ="stylesheet" href="css/sistema.css">
	<style>
		 *{ 
	margin:0px;
	padding:0px;
 }

body{
	background-color:#2980b9;
}


 nav {
 	margin:0px auto;
 	width: 50%;
 	border:1px solid black;
 }

 nav ul{
 	list-style-type: none;
 	text-align: center; 

 }

nav li{
	display: inline;
}

nav li a {
	color:lightblue;
	margin:5px;
	text-decoration:none;
}

nav li a:hover{
	color:darkblue;
}
.corpo{
	width:45%;
	margin:7% auto;
	padding:10px;
	background-color:white;
	text-align:center;
	
}
.corpo h3{
	font-size:60px;
}
	</style>
	
	
</head>
<body>

	<nav>
		<ul>
		<li><a href="sistema.php">Principal</a></li>
		<li><a href="categoria.php">Criar Categoria</a></li>
		<li><a href="produtos.php">Adicionar Produto</a></li>
		<li><a href="listaProdutos.php"> Lista de Categoria</a></li>
		</ul>
	</nav>
	
		
	<?php
	$sql = $conexao->prepare("SELECT * FROM categoria");
	$sql->execute();
	$verifica = count($sql->fetchAll());
	
	
	?>
	
	<div class="corpo"> 
	<h1> Categorias já registradas </h1>
	<h3> <?php echo $verifica; ?></h3>
	</div>
	
	
	<?php
	$sql = $conexao->prepare("SELECT * FROM produtos");
	$sql->execute();
	$verificaProdutos = count($sql->fetchAll());
	
	?>
	
	
	<div class="corpo"> 
	<h1> Produtos disponiveis </h1>
	<h3> <?php echo $verificaProdutos; ?></h3>
	</div>

</body>
</html>