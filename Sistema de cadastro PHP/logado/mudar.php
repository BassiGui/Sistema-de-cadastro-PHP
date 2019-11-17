<?php
session_start();
require_once("servidor.php");
	if (isset($_GET['enviar'])) {
		if (!empty($_GET['mudar']) || !empty($_GET['id'])) {
			$mudar=$_GET['mudar'];
			$id=$_GET['id'];

			if ($mudar=="disponivel") {
				$comando="UPDATE produtos SET disponibilidade = 1 WHERE id = '$id'";
			}else{
			$comando="UPDATE produtos SET disponibilidade = 0 WHERE id = '$id'";
			}
			$enviar=mysqli_query($conn, $comando);
			if ($enviar) {
				header("location:lista.php");
				exit;
			}else{
				$_SESSION['mensagem']="Erro ao mudar disponibilidade";
				header("location:lista.php");
			exit;
			}
		}
	}

?>