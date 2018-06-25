<?php
	
include("conexao.php");
$pessoa = selectIdPessoa($_POST["id"]);
//var_dump($pessoa);

?>
<meta charset="utf-8">
<form name="dadosPessoa" action="conexao.php" method="POST">
	<table border="1">
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" size="20"></td>
			</tr>
			<tr>
				<td>Nascimento:</td>
				<td><input type="date" name="nascimento" value="<?=$pessoa["nascimento"]?>" ></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" size="20"></td>
			</tr>
			<tr>
				<td>Endereço:</td>
				<td><input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" size="20"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="acao" value="alterar">
					<input type="hidden" name="id" value="<?=$pessoa["id"]?> "/>
				</td>
				<td><input type="submit" name="Enviar" value="Enviar"></td>
			</tr>
		</tbody>
	</table>

</form>
