<?php
	
	/*requisição simples com GET para listar todos os produtos*/


	// Cria o cURL
	$curl = curl_init();

	// Seta algumas opções
	curl_setopt_array($curl, [
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => 'http://localhost/API/endpoint'
	]);

	// Envia a requisição e salva a resposta
	$rs = curl_exec($curl);

	$dados = json_decode($rs);


	echo '<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nome</th>
	      <th scope="col">Descrição</th>
	      <th scope="col">Preço</th>
	    </tr>
	  </thead>
	  <tbody>';
	  foreach ($dados as $key) {
	  	echo '<tr>
		      <th scope="row">'.$key->id.'</th>
		      <td>'.$key->nome.'</td>
		      <td>'; 
		      		if($key->descricao != ""){
		      			echo $key->descricao; }
		      		else{
		      			echo 'sem descrição'; 
		      		} 
		      echo'</td>
		      <td>R$ '.number_format($key->preco,2,',','.').'</td>
		    </tr>';
	  }
	    
	  echo '</tbody>
	</table>';

	// Fecha a requisição e limpa a memória
	curl_close($curl);

?>