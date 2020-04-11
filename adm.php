<!DOCTYPE html>
<?php 
  session_start();
 ?>
<html>
    <head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="index.css">
        <title>Seleção de alunos-Cadastro</title>
        <meta charset="utf8">

    </head>

    <body>
        <header class="banner">
            <img src="img/logo.png">
            <div class="linha"></div>
        </header>

        <div class="container">
            <div class="formulario">
                 <a href="index.php">Voltar</a>
                <img src="img/adm.png" class="adm">
               
                <center><h1 class="sl">Cadastre-se</h1></center>
                   <?php
                    if(isset($_SESSION['cadastro_realizado'])):
                    ?>
                    
                       <div class="notification is-success">
                      <div class="alert alert-success"><p>Cadastro realizado com sucesso!</p></div>
                    </div>
                     <?php
                    endif;
                    unset($_SESSION['cadastro_realizado']);
                    ?>
                

              <form action="adm.php" method="POST" class="form-login">
                    <input type="text" class="text" name="usuario" id="usuario" placeholder="Usuario" value=""></input>
                    <input type="password" class="senha" name="senha" id="senha" placeholder="Senha"></input>
                    <button id="logar" type="submit" class="logar" name="cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>

        <?php
            

        include('conexao.php');
          if(isset($_POST['cadastrar'])){
        

                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
                 mysqli_query($con,"INSERT INTO usuario (usuario, senha)VALUES('$usuario' , '$senha')");
                mysqli_close($con);

        if($usuario != "" && $senha != "") {
               echo "<script>
                  alert('Cadastro realizado com sucesso!');
               </script>";

               exit();
              }else{
                 echo "<script>
                  alert('ERRO ao realizar o cadastro!');
               </script>";
              exit();
              }
                
            
          }
        
        ?>
    </body>
</html>
 