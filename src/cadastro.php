<?php 
	if (!empty($_POST)) {
	 $nome = $_POST['nome'];
	 $autor = $_POST['autor'];
	 $status = $_POST['status'];
	 $validacao = true;
		
	include ('connection.php');
	
		//Validação
		$query = "SELECT * FROM BOOKS WHERE NOME = '$nome'";
		
		$result = mysqli_query($connection, $query) or die ("Erro na consulta ao banco");

        if(mysqli_fetch_array($result)){
			$erro = 'Livro já cadastrado!';
			$validacao = false;
		
		}else{
			
			$query = "INSERT INTO BOOKS (NOME, AUTOR, ESTADO) VALUES ('$nome', '$autor', '$status')"; //Concatenação

			if(mysqli_query($connection, $query)){
				mysqli_close($connection);
				header("Location: home.php");
			}else {
				$erro = 'Erro ao inserir livro!';
				$validacao = false;
			}
			
			echo "<br/><br/><a href='cadastro.html'>Cadastrar Novamente</a><br/>";	
        }
        
	mysqli_close($connection);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: darkgray;">
    <form action="cadastro.php" method="POST" >
    <div class="container" style="width: 400px; height: 500px; ">
        <h2><a href="home.php" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-book"></span> MyBook's
          </a></h2>
        <div class="panel panel-default" style="height: 400px; background: lavender;">
          <div class="panel-body">
          <div class="row">
                    <h4 class="well">Cadastro</h4>
                </div>
              <div class="row">
                  <div class="col-md-12">
                      <label for="">Nome</label>
                      <input type="text" name="nome" class="form-control" required>
                  </div>
                  <div class="col-md-12">
                    <label for="">Autor</label>
                    <input type="text" name="autor" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">Selecione</option>
                        <option value="Ler">Ler</option>
                        <option value="Lido">Lido</option>
                        <option value="Emprestado">Emprestado</option>
                        <option value="Perdido">Perdido</option>
                      </select>
                </div>  
              </div>
              <br>
              <br>
              <button class="form-control btn btn-success" type="submit">Adicionar</button>
			  <br>
			  <br>	
			  <?php if (!empty($erro)): ?>
				<span class="text-danger"><?php echo $erro; ?></span>
			<?php endif; ?>
		    </div>
          </div>
        </div>
      </div>
    </form>
</body>
</html>