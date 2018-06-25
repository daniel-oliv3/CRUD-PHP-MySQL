<?php


if(isset($_POST["acao"])){
	if($_POST["acao"] == "inserir"){
		inserirPessoa();
	}
	if($_POST["acao"] == "alterar"){
		alterarPessoa();
	}
	if($_POST["acao"] == "excluir"){
		excluirPessoa();
	}
}

//funções
function abrirBanco(){
	$conexao = new mysqli("localhost", "root", "", "agenda");
	return $conexao;
}

//função para inserir os dados no bd
function inserirPessoa(){
	$banco = abrirBanco();
	$sql = "INSERT INTO pessoa(nome, nascimento, endereco, telefone)"
		." VALUES ('{$_POST["nome"]}','{$_POST["nascimento"]}','{$_POST["endereco"]}','{$_POST["telefone"]}')"; 
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

//função para alterar os dados no bd
function alterarPessoa(){
	$banco = abrirBanco();
	$sql = "UPDATE pessoa SET nome='{$_POST["nome"]}',"."nascimento='{$_POST["nascimento"]}', endereco='{$_POST["endereco"]}',"."telefone='{$_POST["telefone"]}' WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

//função para ecluir os dados no bd
function excluirPessoa(){
	$banco = abrirBanco();
	$sql = "DELETE FROM pessoa WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

//função que busca todas as pessoas no bd
function selectAllPessoa(){
	$banco = abrirBanco();
	$sql = "SELECT * FROM pessoa ORDER BY nome";
	$resultado = $banco->query($sql);
	while($row = mysqli_fetch_array($resultado)){
		$grupo[] = $row;
	}
	return $grupo;
}

//
function selectIdPessoa($id){
	$banco = abrirBanco();
	$sql = "SELECT * FROM pessoa WHERE id =".$id;
	$resultado = $banco->query($sql);
	$pessoa = mysqli_fetch_assoc($resultado);
	return $pessoa;
}

//
function voltarIndex(){
	header("Location:index.php");
}



?>