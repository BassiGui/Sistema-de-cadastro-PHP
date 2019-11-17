<?php
session_start();
require_once("servidor.php");

if (isset($_GET['enviar'])) {
	if (!empty($_GET['id'])) {
		$id=$_GET['id'];
		$comando="DELETE FROM produtos WHERE id ='$id'";
		$enviar=mysqli_query($conn, $comando);
		if ($enviar) {
			header("location:lista.php");
			exit;
		}else{
			$_SESSION['mensagem']="Erro ao excluir produto";
			header("location:lista.php");
			exit;
		}
	}
}else{
	header("location:../");
			exit;
}