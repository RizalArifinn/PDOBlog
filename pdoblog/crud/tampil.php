<?php
    include '../Blog.php';

    $id = $_GET['id'];
    if (isset($id)) {
      $blog = new Blog();
      $update = $blog->update($id);
      $edit = $update->fetch(PDO::FETCH_OBJ);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Deskripsi</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Deskripsi Artikel</h4>
                    </div>

                    <div class="panel-body">
                        <h1><?= $edit->judul ?></h1><hr>
                        <p><?= $edit->deskripsi ?></p>

                        <a href="../index.php" class="btn btn-default">
                          <span class="glyphicon glyphicon-log-out"></span> Kembali Ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
