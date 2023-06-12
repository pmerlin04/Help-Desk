<?php
extract($_POST);
require('conectar.php');
//$senha = md5($senha);
$busca = mysqli_query($tec, "Select * from `usuario` where `email_usuario` = '$email';");
$busca_senha = mysqli_query($tec, "Select * from `usuario` where `email_usuario` = '$senha';");

var_dump($busca);

if($email == '' || $senha == ''){
    echo '<script>alert(campos em branco)</script>';
}else if($busca->num_rows == 1){
    $usuario = mysqli_fetch_array($busca);
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $usuario['nome'];
    header("location:home.php?cod=$usuario[idUsuario]");
}else{
    echo '<script>alert(errou)</script>';
}


















//$busca_nome = mysqli_query($tec, "Select * from `tb_perfil` where `nome` = '$nome';");
/*
session_start();
//variavel que identifica se o usuario existe no sistema
$usuario_autenticado = false;
    //usuarios do sistema
    $usuarios_app = array(
        ['email' => 'adm@teste.com', 'senha' => '123456'],
        ['email' => 'user@teste.com', 'senha' => 'adcd']
    );



    foreach($usuarios_app as $user){
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']){
           $usuario_autenticado = true;
        }
    }

    if($usuario_autenticado){
        header('location:abrir_chamado.php');
        $_SESSION['autenticado'] = 'SIM';
    }else{
        //redireciona a pagina para o caminho informado 
        $_SESSION['autenticado'] = 'NÃO';
        header('location:index.php?login=erro');
    }

*/

@session_start();
$_SESSION['logado'] = true;
?>
