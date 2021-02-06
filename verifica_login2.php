<?php
@session_start();
if(!$_SESSION['pnome']){
    header('location: ../iniciar_sessao.html');
    exit();
}
?>