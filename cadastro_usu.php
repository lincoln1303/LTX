<a href="index.php?home"><img src="imagens/inicio.jpg" width="124" height="41" /></a></a> </div>
<br>

<?php require_once('Connections/connection.php'); ?>
<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
// inserir cadastro inicio

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
// Evitar cadastro duplicado
 $insertSQL = mysql_query ("SELECT * FROM usuario WHERE usuario = '".$_POST["usuario"]."'");

if (mysql_num_rows($insertSQL) >= 1) { echo"<meta http-equiv='refresh' content='0;URL=index.php?usu'>
script type=\"text/javascript\">
Alet(\"Este nome de usuário já existe!\");
</script>"; }
else
{	



	
  $insertSQL = sprintf("INSERT INTO usuario (usuario, email, senha, assinatura) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString(isset($_POST['assinatura']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));

}
}
// Inserir cadastro Final



mysql_select_db($database_connection, $connection);
$query_usuario = "SELECT * FROM usuario";
$usuario = mysql_query($query_usuario, $connection) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style_css/meio.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	color: #FFF;
}
body {
	background-image: url(imagens/plano%20de%20fundo%203.jpg);
}
</style>
</head>

<body>
<div class="conteudo_conteudo">
  <div class="conteudo_cabecalho"></div>
  <div class="conteudo_meio">
    <div class="conteudo_meio1">
      <p><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Usuario:</td>
      <td><input type="text" name="usuario" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Senha:</td>
      <td><input type="password" name="senha" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap">&nbsp;</td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estou ciente dos 
      <br />
      termos de uso, e quero <br />
      fazer minha assinatura:</td>
      <td><span id="sprycheckbox1">
        <br />
        <input type="checkbox" name="assinatura" value="" />
        <span class="checkboxRequiredMsg">Assinatura obrigatória !!!</span></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Cadastrar" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form></p>
    </div>
  </div>
  <div class="conteudo_rodape"></div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

<p>&nbsp;</p>
<script type="text/javascript">
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
</script>
</body>
</html>
<?php
mysql_free_result($usuario);
?>
