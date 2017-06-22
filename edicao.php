      
      <?php 

include("Connections/connection.php");

// Verifica se foi passado algum dado pelo $_POST
// Ou seja, o tamanho do objeto $_POST é maior que zero
if (count($_POST) > 0) {

	// Comando para inserir o novo post o banco
	$sql = "UPDATE usuario SET 
					usuario = '{$_POST["usuario"]}',
					email = '{$_POST["email"]}',
					senha = '{$_POST["senha"]}'
			WHERE id_usuario = {$_POST["id"]}";

	// Executa o comando de INCLUSÃO e guarda o resultado (true ou false)
	$resultado = mysql_query($sql);

	// Verifica se o registro foi inserido corretamente
	if ($resultado == true)
		// Se sim, redireciona para o index.php
		header("location:administrativo.php");
	else {
		// Se não, exibe o erro ocorrido
		echo mysql_error();
		die();
	}

} else {

	$id = $_GET["id"];

	// Seleciona apenas o post que possui a id fornecida
	$sql = "SELECT * FROM usuario WHERE id_usuario = $id";

	// Executa o comando e guarda o seu resultado na var resultador
	$resultado = mysql_query($sql);

	// Verifica quantos registros foram retornados
	$quantidade = mysql_num_rows($resultado);

	// Verifica se nenhum post foi encontrado
	if ($quantidade == 0)
		// Se não foi encontrado, redireciona para o index.php
		header("location:index.php");
	else
		// Pega o resultado e converte para um vetor
		$usuario = mysql_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Blog - Área administrativa</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

	<div class="container">
		<h1> Área Administrativa</h1>
		<hr>
		<form action="edicao.php" method="post">

			<input type="hidden" id="id" name="id" value="<?php echo $usuario["id_usuario"] ?>">
			
			
			
			<div class="form-group">
				<label for="usuario">usuario</label>
				<textarea id="usuario" name="usuario" class="form-control" rows="5"><?php echo $usuario["usuario"] ?></textarea>
			</div>
			
			<div class="form-group">
				<label for="email">email</label>
				<textarea id="email" name="email" class="form-control" rows="10"><?php echo $usuario["email"] ?></textarea>
			</div>
			
			<div class="form-group">
				<label for="senha">senha</label>
				<input id="senha" name="senha" class="form-control" value="<?php echo $usuario["senha"] ?>">
			</div>
				

			<a href="index.php" class="btn btn-danger">Cancelar</a>
			<input type="submit" class="btn btn-info btn-lg pull-right" value="Salvar">

			<hr>

		</form>
	</div>

</div>
</body>
</html>