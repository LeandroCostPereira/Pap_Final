<?php
define('server', 'localhost');
define('Utilizador', 'root');
define('Pass', '');
define('BD', 'trans_pereira');

$conexao = mysqli_connect(server, Utilizador, Pass, BD) or die('Nao foi possivel conectar a base de dados!');
?>