<?php
session_start();

 include_once "config/conexao.php";


if(!isset($_SESSION['logado']) || $_SESSION['logado'] != 'SIM'){
  header("Location: index.php?erroCategoria");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Categoria</title>
	<link rel="stylesheet" href="css/categoria.css">
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
	<form  method="POST">
		::Nome categoria
		<br>
		<input type="text" name="nomeCategoria" placeholder=" ex: frutas">
		<br>
		<input type="submit" name="cadastrar" value="cadastrar">
		<?php
		

		if(isset($_POST['cadastrar'])){
				$nomeCategoria = $_POST['nomeCategoria'];
				$sql = $conexao->prepare("SELECT * FROM categoria WHERE  nome = ?");
				$sql->execute(array($nomeCategoria));
				$stmt = $sql->rowCount();
				
		 if(($_POST['nomeCategoria']) == "" || $_POST['nomeCategoria'] == null){
        		echo'<br>';
				echo '<div style="background-color:red; padding:10px;"> Vazio Não pode</div>';
        	exit;
        }
				
				if($stmt >=1 ){
					echo'<br>';
				echo '<div style="background-color:red; padding:10px;"> Já existe</div>';			
					}else{
						$nomeCategoria = $_POST['nomeCategoria'];
						
						$sql = $conexao->prepare(" INSERT INTO categoria VALUES(null,?)");
						$sql->execute(array($nomeCategoria));
						
						echo'<br>';
					echo '<div style="background-color:green; padding:10px; "> Cadastrado</div>';
		}
	}			
						
						
						

	

		?>
	</form>

</div>				



				



		


</body>
</html>