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

mysql_select_db($database_connection, $connection);
$query_plataforma = "SELECT * FROM plataforma ORDER BY plataforma ASC";
$plataforma = mysql_query($query_plataforma, $connection) or die(mysql_error());
$row_plataforma = mysql_fetch_assoc($plataforma);
$totalRows_plataforma = mysql_num_rows($plataforma);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.lateral_corpo {
	width: 200px;
}
.lateral_corpo p {
	margin: 1px;
	padding: 1px;
}
.lateral_cat_cabecalho {
	background-image: url(imagens/categoria%202.png);
}
.lateral_cat_conteudo {
	width: 180px;
	margin-right: auto;
	margin-left: auto;
	padding-top: 10px;
}
.lateral_cat_menu {
	margin-bottom: 10px;
}
body,td,th {
	color: #FFF;
}
body {
	background-color: #999;
}
</style>
</head>

<body text="#006600" link="#D6D6D6">
<div class="lateral_corpo">
  <h1><strong>CATEGORIA</strong></h1>
  <table width="200">
    <tr>
      <td align="center"><h2><strong>FILMES</strong></h2></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div class="lateral_cat_conteudo">
    <?php do { ?>
      <div class="lateral_cat_menu">
        <p><strong><a href="index.php?lst_filmes&amp;id=<?php echo $row_plataforma['id_plataforma']; ?>"><?php echo $row_plataforma['plataforma']; ?></a></strong></p>
      </div>
      <?php } while ($row_plataforma = mysql_fetch_assoc($plataforma)); ?>
<p>&nbsp;</p>
  </div>
<p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($plataforma);
?>
