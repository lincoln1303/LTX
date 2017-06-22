<?php

//Inclui o arquivo de conexão com o banco que está no diretório a cima
include("Connections/connection.php");

//Comando SQL que seleciona todos os registros da tabela post
$sql = "SELECT * FROM filmes";

//Executa o comado no banco de dados
$resultado = mysql_query($sql);

function formatadata($data){

	$data = explode ('-', $data);
	$data = array_reverse ($data);
	return implode("/", $data);

}
?>
<!DOCTYPE html>


<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title> Banco de filmes</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	
<div class="container-fluid">
		
		<h1> BANCO DE FILMES </h1>
<hr>

		<a href="cadastro_filme.php" class="btn btn-info"> Incluir Filmes </a>

		<hr>
		<hr>


		        <hr>

		<table class= "table table-bordered table-hover table-sriped">

			<tr>
				<th>Nome</th> 
				<th>Sinopse</th> 
				<th>Capa</th> 
				<th>Link</th> 
                <th>Ações</th>

			</tr>

			<?php while ($passagem= mysql_fetch_assoc($resultado)) : ?> 
			
				<tr>
					<td><?php echo formatadata ($passagem["nome"]) ?></td>
					<td><?php echo $passagem["sinopse"] ?></td>
					<td><img src="https://i.ytimg.com/vi/<?php echo $passagem["youtube"] ?>/hqdefault.jpg" alt=""></td>
					<td><a href="https://www.youtube.com/watch?v=<?php echo $passagem["youtube"] ?>" class="btn btn-info" target="_blank">Trailer</a></td
					>
				</td>
                <td>
                <a href="edicao2.php?id=<?php echo $passagem["id"] ?>" class="btn btn-warning">Editar</a>
						<a href="exclusao2.php?id=<?php echo $passagem["id"] ?>" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			
		<?php endwhile; ?>
		</table>

		</div>


</body>
</html>

