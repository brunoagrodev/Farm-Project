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
$id = $_GET['id'];


include('../controller/conexaoDataBaseV2.php');

//Comando SQL insert promove a inserção das informações no banco de dados
$sql = "DELETE FROM `funcionarios` WHERE `id` = $id ";

$query = mysqli_query($conn,$sql);

//Se o cadastro for efetivado com sucesso o sistema volta para
// a pagina prinipal

if($query==true){
    header("Location: ../useradministrador/principaladministrador.php");
}else{
    echo "Delete não efetivado-erro";
}


?>