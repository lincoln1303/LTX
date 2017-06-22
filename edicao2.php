      
      <?php 

include("Connections/connection.php");

// Verifica se foi passado algum dado pelo $_POST
// Ou seja, o tamanho do objeto $_POST é maior que zero
if (count($_POST) > 0) {

	// Comando para inserir o novo post o banco
	$sql = "UPDATE filmes SET 
					id = '{$_POST["id"]}',
					nome = '{$_POST["nome"]}',
					sinopse = '{$_POST["sinopse"]}',
					youtube = '{$_POST["youtube"]}',
					ano = '{$_POST["ano"]}'
			WHERE id = {$_POST["id"]}";

	// Executa o comando de INCLUSÃO e guarda o resultado (true ou false)
	$resultado = mysql_query($sql);

	// Verifica se o registro foi inserido corretamente
	if ($resultado == true)
		// Se sim, redireciona para o index.php
		header("location:incluir_filmes.php");
	else {
		// Se não, exibe o erro ocorrido
		echo mysql_error();
		die();
	}

} else {

	$id = $_GET["id"];

	// Seleciona apenas o post que possui a id fornecida
	$sql = "SELECT * FROM filmes WHERE id = $id";

	// Executa o comando e guarda o seu resultado na var resultador
	$resultado = mysql_query($sql);

	// Verifica quantos registros foram retornados
	$quantidade = mysql_num_rows($resultado);

	// Verifica se nenhum post foi encontrado
	if ($quantidade == 0)
		// Se não foi encontrado, redireciona para o index.php
		header("location:incluir_filmes.php");
	else
		// Pega o resultado e converte para um vetor
		$filme = mysql_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Blog - Area administrativa</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

	<div class="container">
		<h1> BANCO DE FILMES</h1>
		<hr>
		<form action="edicao2.php" method="post">

			<input type="hidden" id="id" name="id" value="<?php echo $filme["id"] ?>">
			
			
			
			<div class="form-group">
				<label for="nome">Nome</label>
				<textarea id="nome" name="nome" class="form-control" rows="5"><?php echo $filme["nome"] ?></textarea>
			</div>
			
			<div class="form-group">
				<label for="sinopse">Sinopse</label>
				<textarea id="sinopse" name="sinopse" class="form-control" rows="10"><?php echo $filme["sinopse"] ?></textarea>
			</div>
			
			<div class="form-group">
				<label for="youtube">Youtube</label>
				<input id="senha" name="youtube" class="form-control" value="<?php echo $filme["youtube"] ?>">
			</div>
				
                <div class="form-group">
				<label for="ano">Ano</label>
				<input id="ano" name="ano" class="form-control" value="<?php echo $filme["ano"] ?>">
			</div>

			<a href="index.php" class="btn btn-danger">Cancelar</a>
			<input type="submit" class="btn btn-info btn-lg pull-right" value="Salvar">

			<hr>

		</form>
	</div>

</div>
</body>
</html>