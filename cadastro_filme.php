      
      <?php 

include("Connections/connection.php");

// Verifica se foi passado algum dado pelo $_POST
// Ou seja, o tamanho do objeto $_POST é maior que zero
if (count($_POST) > 0) {

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

	// Comando para inserir o novo post o banco
	$sql = sprintf("INSERT INTO filmes(nome, sinopse, youtube, ano) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['sinopse'], "text"),
                       GetSQLValueString($_POST['youtube'], "text"),
					   GetSQLValueString($_POST['ano'], "text"));
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
		<form action="cadastro_filme.php" method="post">

			
			
			
			
			<div class="form-group">
				<label for="nome">Nome</label>
				<textarea id="nome" name="nome" class="form-control" rows="5"></textarea>
			</div>
			
			<div class="form-group">
				<label for="sinopse">Sinopse</label>
				<textarea id="sinopse" name="sinopse" class="form-control" rows="10"></textarea>
			</div>
			
			<div class="form-group">
				<label for="youtube">Youtube</label>
				<input id="senha" name="youtube" class="form-control" value="">
			</div>
				
                <div class="form-group">
				<label for="ano">Ano</label>
				<input id="ano" name="ano" class="form-control" value="">
			</div>

			<a href="index.php" class="btn btn-danger">Cancelar</a>
			<input type="submit" class="btn btn-info btn-lg pull-right" value="Salvar">

			<hr>

		</form>
	</div>

</div>
</body>
</html>