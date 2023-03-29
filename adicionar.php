<?php 
session_start();
date_default_timezone_set('America/Sao_Paulo');

$conexao = new PDO('mysql:host=localhost; dbname=banco_de_dados', 'root', '');

$query2 = "SELECT site_id,referrer, COUNT(*) AS acessos FROM clicks2 GROUP BY site_id;";
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

//Função que seleciona o último número
function ultimo_numero(){
	$lista_numeros = array();
	//tornando a variável "acessos" Global
	global $acessos;

	foreach($acessos as $key => $registro){
		array_push($lista_numeros, $registro['site_id']);
	} 

	print_r(max($lista_numeros));
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
    <script src="https://kit.fontawesome.com/64e0418c32.js" crossorigin="anonymous"></script>
	<title>Adicionar Domínio</title>

</head>
<body>
		<!-- Código HTML do site -->
		<div id="data_hora" class="text-right">
			<?php echo date('d/m/Y') ?>
				<a href="/login.php" style="color:white">
				
				<?php if(isset($_SESSION['username'])){
					echo $_SESSION['username'];
				}else{ ?>
					<i class="fa-solid fa-user fa-xl text-right" style="color: #ffffff;"></i>
				<?php } ?>
				</a>
		</div>
		<?php if(isset($_SESSION['username'])) { ?>
			<div class="text-right m-2">
				<a href="/AuthController.php?metodo=sair">
					<i class="fa-solid fa-arrow-right-from-bracket fa-2xl"></i>
					<P>SAIR</P>
				</a></a>
			</div>
		<?php } ?>

		<div class="container mt-5">
			<div class="row">
				<div class="col-sm-3">
					
				<ul class="nav nav-pills flex-column">
					<li class="nav-item">
						<a class="nav-link " href="/index.php">Painel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="/dominios.php">Domínios ativos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="/desativados.php">Domínios Desativados(Lista Negra)</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="/adicionar.php">Adicionar domínio</a>
					</li>
					</ul>
				</div>
				<div class="col-sm-9">

				<h2>Criar código</h2>
				<p>Para adicionar um número, você precisará criar inserir um código no respectivo site. Vamos cria-lo?</p>
				<form>

				<h2 class="mt-5">Adicione um domínio</h2>

		<form id="aaa" >
		<div class="form-group row mt-5">
			<label for="inputEmail3" class="col-sm-2 col-form-label">URL</label>
			<div class="col-sm-10">
			<input type="text" value="http://" class="form-control" id="URL_site" placeholder="URL">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Propriétario[email]</label>
			<div class="col-sm-10">
			<input type="email" class="form-control" id="proprietario_site" placeholder="Proprietário">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-10">
			<button onclick="" type="submit" class="btn btn-primary">Adicionar</button>
			</div>
		</div>
		</form>
				
				

	<!-- Formulário: -->
	<h2 class="mt-5">Adicione um usuário</h2>
	<form method="post" action="AuthController.php?metodo=adicionar">
		<div class="form-group row mt-5">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
			<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
			<div class="col-sm-10">
			<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha">
			</div>
		</div>
		<!-- Mensagem de sucesso ou erro na adição do user -->
		<?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'){ ?>
			<p class="text-success">Usuário adicionado com sucesso!!!</p>
		<?php } else if(isset($_GET['status']) && $_GET['status'] == 'erro_email'){ ?>
			<p class="text-danger">Email já adicionado</p>
		<?php } ?>

		<div class="form-group row">
			<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Adicionar</button>
			</div>
		</div>
		</form>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/form_site.js"></script>
</body>
</html>