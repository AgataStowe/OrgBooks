<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='http://office.bitcluster.com.br/html/dist/assets/vendors/jquery.quicksearch/dist/jquery.quicksearch.js'></script>
    <title>MYBook's</title>
</head>
<body style="background-color: darkgray;">
    <form action="">
    <div class="container" style="width: 800px; height: 500px; ">
        <h2><a href="home.php" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-book"></span> MyBook's
          </a></h2>
        <div class="panel panel-default" style="background: lavender;">
          <div class="panel-body">
          <a href="cadastro.php" class='fas fa-plus' style='font-size:30px;color:black; padding-left: 700px;'></a>
              <div class="row">
                    <h3 class="well">MyBook's   <i class="fas fa-book-open" style='font-size:30px'></i></h3>
                </div>
              <hr style="border: 2px solid black;">
                <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input name="consulta" id="txt_consulta" placeholder="Consulta" type="text" class="form-control">
                </div>
                <table id="tabela"  class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Autor</th>
                      <th>Status</th> 
                      <th>Ações</th> 
                    </tr>
                  </thead>
                  <tbody>
                <?php

                  include("connection.php"); // conexão com o banco de dados

                  $sql = "SELECT * FROM BOOKS ORDER BY ID DESC";

                  $result = mysqli_query($connection, $sql) or die ("Erro na consulta ao banco");
                
                    foreach($connection -> query($sql) as $registro){
                      // mysqli_fetch_array = Permite obter os  resultados de uma consulta sql 
                      echo '<tr>';
                      echo '<th>'. $registro['NOME'] . '</th>';
                      echo '<td>'. $registro['AUTOR'] . '</td>';
                      echo '<td>'. $registro['ESTADO'] . '</td>';
                      echo '<td>';
                      echo '<a class="btn btn-default btn-sm" href="update.php?id='.$registro['ID'].'"><span class="fas fa-pencil-alt"></span></a>';
                      echo ' ';
                      echo '<a class="btn btn-default btn-sm" href="delete.php?id='.$registro['ID'].'"><span class="fas fa-trash"></span></a>';
                      echo '</td>';
                      echo '</tr>';
                    }
                    mysqli_close($connection);

                ?>
                  </tbody>
                </table>

                <script>
                  $('input#txt_consulta').quicksearch('table#tabela tbody tr');
                 </script>
            </div>
          </div>
        </div>
      </div>
    </form>
</body>
</html>