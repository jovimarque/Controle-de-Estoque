<?php
	
session_start();
include "config/conexao.php";
?>
<html>
<head>
<meta charset="utf-8">
<title> Login </title>
<link rel="stylesheet" href="css/index.css">
</head>
<body>
	
	<section id="corpoLogin">
		<div id="banner">teste</div>
			
		<form id="LoginArea" method="post">
			::Login
			<br>
			<input type="text" name="login">
			<br>
			::Senha
			<br>
			<input type="password" name="senha">
			<br>
			<input type="submit" name="entrar" value="Entrar">
			
			<?php
			
			
			if(isset($_POST['entrar'])){
				$login = $_POST['login'];
				$senha = $_POST['senha'];
				$verificar = $_SESSION['logado'];
				
 				
				$sql = $conexao->prepare("SELECT * FROM user");
				$sql->execute();
				$stmt = $sql->fetchAll();
				
				
				
				foreach($stmt as  $usuario){
					
					
					if($login == $_POST['login'] && $senha == $_POST['senha']){
						echo 'Sucesso';
						$verificado = true;
						header("Location: sistema.php");
					}else{
						echo 'Erro';
					}	
						if($verificar){
							$_SESSION['logado']= 'SIM';
							
							
						}else{
							
							$_SESSION['logado']= 'NÃO';
							header("Location: index.php");
						}
				}
				
			}
					


					
			?>
		
		</form>
	</section>
	

</body>
</html>