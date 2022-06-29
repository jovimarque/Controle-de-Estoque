<?php
session_start();
include 'config/conexao.php';



if(!isset($_SESSION['logado']) || $_SESSION['logado'] != 'SIM'){
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/produtos.css">
	<title>Produtos</title>

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
	
<div id="corpo">
	<form method="POST">
		::Nome
		<br>
		<input type="text" name="nomeProduto" placeholder="ex: Melancia">
		<br>
		::Quantidade
		<br>
		<input type="text" name="quantidadeProduto" placeholder="ex: 150">
		<br>
		<input type="submit" name="cadastrar" value="cadastrar">
		
		<?php
			
			if(isset($_POST['cadastrar'])){
					$nome = $_POST['nomeProduto'];
					$quantidade = $_POST['quantidadeProduto'];
					$sql = $conexao->prepare("SELECT * FROM produtos WHERE nome = ? AND quantidade = ?");
					$sql->execute(array($nome,$quantidade));
					
					$stmt = $sql->rowCount();
					
					if($_POST['nomeProduto'] == null  && $_POST['quantidadeProduto'] == null){
						echo'<br>';
						echo '<div style="background-color:red; padding:10px;"> Vazio Não pode</div>';
						exit;
						
					}
					
					if($stmt >= 1){
						echo'<br>';
						echo '<div style="background-color:red; padding:10px; ">Já existe</div>';
					}else{
						$nome = $_POST['nomeProduto'];
						$quantidade = $_POST['quantidadeProduto'];
						
						$sql = $conexao->prepare("INSERT INTO produtos VALUES(null, ?,?)");
						$sql->execute(array($nome,$quantidade));
						echo'<br>';
					echo '<div style="background-color:green; padding:10px; "> Cadastrado</div>';
					}
			}

				
		?>
		
		
	</form>
</div>

</body>
</html>