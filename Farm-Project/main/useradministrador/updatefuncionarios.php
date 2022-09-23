<?php
//Metodo para iniciar a sessao
session_start();
//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"])){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
}

$id = $_GET['id'];

include('../controller/conexaoDataBaseV2.php');

$sql = "SELECT * FROM `funcionarios` WHERE id = $id";

$query = mysqli_query($conn,$sql);


while($dado = mysqli_fetch_array($query)) {
  
    $nome = $dado['nome'];
    $dataNascimento = $dado['telefone'];
    $generoSexual = $dado['genero'];
    $endereco = $dado['endereco'];
    $cep = $dado['cep'];
    $telefone = $dado['telefone'];
    $email = $dado['email'];
    $funcao = $dado['Funcao'];                        
} 

?>

<!DOCTYPE html>
<html lang="pt">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir/Atualizar Funcionário</title>
   
     <style>
        .was-validated{
                width: 50%;
                position: relative;
                left: 25%;
        }
       .buttonregister{
                margin-top: 20px;
       }
     </style>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">

</head>
<body>

<?php include("../useradministrador/include/navbarAdministrador.html");?>
     
<main role="main" class="container">
    
<form class="was-validated" action="updatefuncionariosBack.php" method="POST" enctype="multipart/form-data">
     
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Nome do Funcionário:</label>
        <div class="md-3 pb-1">
                <div class="form-outline">
                <input class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="nomeFuncionario" value="<?php echo $nome; ?>">
                <div class="invalid-feedback">Digite um nome do funcionário.</div>
                </div>
        </div>
        
        <label>Data de Nascimento:</label>
        <div class="md-3 pb-1">
                <div class="form-outline">
                <input type="date" class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="dataNascimento" value="<?php echo $dataNascimento; ?>">
                <div class="invalid-feedback">Digite a data que você nasceu.</div>
                </div>
        </div>

        <label>Gênero Sexual:</label>
        <div class="pb-2">
        <select  class="form-control is-valid" id="validationTextarea" class="form-select" aria-label="Default select example" name="generoSexual">
        <option value="<?php echo $generoSexual?>" ><?php if($generoSexual == 'Masc'){echo 'Masculino';} else{ echo 'Feminino';}; ?></option>  
         <option value="Masc">Masculino</option>
          <option value="Fem">Feminino</option>
       </select>
       </div>

       <label>Função:</label>
        <div class="pb-3">
        <select  class="form-control is-valid" id="validationTextarea" class="form-select" aria-label="Default select example" name="funcao">
        <option value="<?php echo $funcao?>"><?php echo $funcao?></option>  
        <option value="Gerente">Gerente</option>
          <option value="Contador">Contador</option>
          <option value="Tratorista">Tratorista</option>
          <option value="Vendas">Vendas</option>
          <option value="Serviços Gerais">Serviços Gerais</option>
       </select>
       </div>

        <label>Endereço:</label>
        <div class="md-3 pb-1">
                <div class="form-outline">
                <input class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="endereco" value="<?php echo $endereco; ?>">
                <div class="invalid-feedback">Digite o seu endereço.</div>
                </div>
        </div>

        <label>CEP:</label>
        <div class="md-3 pb-1">
                <div class="form-outline">
                <input type="tel" maxlength="9" class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="cep" value="<?php echo $cep; ?>">
                <div class="invalid-feedback">Digite o seu CEP.</div>
                </div>
        </div>
 
        <label>Telefone:</label>
        <div class="md-3 pb-1">
                <div class="form-outline">
                <input type="tel" maxlength="14" class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="telefone" value="<?php echo $telefone; ?>">
                <div class="invalid-feedback">Digite o seu número de telefone.</div>
                </div>
        </div>


        <label>E-mail:</label>
        <div class="md-3 pb-1">
                <div class="form-outline">
                <input type="email" class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="email"  value="<?php echo $email; ?>">
                <div class="invalid-feedback">Digite o seu e-mail.</div>
                </div>
        </div>


        <div class="buttonregister">
        <div class="text-center pb-4">
                <button class="btn btn-primary btn-lg text-center"  type="submit">Atualizar Funcionário</button>
        </div>
        </div>

    </form>
</main>
    
    

  <!--Bootstrap e JS-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>