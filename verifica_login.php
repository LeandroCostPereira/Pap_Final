<?php
@session_start();
if(!$_SESSION['pnomes']){
    header('location: ../iniciar_sessao.html');
    exit();
}
?>