<?php
session_start();
include('conexao.php');


$marca = mysqli_real_escape_string($conexao, $_POST['marca']);
$modelo = mysqli_real_escape_string($conexao, $_POST['modelo']);
$tipocarga = mysqli_real_escape_string($conexao, $_POST['tipocarga']);
$peso = mysqli_real_escape_string($conexao, $_POST['peso']);
$id = $_SESSION['id'];
$largura = mysqli_real_escape_string($conexao, $_POST['largura']);
$superficie = mysqli_real_escape_string($conexao, $_POST['superficie']);
$altura = mysqli_real_escape_string($conexao, $_POST['altura']);
$comprimento = mysqli_real_escape_string($conexao, $_POST['comprimento']);

if (empty($_POST['check'] != 0)) {
    $sqli = "INSERT INTO `registo_veiculo`(`Id_Camionista`, `Marca`, `Modelo`, `TipoCarga`, `Peso`, `Largura`, `Superficie`, `Altura`, `Comprimento`) 
    VALUES ('$id','$marca','$modelo','$tipocarga','$peso','$largura','$superficie','$altura','$comprimento')";

    $result = mysqli_query($conexao, $sqli);
    $row = mysqli_num_rows($result);

    if($row == 1){
        header("location: ../pag_Sec/perfil2.php");
        $_SESSION['msgs'] =" echo('Dados inseridos com sucesso!')";
        exit();
    }else{
        header("location: ../pag_Sec/perfil2.php");
        $_SESSION['msgs'] =" echo('Erro na inserção de dados!')";
        exit();
    }
}else {
    header("location: ../pag_Sec/perfil2.php");
    $_SESSION['msgs'] =" echo('Marque a caixinha abaixo!')";
    exit();
}
?>