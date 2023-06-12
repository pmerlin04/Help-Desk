<?php
  session_start();

  if(!isset($_SESSION['logado']) ||$_SESSION['logado'] != true){
    header('location:login.php');
  }

  require('conectar.php');
  $codigo = $_GET['cod'];
  $busca = mysqli_query($tec, "Select * from `usuario` where `idUsuario` = '$codigo';");
  $perfil = mysqli_fetch_array($busca);
  //echo($perfil['nome_usuario']);

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <?php
      if( $_SESSION['logado'] == true){
        echo '<a href="logoff.php">Sair</a>';
      }else{
        echo '<a href="logoff.php">Entrar</a>';
      }
      ?>

      <p><?php echo $perfil['nome_usuario'];  ?></p>
      
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                 <a href="abrir_chamado.php?cod=<?php echo $perfil['idUsuario'] ?>  "> <img src="formulario_abrir_chamado.png" width="70" height="70"></a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                 <a href="consultar_chamado.php?cod=<?php echo $perfil['idUsuario']
                 ?>"> <img src="formulario_consultar_chamado.png" width="70" height="70"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>