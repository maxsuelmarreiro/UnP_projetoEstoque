<?php 
	$usuario 	= 	"root";
	$senha 		= 	"";
	$banco 		= 	"estoque";
	$host 		= 	"localhost";

	$conexao = mysqli_connect($host,$usuario,$senha,$banco);
	
    if(mysqli_connect_errno($conexao)) trigger_error(mysqli_connect_error());    
?>