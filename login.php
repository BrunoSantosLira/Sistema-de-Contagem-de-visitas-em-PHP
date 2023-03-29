<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 36rem;">
      <div class="card-body">

        <div class="row">
          <div class="col">
            <h2>Faça login no sistema</h2>
          </div>
        </div>

        <div class="row">
          <div class="col">
            
            <form action="\AuthController.php?metodo=login" method="post">
              <div class="form-group">
                <input type="text"  name="email" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input type="password" name="senha" class="form-control" placeholder="Senha">
              </div>
            
              <?php if(isset($_GET['status']) && $_GET['status'] == 'acesso_nao_encontrado'){ ?>
                    <p class="text-danger"> Email ou senha incorretas</p>
              <?php } ?>

              <div class="mt-4 mb-4">
                <small class="form-text">
                  Ao inscrever-se, você concorda com os Termos de Serviço e com as Políticas de Privacidade, incluindo o Uso de Cookies. Outras pessoas poderão encontrar você pelo e-mail ou número de telefone fornecido · Opções de Privacidade
                </small>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Inscrever-se</button>
            </form>

           

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>