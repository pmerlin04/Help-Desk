<?php
/*
  session_start();
  if(!isset($_SESSION['autenticado']) ||$_SESSION['autenticado'] != 'SIM'){
    header('location:index.php?login=erro2');
  }
*/

session_start();
require('conectar.php');

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
    
    <script>
    function conf_excluir(cod){
      conf = confirm("Deseja apagar o codigo "+cod + "?");
            if(conf == true){
                window.location = "excluir.php?codigo="+cod;
            }
    }
  </script>

  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
            <?php
              require ('conectar.php');
              $publicacoes = mysqli_query($tec, "Select * from `tb_chamado`");
              //var_dump($publicacoes);

              while($publicacao = mysqli_fetch_array($publicacoes)){
                echo "<div class=card mb-3 bg-light>";
                echo " <div class=card-body>";
                echo "<p class = codigo>Código: $publicacao[idChamado]</p>";
                echo "<h5 class=card-title> $publicacao[titulo_chamado]</h5>";
                switch ($publicacao['cate_chamado']){
                  case 1:
                    echo "<h6 class=card-subtitle mb-2 text-muted>Criação de Usuário</h6>";
                    break;
                  
                  case 2:
                    echo "<h6 class=card-subtitle mb-2 text-muted>Impressora</h6>";
                    break;
                  
                  case 3:
                    echo "<h6 class=card-subtitle mb-2 text-muted>Hardware</h6>";
                    break;
                  
                  case 4:
                    echo "<h6 class=card-subtitle mb-2 text-muted>Software</h6>";
                    break;
                  
                  case 5: 
                    echo "<h6 class=card-subtitle mb-2 text-muted>Rede</h6>";
                    break;
                    
                    default:
                    echo "<h6 class=card-subtitle mb-2 text-muted>Não foi escolhido a categoria do chamado</h6>";
                }
                
                //echo "<h6 class=card-subtitle mb-2 text-muted>$publicacao[cate_chamado]</h6>";
                echo "<p class='card-text'>$publicacao[descricao_chamado]</p>";
                echo "<p><a class ='excluir' href =javascript:conf_excluir($publicacao[idChamado])>Excluir</a></p>";

                echo "</div>";//card-body
                echo "</div>";
              }

            ?>

  
            <!--
            <br><br><br><br>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">Título do chamado...</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                  <p class="card-text">Descrição do chamado...</p>

                </div>
              </div>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">Título do chamado...</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                  <p class="card-text">Descrição do chamado...</p>

                </div>
              </div>-->

              <div class="row mt-5">
                <div class="col-6">
                  <a href="abrir_chamado.php"><button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>