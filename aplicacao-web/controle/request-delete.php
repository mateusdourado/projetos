<?php
	
	$id = $_POST['id'];
	$user = $_POST['user'];
	$pass = $_POST['senha'];

 
 	$post = array('user' => $user, 'senha' => $pass, 'id' => $id);
 
 	$data = json_encode($post);
 
	$ch = curl_init('http://localhost/API/endpoint');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		 
	$rs = curl_exec($ch);
	curl_close($ch);

	echo $rs;

?>