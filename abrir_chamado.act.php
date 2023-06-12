<?php
@session_start();
extract($_POST);
require('conectar.php');


$busca=mysqli_query($tec, "Select * from `chamado` where `tb_descricao` = '$descricao';");

var_dump($busca);

    if(mysqli_query($tec, "INSERT INTO `tb_chamado`
    (`idChamado`, `titulo_chamado`, `cate_chamado`, `descricao_chamado`)
    VALUES (NULL, '$titulo','$categoria', '$descricao');")){
        echo "<script>alert('incluido')</script>";
        header("location:consultar_chamado.php");
    }else{
        echo "<script>alert('erro')</script>";
    }



?>