<?php

require_once "db.php";

$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'Administrativo', 2 => 'Usuario');

$query_user = "SELECT * from usuario";
$stmt = $conexao->query($query_user);
$usuarios = $stmt->fetchAll();
//print_r($usuarios);

	foreach ($usuarios as $user) {

		$usuario = $user['email'];
		$senha = $user['senha'];

		if($usuario == $_POST['email'] && $senha == $_POST['senha']){
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['fk_perfil_id'];
		}
	}

	if ($usuario_autenticado == true) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['fk_perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');
	}else{
		$_SESSION['autenticado'] = 'NÃO';
		header('Location: index.php?login=erro');
	}



?>