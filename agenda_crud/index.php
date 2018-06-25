<?php include("conexao.php");
	$grupo = selectAllPessoa();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Agenda Pessoal</h1>
	<a href="inserir.php">Add Pessoa</a>
	<table border="1">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Nascimento</th>
				<th>Telefone</th>
				<th>Endereço</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($grupo as $pessoa) { ?>
				<tr>
					<td><?=$pessoa["nome"]?></td>
					<td><?=formatoData($pessoa["nascimento"])?></td>
					<td><?=$pessoa["telefone"]?></td>
					<td><?=$pessoa["endereco"]?></td>
					<td>
						<form name="alterar" action="alterar.php" method="POST"><input type="hidden" name="id" value=<?=$pessoa["id"]?> />
						<input type="submit" value="Editar" name="editar" />
						</form>
					</td>
					<td>
						<form name="excluir" action="conexao.php" method="POST">
							<input type="hidden" name="id" value="<?=$pessoa["id"]?>"/>
							<input type="hidden" name="acao" value="excluir"/>
							<input type="submit" value="Excluir" name="excluir"/>
						</form>
					</td>
				</tr>
				<?php }
			?>
			
		</tbody>
	</table>
	<?php
		function formatoData($data){
			$array = explode("-", $data);
			//$data = 2018-08-14
			//$array[0] = 2018, $array[1] = 04 e array[2] = 08
			$novaData = $array[2]."/".$array[1]."/".$array[0];
			return $novaData;
		}

	?>
</body>
</html>