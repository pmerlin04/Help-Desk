<?php
require('conectar.php');
@session_start();
$_SESSION['logado'] = false;
$_SESSION['nome'] = '';
unset($_SESSION['logado']);
unset($_SESSION['nome']);
session_destroy();
header("location:cadastro.php");

?>