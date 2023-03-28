<?php 
date_default_timezone_set('America/Sao_Paulo');
$conexao = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');

$query2 = "SELECT site_id,email,referrer, COUNT(*) AS acessos FROM clicks2 GROUP BY site_id;";
$stmt2= $conexao->prepare($query2);
$stmt2->execute();

$acessos = $stmt2->fetchAll(\PDO::FETCH_ASSOC);

function verificar($id){
    $conexao = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');
    $sql= "SELECT * FROM `lista_negra` WHERE ID = $id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $teste = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    if(empty($teste)){
        return true;
    }else{
        return false;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<!-- Icons CDN -->
    <script src="https://kit.fontawesome.com/64e0418c32.js" crossorigin="anonymous"></script>

	<title>Painel</title>
</head>
<body onload="registerClick(1)" >
		<!-- Código HTML do site -->
		<div id="data_hora">
			<?php echo date('d/m/Y') ?>
		</div>

		<div class="container mt-5">
			<div class="row">
				<div class="col-sm-3">
					
				<ul class="nav nav-pills flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="/index.php">Painel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/dominios.php">Domínios ativos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/desativados.php">Domínios Desativados(Lista Negra)</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/adicionar.php">Adicionar Domínio</a>
					</li>
					</ul>
				</div>
				<div class="col-sm-9">

			
				<div class="border border-primary rounded mb-5">
				<h4>Domínio do sistema[painel]</h4>
					<table class="table">
						<tr>
							<th scope="col">Acessos</th>
					
							<th scope="col">Nome</th>
						</tr>
						<tr>
							<td><?php print_r($acessos[0]['acessos'] ) ?></td>
				
							<td>FLEXPOWER</td>
						</tr>
					</table>
				</div>

				<table class="table">
					<h4>Domínios</h4>
						<thead>
							<tr>
							<th scope="col">Status</th>
							<th scope="col">ID</th>
							<th scope="col">Nome</th>
							<th scope="col" >Proprietário</th>
							<th scope="col">Acessos</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($acessos as $indice  => $dominio) { ?> 
                                
									<tr>
									<td>
										<?php if(verificar($dominio['site_id']) == true ) {?>
											<i class="fa-solid fa-circle" style="color: #0aff0e;"></i>
										<?php }else{ ?>
											<i class="fa-solid fa-circle" style="color: #ff0a0a;"></i>
										<?php } ?>
									</td>
									<th scope="row"><?php echo $dominio['site_id']?></th>
									<td>
										<?php echo $dominio['referrer'] ?>
									</td>
									<td>
										<?php echo $dominio['email'] ?>
									</td>
									<td>		
									<?php
									if(verificar($dominio['site_id']) == true ) {
										echo $dominio['acessos'];
									}else{
										echo '---';
									}
									?>
									 </td>
									</tr>
							
							<?php } ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>



	<script>

	function registerClick(siteId) {

		var referrer = window.location.href;
		console.log(referrer);
		var email = 'brunomasterchif@gmail.com';
		
		// Enviar uma requisição GET para o arquivo PHP criado anteriormente
		fetch(`http://localhost:8080/registro.php?site_id=${siteId}&referrer="${referrer}"&email=${email}`);
	}
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>