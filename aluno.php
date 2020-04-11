<html>
<?php
session_start();

if(!$_SESSION['usuario']) {
	header('Location: index.php');
	exit;
}
?>
<head>
	<title>Seleção de alunos - Cadastro</title>
	<style>
		*{
        margin: 0px;
        padding: 0px;
        line-height: 1.5;
        font-family: Arial;
    }

    body, html{
        width: 100%;
        height: 100%;

    }

    header.banner{
        display: flex;
        flex-wrap: wrap;
        background-color: #258b4e;
    }
    .linha{
        display: grid;
        width: 100%;
        height: 15px;
        background: #e98d3c;
        bottom: 0;
    }
    .container{
        display: flex;
        width: 100%;
        min-height: 100vh;
        align-items: center;
        position: relative;
    }
   /*.menu{
        display: flex;
        padding: 80px;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 0px 20px 0.1px rgba(0, 0, 0, 0.2);
        height: auto;
        margin: 50px auto;
        align-items: center;
        overflow-y: hidden;
        justify-content: center;
        outline: 0;
    }*/
    .form2{
        display: flex;
        padding: 80px;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 0px 20px 0.1px rgba(0, 0, 0, 0.2);
        height: auto;
        margin: 50px auto;
        overflow-y: hidden;
        justify-content: center;
    }
    /*.form2 input, select{
        outline: 0;     
        box-shadow: 0 0 0 0;
        display: flex;
        background: #fff;
        margin: 4px;
        padding: 6px 8px;
        border: 1px solid ;
        user-select: none;
        border: none;
        border-bottom: 1px solid #000;
        position: relative;
    }*/
    .form2 input, select{
    	outline: 0;
    	
    	border: none;
    	border-bottom: 1px solid #000;
    }
    .text{
        width: 85%;
    }
    .select{
        background-color: #fff;
        cursor: pointer;
    }
    .historico{
    	margin-top: 2em;
    }
    .historico div{
    	margin: 2em
    }

    .historico div input{
    	width: 6em;
    }
    .submit{
        margin: 3px;
        outline: 0;
        background: #fff;
        padding: 8px 8px;
        border: 1px solid;
        border-radius: 4px;  
        user-select: none;
        color: #fff;
        background-color: #35c464;
    }
    .submit:hover{
        background-color: #258b4e;
    }
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js">
 

 </script>

 <script type="text/javascript">
 	$("#telefone").mask("(00) 00000-0000");
 </script>
</head>

<body>
   <header class="banner">
            <img src="img/logo.png">
            <div class="linha"></div>
    </header>
<!--<ul class="menu">
        <li><a href="#">Cadastrar</a></li>
        <li><a href="#">Resultados </a></li>
