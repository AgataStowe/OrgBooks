<?php
require 'connection.php';

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if(!empty($_POST))
{
    $id = $_POST['id'];

    //Delete do banco:
    include("connection.php");
    $sql = "DELETE FROM BOOKS where ID = '$id'";
    $result = mysqli_query($connection, $sql);
    header("Location: home.php");
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
    <form action="delete.php" method="post">
    <div class="container" style="width: 400px; height: 500px; ">
        <h2><a href="home.php" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-book"></span> MyBook's
          </a></h2>
        <div class="panel panel-default" style="height: 400px; background: lavender;">
          <div class="panel-body">
              <div class="span10 offset1">
                <div class="row">
                    <h4 class="well">Excluir Livro</h4>
                </div>
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir o livro?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="home.php" type="btn" class="btn btn-default">Não</a>
                    </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </form>
</body>
</html>          
