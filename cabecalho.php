<?php require_once('Connections/connection.php'); ?>

<?php
session_start();

?>

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

$colname_usu_logado = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usu_logado = $_SESSION['MM_Username'];
}
mysql_select_db($database_connection, $connection);
$query_usu_logado = sprintf("SELECT * FROM usuario WHERE usuario = %s", GetSQLValueString($colname_usu_logado, "text"));
$usu_logado = mysql_query($query_usu_logado, $connection) or die(mysql_error());
$row_usu_logado = mysql_fetch_assoc($usu_logado);
$totalRows_usu_logado = mysql_num_rows($usu_logado);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.cabecalho_cab {
	height: 300px;
	width: 1000px;
	margin-top: auto;
	margin-right: auto;
	margin-bottom: 20px;
	margin-left: auto;
}
a:link {
	color: #F00;
}
a:visited {
	color: #FFF;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.cabecalho_cab div p {
	margin: 0px;
	padding: 0px;
}
.op_adm {
	margin-top: auto;
	margin-right: auto;
}
.op_adm {
}
</style>
</head>

<body>
<div class="cabecalho_cab"><img src="imagens/cabeçalho.jpg" width="1001" height="241" />
<br/><br />
<div> 
  <div class="op_adm">
    <p><a href="administrativo.php">Acesso Administrativo</a></p>
  </div>
  <p>&nbsp;</p>
  <p><a href="cadastro_usu.php"><strong>Cadastro Usuario: </strong></a> 
    <strong><br>
      
    <a href="logar.php">Login</a></strong>: Você está logado como: <?php echo $row_usu_logado['usuario']; ?></p>
 
  <p>
  
 <a href='logar.php'.md5(session_id())>Sair</a>;

  </p>
</div>
 <br/>
</div>
</body>
</html>
<?php
mysql_free_result($usu_logado);
?>