</ul>-->
    <div class="container">
    	  	<h2><a href="logout.php">Sair</a></h2>
    	<div class="form2">
    		<center><h4>PROCESSO SELETIVO INGRESSO DE ALUNOS NOVATOS - FICHA DE INSCRIÇÃO</h4></center><br><br>
          <form action="aluno.php" method="POST">
                
    		
    			Aluno(a):
    			<input type="text" class="text" placeholder="Digite o nome do aluno" name="aluno" id="aluno">
    			
    		
    		<div>
    			Data de Nascimento:
    			<input type="date" class="select" name="nascimento" id="nascimento">
    		</div>

    		<div>
    			Endereço:
    			<input type="text" class="text" placeholder="Digite endereço do aluno" name="endereco" id="endereco">
    		</div>

    		<div>
    			Escola de Origem:
    			<select class="select" name="origem" id="origem">
    				<option>SELECIONE</option>
    				<option>PUBLICA</option>
    				<option>PRIVADA</option>
    			</select>
    		</div>
    		
    		<div>
    			Concorrência:
    			<select class="select" name="concorrencia" id="concorrencia">
    				<option>SELECIONE</option>
    				<option>AMPLA</option>
    				<option>COTA</option>
    			</select>
    		</div>

    		<div>
    			Telefone para contato:
    			<input type="text" id="telefone" name="telefone" placeholder="Ex.: (00) 0000-0000">
    		</div>
    		
    		<div>Opção de curso: 
    		<select class="select" name="curso" id="curso">
    				<option>SELECIONE</option>
    				<option>ADM</option>
    				<option>AGROPECUÁRIA</option>
    				<option>FINANÇAS</option>
    				<option>INFORMÁTICA</option>
	    		    </select><br>
	    		              <center><button name="cadastrar" id="cadastrar">Cadastrar</button></center>
    		</form>
    		</div>  

    <?php
                 
                  include('conexao.php');

 if(isset($_POST['cadastrar'])){
  
   $aluno = $_POST['aluno'];
   $nascimento = $_POST['nascimento'];
   $endereco = $_POST['endereco'];
   $origem = $_POST['origem'];
   $concorrencia = $_POST['concorrencia'];
   $telefone = $_POST['telefone'];
   $curso = $_POST['curso'];

     //cadastrando todos os alunos que querem ADM

     if ($curso == "ADM") {
         if ($origem == "PUBLICA" && $concorrencia == "AMPLA") {
          

            mysqli_query($con,"INSERT INTO admpublicaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) Realizado com sucesso!');
                   </script>";


         }
         else if ($origem == "PUBLICA" && $concorrencia == "COTA") {
              mysqli_query($con,"INSERT INTO admpublicacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";


         }

          else if ($origem == "PRIVADA" && $concorrencia == "AMPLA") {
              mysqli_query($con,"INSERT INTO admprivadaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";
         }


          else if ($origem == "PRIVADA" && $concorrencia == "COTA") {
              mysqli_query($con,"INSERT INTO admprivadacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";
         }
}
         //até aqui todos os alunos que querem ADM foram cadastrados;
        
        if ($curso == "AGROPECUÁRIA") {
                  if ($origem == "PUBLICA" && $concorrencia == "AMPLA") {
          

            mysqli_query($con,"INSERT INTO agropublicaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) Realizado com sucesso!');
                   </script>";


         } 

            else if ($origem == "PUBLICA" && $concorrencia == "COTA") {
                   mysqli_query($con,"INSERT INTO agropublicacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) realizado com sucesso!');
                   </script>";

            }

             else if ($origem == "PRIVADA" && $concorrencia == "AMPLA") {
              mysqli_query($con,"INSERT INTO agroprivadaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";
         }

          else if ($origem == "PRIVADA" && $concorrencia == "COTA") {
              mysqli_query($con,"INSERT INTO agroprivadacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";
         }
            //todos que querem agro foram cadastrados
            }  

            //quem quer ir para finanças abaixo:

            if ($curso == "FINANÇAS") {
                if ($origem == "PUBLICA" && $concorrencia == "AMPLA") {
                     mysqli_query($con,"INSERT INTO finpublicaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

                }
                else if ($origem == "PUBLICA" && $concorrencia == "COTA") {
                        mysqli_query($con,"INSERT INTO finpublicacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";
                }

                else if ($origem == "PRIVADA" && $concorrencia == "AMPLA") {
                     mysqli_query($con,"INSERT INTO finprivadaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

                }


                  else if ($origem == "PRIVADA" && $concorrencia == "COTA") {
                     mysqli_query($con,"INSERT INTO finprivacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

                }

              //todos que querem finanças foram cadastrados
            
            }
             

            //quem quer ir para informática abaixo:
                if ($curso == "INFORMÁTICA") {
                    if ($origem == "PUBLICA" && $concorrencia == "AMPLA") {
         mysqli_query($con,"INSERT INTO infpublicaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

                    }

            else if ($origem == "PUBLICA" && $concorrencia == "COTA") {
             mysqli_query($con,"INSERT INTO infpublicacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

        
                    }
         else if ($origem == "PRIVADA" && $concorrencia == "AMPLA") {
             mysqli_query($con,"INSERT INTO infprivadaampla (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

        
                    }

             else if ($origem == "PRIVADA" && $concorrencia == "COTA") {
             mysqli_query($con,"INSERT INTO infprivadacota (aluno, nascimento, endereco, telefone, curso, origem, concorrencia)

              VALUES('$aluno' , '$nascimento', '$endereco', '$telefone', '$curso', '$origem', '$concorrencia')");
                mysqli_close($con);
          
                   echo "<script>
                      alert('$aluno foi cadastro(a) com sucesso!');
                   </script>";

        
                    }
      
      
                }


}
       ?>
</body>
</html>


