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

//Variaveis para receber as informações do formulario online
$id = $_POST['id'];
$nomeFuncionario = $_POST['nomeFuncionario'];
$dataNascimento = $_POST['dataNascimento'];
$generoSexual = $_POST['generoSexual'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$funcao = $_POST['funcao'];

include('../controller/conexaoDataBaseV2.php');

//Comando SQL insert promove a inserção das informações no banco de dados
$sql = "UPDATE `funcionarios` SET `nome`='$nomeFuncionario',`dtnascimento`='$dataNascimento',`genero`='$generoSexual',`endereco`=
'$endereco',`cep`='$cep',`telefone`='$telefone',`email`='$email',`Funcao`='$funcao'  WHERE `id` = $id" ;

$query = mysqli_query($conn,$sql);

//Se o cadastro for efetivado com sucesso o sistema volta para
// a pagina prinipal

if($query==true){
    header("Location: ../useradministrador/principaladministrador.php");
}else{
    echo "Update não efetivado-erro";
}


?>