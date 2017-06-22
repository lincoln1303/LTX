<?php 

// Inclui o arquivo de conexão com o Banco de Dados
include("Connections/connection.php");

// Recebe a id do registro que será excluído
$id = $_GET["id"];

// Define o comando SQL para excluir um registro
$sql = "DELETE FROM usuario WHERE id_usuario = $id";

// Executa o comando de exclusão e guarda o resultado (true ou false)
$resultado = mysql_query($sql);

// Verifica se o registro foi excluído corratamente
if ($resultado == true)
	// Se sim, redireciona para o index.php
	header("location:administrativo.php");
else
	// Se não, exibe o erro ocorrido
	echo mysql_error();

?>

