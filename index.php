<?php
session_start();
?>
 
<!DOCTYPE html>
<html>
    <head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="index.css">
        <title>Seleção de alunos-Login</title>
        <meta charset="utf8">

    </head>

    <body>
        <header class="banner">
            <img src="img/logo.png">
            <div class="linha"></div>
        </header>

        <div class="container">
            <div class="formulario">
                <img src="img/adm.png" class="adm">
                <center><h1 class="sl">Login</h1></center>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                       <div class="notification is-danger">
                         <div class="alert alert-danger"><p>ERRO: Usuário ou senha inválidos.</p></div>
                    <!--<?php 
                        echo "<script>
                           alert('ERRO:Usuario e/ou senha inválidos');
                        </script>";
                     ?>!-->
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                <form action="login.php" method="POST" class="form-login">
                    <input type="text" class="text" name="usuario" placeholder="Digite o seu usuario" value=""></input>
                    <input type="password" class="senha" name="senha" placeholder="Digite a sua senha" value=""></input>
                    <button id="logar" type="submit" class="logar">Entrar</button>
                </form>
                <a href="adm.php">Cadastre-se</a>
            </div>
        </div>
    </body>
</html>
 