<?php
session_start();
include_once("servidor.php");

	if (isset($_GET['enviar'])) {
		if (!empty($_GET['nome']) || !empty($_GET['login']) || !empty($_GET['senha'])){
			$nome=$_GET['nome'];
			$login=$_GET['login'];
			$senha=MD5($_GET['senha']);

			$comando="INSERT INTO usuario(login, senha, nome) VALUES ('$login', '$senha', '$nome')";
			$enviar=mysqli_query($conn, $comando);
			if ($enviar) {
				$_SESSION['mensagem']="Cadastrado com Sucesso";
				header("location:index.php");
				exit;
			}else{
				$_SESSION['mensagem']="Erro ao cadastrar";
				header("location:cadastro.php");
				exit;
			}
		}else{
			$_SESSION['mensagem']="Algum dos campos ficou em branco";
			header("location:cadastro.php");
			exit;
		}
	}else{
		header("location:index.php");
		exit;
	}
?>