<?php
    include '../Blog.php';

    $id = $_GET['id'];
    if (isset($id)) {
      $blog = new Blog();
      $update = $blog->update($id);
      $hapus = $update->fetch(PDO::FETCH_OBJ);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hapus Data</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Konfirmasi</h4>
                    </div>

                    <div class="panel-body">
                        <form method="post">
                          <h2>Apakah anda yakin ingin menghapus <i><?= $hapus->judul ?></i> ?</h2>
                          <input type="submit" name="hapus" value="Ya" class="btn btn-danger">
                          <input type="submit" name="hapus" value="Tidak" class="btn btn-default">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    if (isset($_POST['hapus'])) {
        $delete = $_POST['hapus'];

        if ($delete == 'Ya') {
            $blog->hapus($id);
        }
        header('Location: ../index.php');
    }
?>
