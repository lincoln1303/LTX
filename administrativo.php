<a href="index.php?home"><img src="imagens/inicio.jpg" width="124" height="41" /></a></a> </div>
<br>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style_css/meio.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="conteudo_conteudo">
  <div class="conteudo_cabecalho">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>
    
    <?php 

// Inclui o arquivo de conexão com o banco que está no diretório acima
include("Connections/connection.php");

// Comando SQL que seleciona todos os registros da tabela post
$sql = "SELECT * FROM usuario";

// Executa o comando no banco de dados
$resultado = mysql_query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>


	<meta charset="UTF-8">
	<title> Área administrativa</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

	<div class="container">

		<h1> Site Área Administrativa </h1>

		<hr>

	  <a href="cadastro_usu.php" class="btn btn-info">Novo Cadastro</a>
      
      <a href="incluir_filmes.php" class="btn btn-info">Banco de filmes</a>

		<hr>

		<table class="table table-bordered table-hover table-striped">

			<tr>
				<th>Usuario</th>
				<th> Email </th>
				<th> Senha </th>
				<th>Ações</th>
			</tr>

			<?php while($usuario = mysql_fetch_assoc($resultado)) : ?>

				<tr>
					<td><?php echo $usuario["usuario"] ?></td>
					<td><?php echo $usuario["email"] ?></td>
					<td><?php echo $usuario["senha"] ?></td>
					<td>
						<a href="edicao.php?id=<?php echo $usuario["id_usuario"] ?>" class="btn btn-warning">Editar</a>
						<a href="exclusao.php?id=<?php echo $usuario["id_usuario"] ?>" class="btn btn-danger">Excluir</a>
					</td>
				</tr>

			<?php endwhile; ?>

			
		</table>		

	</div>

</body>
</html>
    
    
    
    
    
    ;</p>
  </div>
  <div class="conteudo_meio">
    <div class="conteudo_meio1">
      <p>&nbsp;</p>
    </div>
  </div>
  <div class="conteudo_rodape"></div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>