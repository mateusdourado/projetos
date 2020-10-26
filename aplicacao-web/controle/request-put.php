<?php
	
	$id = $_POST['id'];
	$user = $_POST['user'];
	$pass = $_POST['senha'];
	$descr = $_POST['descricao'];
	$val = preg_replace('/,/', '.', $_POST['valor']);
	$cat = $_POST['categoria_id'];	

 
 	$post = array('user' => $user, 'senha' => $pass, 'id' => $id, 'descricao' => $descr, 'valor' => $val, 'categoria_id' => $cat, );
 
 	$data = json_encode($post);
 
	$ch = curl_init('http://localhost/API/endpoint');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		 
	$rs = curl_exec($ch);
	curl_close($ch);

	echo $rs;

?>