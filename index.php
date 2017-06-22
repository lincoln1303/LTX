<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style_css/principal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="corpo">
  <div class="cabecalho">
 
  <?php 
  $cabecalho = "cabecalho.php";
  include ("$cabecalho");
   ?> <p>&nbsp;</p>
  
  <div class="lateral_home"></div>
  <a href="index.php?home">
  <br>
  <br />
 
  <img src="imagens/inicio.jpg" width="124" height="41" /></a> <p>&nbsp;</p> 
  </div>
  
  
  <div class="corporPrincipal">
   
  <div class="lateral">
  <p><?php
  $lateral = "lateral.php";
  include ("$lateral");
  ?></p>
 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  </div>
  <div class="conteudo_conteudo">
   
<?php
	$home = "home.php";
	$lst_filmes = "lst_filmes.php";
	$cadastro_usu = "cadastro_usu.php";
	
	if (isset($_GET['home'])) {
		include ("$home");
		}
		else if (isset ($_GET['lst_filmes'])) {
			include ($lst_filmes);
			}
			
			else if (isset ($_GET['usu'])) {
			include ($cadastro_usu);
			}
	
	?>
    <br />
    <br />
    </div>
    <div class="conteudo_cabecalho"></div>
    <div class="conteudo_meio">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      
      <p>&nbsp;</p>
    </div>
    <div class="conteudo_rodape"></div>
    <p>&nbsp;</p>
    <p></p>
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div class="separa"></div>
</div>
<p>&nbsp;</p>
  <div class="rodape">
  <?php 
  $rodape = "rodape.php";
  include ("$rodape");
   ?>
   </div>
</div>
</body>
</html>