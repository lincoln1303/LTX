<?php 

// Inclui o arquivo de conexão com o Banco de Dados
include("Connections/connection.php");

// Recebe a id do registro que será excluído
$id = $_GET["id"];

// Define o comando SQL para excluir um registro
$sql = "DELETE FROM filmes WHERE id = $id";

// Executa o comando de exclusão e guarda o resultado (true ou false)
$resultado = mysql_query($sql);

// Verifica se o registro foi excluído corratamente
if ($resultado == true)
	// Se sim, redireciona para o incluir_filmes.php
	header("location:incluir_filmes.php");
else
	// Se não, exibe o erro ocorrido
	echo mysql_error();

?>

