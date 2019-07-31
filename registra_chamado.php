<?php 
	require_once 'db.php';

		if(!empty($_POST['titulo']) && !empty($_POST['categoria']) && !empty($_POST['descricao'])){

			$titulo = $_POST['titulo'];
			$categoria = $_POST['categoria'];
			$descricao = $_POST['descricao'];

			$sql = "INSERT INTO chamado VALUES (?,?,?,?)";
			$stmt= $conexao->prepare($sql);
			$stmt->execute([' ', $titulo, $categoria, $descricao]);

			if($stmt->rowCount() == 1){
				header("Location: abrir_chamado.php?cadastro=sucesso");
			}
		}else{
			header("Location: abrir_chamado.php?cadastro=erro_form");
		}

?>