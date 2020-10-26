<?php
	
	$user = $_POST['user'];
	$pass = $_POST['senha'];
	$nome = $_POST['nome'];
	$desc = $_POST['descricao'];
	$preco = $_POST['preco'];
	$cat = $_POST['categoria_id'];

	$postRequest = array(
	    'user' => $user,
	    'senha' => $pass,
	    'nome' => $nome,
	    'descricao' => $desc,
	    'preco' => $preco,
	    'categoria_id' => $cat
	);

	$curl = curl_init('http://localhost/API/endpoint');
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postRequest));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$rs = curl_exec($curl);

	echo $rs;

	curl_close($curl);

?>