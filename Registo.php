<?php 
session_start();
include('conexao.php');

if (empty($_POST['primeiro']) || empty($_POST['ultimo']) || empty($_POST['utilizador']) || empty($_POST['email']) || empty($_POST['pass'])) {
    $_SESSION['campos_vazios'] = true;   
    header('location: ../pag_Sec/Registo.php');
    exit();
}

$nome = mysqli_real_escape_string($conexao, trim($_POST['primeiro']));
$ultimo = mysqli_real_escape_string($conexao, trim($_POST['ultimo']));
$utilizador = mysqli_real_escape_string($conexao, trim($_POST['utilizador']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$password = mysqli_real_escape_string($conexao, trim(md5($_POST['pass'])));
$confim = mysqli_real_escape_string($conexao, trim(md5($_POST['confpass'])));
$nivel = mysqli_real_escape_string($conexao, trim($_POST['nivel']));

$sql = "select count(*) as total from login where Utilinome = '$utilizador';";
$result = mysqli_query($conexao, $sql);

$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    $_SESSION['usuario_exite'] = true;
    header('location: ../pag_Sec/Registo.php');
    exit();
}

$sql = "INSERT INTO `login`(`Pnome`, `Unome`, `Utilinome`, `Email`, `password`, `nivel`) VALUES ('$nome', '$ultimo', '$utilizador', '$email', '$password', '$nivel');";

if ($conexao->query($sql) === true) {
    $_SESSION['cadastro_efetuado'] = true;
}

$conexao->close();

header('location: ../pag_Sec/Registo.php');
exit();
?>