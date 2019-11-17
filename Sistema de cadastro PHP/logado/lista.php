<?php 
	require_once("servidor.php");
	$comando = "SELECT * FROM produtos ORDER BY id DESC";
	$enviar= mysqli_query($conn, $comando);
	$resultado = mysqli_fetch_all($enviar, MYSQLI_ASSOC);
?>
<table border="2">
	<tr>
    <th>Codigo</th>
    <th>Nome</th> 
    <th>Preço</th>
    <th>Disponibilidade</th>
    <th>Mudar Disponibilidade</th>
    <th>Excluir Produto</th>
  </tr>

 <?php
 foreach ($resultado as $produto) {
 	$id=$produto['id'];
 	$codigo=$produto['codigo'];
 	$nome=$produto['nome'];
 	$preco=$produto['preco'];
 	$disponibilidade=$produto['disponibilidade'];
 	if ($disponibilidade=="1") {
 		$disponibilidade="Disponivel";
 	?>
  	<tr>
    <td><?=$codigo?></td>
    <td><?=$nome?></td> 
    <td>R$  <?=$preco?></td>
    <td><?=$disponibilidade?></td>
    <td><form action="mudar.php" method="get">
		<input type="hidden" name="mudar" value="indisponivel">
		<input type="hidden" name="id" value="<?=$id?>">
		<button type="submit" name="enviar">Indisponivel</button>
    	</form>
	</td>
	<td><form action="excluir.php" method="get">
		<input type="hidden" name="id" value="<?=$id?>">
		<button type="submit" name="enviar">Excluir</button>
    </form>
	</td>
  </tr>
<?php
}else{
	$disponibilidade="Indisponivel";
	?>
	<tr>
    <td><?=$codigo?></td>
    <td><?=$nome?></td> 
    <td>R$  <?=$preco?></td>
    <td><?=$disponibilidade?></td>
    <td><form action="mudar.php" method="get">
		<input type="hidden" name="mudar" value="disponivel">
		<input type="hidden" name="id" value="<?=$id?>">
		<button type="submit" name="enviar">Disponivel</button>
    	</form>
	</td>
	<td><form action="excluir.php" method="get">
		<input type="hidden" name="id" value="<?=$id?>">
		<button type="submit" name="enviar">Excluir</button>
    </form>
	</td>
  </tr>
<?php
}
}
?>
 </table>