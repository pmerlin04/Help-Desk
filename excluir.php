<?php
require("conectar.php");

$codigo = $_GET['codigo'];

$busca=mysqli_query($tec, "Select * from `chamado` where `idChamado` = '$codigo'");
var_dump($busca);

if(mysqli_query($tec, "DELETE FROM  `tb_chamado` where `idChamado` = '$codigo'")){
    echo "<script>alert(excluido)</script>";
    header("location:consultar_chamado.php");
}else{
    echo "<script>alert(erro ao excluir)</script>";  

}
@session_start();
?>