<?php 
	require_once "validador_acesso.php";
	
	$dns = "mysql:host=localhost;dbname=help_desk";
	$user="root";
	$pwd="";

	try{
		$conexao = new PDO($dns, $user, $pwd);


	}catch(PDOException $e){
		echo "Error: ". $e->getCode() . 'Message: ' . $e->getMessage();;
	}
?>