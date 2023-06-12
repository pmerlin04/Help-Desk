<?php
if(!$tec = mysqli_connect('localhost', 'root','', 'help_desk')){
    echo "erro ao de conectar com o banco de dados";

}


//ESSE COMANDO É PARA ACESSAR UMA QUERY NO PHPMYADMIN
mysqli_query($tec, "SET NAMES utf8");

?>