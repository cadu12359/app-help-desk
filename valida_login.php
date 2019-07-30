<?php
session_start();

$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'Administrativo', 2 => 'Usuario');

$usuarios = array(
	array('id' => 1, 'email' => 'admin@admin.com.br', 'senha'=> '123', 'perfil_id' => 1),
	array('id' => 2, 'email' => 'teste@teste', 'senha'=> 'teste', 'perfil_id' => 2),
);

	foreach ($usuarios as $user) {

		$usuario = $user['email'];
		$senha = $user['senha'];

		if($usuario == $_POST['email'] && $senha == $_POST['senha']){
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		}
	}

	if ($usuario_autenticado == true) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');
	}else{
		$_SESSION['autenticado'] = 'NÃO';
		header('Location: index.php?login=erro');
	}



?>