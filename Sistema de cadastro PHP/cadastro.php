<?php
session_start();
include_once("servidor.php");
if (!empty($_SESSION['mensagem'])) {
		echo $_SESSION['mensagem'];
		unset($_SESSION['mensagem']);
	}

?>
	<form action="cadastrar.php" method="get" accept-charset="utf-8">
	Nome<br>
    <input type="text" name="nome"><br>
	Login<br>
	<input type="text" name="login"><br>
	Senha<br>
	<input type="password" name="senha"><br><br>
	<input type="submit" name="enviar" value="Cadastrar">
	</form>
	<a href="index.php"><button>Voltar</button></a>	