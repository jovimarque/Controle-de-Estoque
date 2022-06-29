<?php
	session_start();
	include 'config/conexao.php';
	if(!isset($_SESSION['logado']) || $_SESSION['logado'] != 'SIM' ){
		header("Location:index.php");
	}
?>
<html>
<head>
<meta charset="utf-8">
<title> Login </title>
<link rel="stylesheet" href="css/lista.css">
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
	
	<section id="corpoLista">
			<table>
				<tr>
						
						<th>#</th>
						<th>Categoria</th>
						
				</tr>
				
			<?php
					
					$sql = $conexao->prepare("select * from  categoria");
					$sql->execute();
					$lista = $sql->fetchAll();
					
					foreach($lista  as $listProdutos){
						
						 
					
					
				
			?>
				<tr>
						
						<td><?php echo $listProdutos['id'];?></td>
						<td><?php echo $listProdutos['nome'].'<br>';?></td>
						
					<?php
					}
					?>
				</tr>
			</table>
	</section>
	

</body>
</html>