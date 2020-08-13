<?php

require 'connection.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: home.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $autorErro = null;
    $statusErro = null;

    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $status = $_POST['status'];

    //Validação
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o nome!';
        $validacao = false;
    }

    if (empty($autor)) {
        $autorErro = 'Por favor digite o autor!';
        $validacao = false;
    }

    if (empty($status)) {
        $statusErro = 'Por favor selecione o status!';
        $validacao = false;
    }

    // update data
    if ($validacao) {
        include("connection.php");

        $sql = "UPDATE BOOKS set NOME = '$nome' , AUTOR = '$autor', ESTADO = '$status' WHERE ID = '$id'";
        $result = mysqli_query($connection, $sql);

        mysqli_close($connection);
        header("Location: home.php");
    }
} else {
    include("connection.php");
    $sql = "SELECT * FROM BOOKS where ID = ".$id;
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_array($result);
    $nome = $data['NOME'];
    $autor = $data['AUTOR'];
    $status = $data['ESTADO'];
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <form action="update.php?id=<?php echo $id ?>" method="POST" >
    <div class="container" style="width: 400px; height: 500px; ">
        <h2><a href="home.php" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-book"></span> MyBook's
          </a></h2>
        <div class="panel panel-default" style="height: 400px; background: lavender;">
          <div class="panel-body">
            <div class="row">
                    <h4 class="well">Atualizar Livro</h4>
                </div>
              <div class="row">
                  <div class="col-md-12" <?php echo !empty($nomeErro) ? 'error' : ''; ?>>
                      <label for="">Nome</label>
                      <input type="text" name="nome" class="form-control" value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                  </div>
                  <div class="col-md-12" <?php echo !empty($autorErro) ? 'error' : ''; ?>>
                    <label for="">Autor</label>
                    <input type="text" name="autor" class="form-control" value="<?php echo !empty($autor) ? $autor : ''; ?>">
                            <?php if (!empty($autorErro)): ?>
                                <span class="text-danger"><?php echo $autorErro; ?></span>
                            <?php endif; ?>
                </div>
                <div class="col-md-12" <?php echo !empty($statusErro) ? 'error' : ''; ?>>
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="<?php echo !empty($status) ? $status : ''; ?>"><?php echo !empty($status) ? $status : ''; ?></option>
                        <option value="Ler">Ler</option>
                        <option value="Lido">Lido</option>
                        <option value="Emprestado">Emprestado</option>
                        <option value="Perdido">Perdido</option>
                      </select>
                      <?php if (!empty($statusErro)): ?>
                                <span class="text-danger"><?php echo $statusErro; ?></span>
                            <?php endif; ?>
                </div>  
              </div>
              <br>
              <br>
              <button class="form-control btn btn-success" type="submit">Adicionar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</body>
</html>          