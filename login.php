<?php
session_start();
include('conexao.php');


$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['password']));

if(empty($_POST['nome']) || empty($_POST['password'])){
    header('location: ../index.html');
    exit();
}
    $sql = "SELECT Id_vendedor, Pnome, nivel FROM `login` WHERE Utilinome='{$nome}' AND password = md5('{$senha}')";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $adm = $row['nivel'];
    if ($adm == 0){
        $_SESSION['autenticado'] = true; 
        $_SESSION['pnome']= $row['Pnome'];
        header('location:  ../pag_Sec/Perfil_Vendedor.php');
        exit();  
    }else{
        $usuario_bd = mysqli_fetch_assoc($result);
        $_SESSION['autenticado'] = true; 
        $_SESSION['pnomes']= $row['Pnome'];
        header('location:  ../pag_Sec/Perfil_Camionista.php');
        exit();
    }
?>