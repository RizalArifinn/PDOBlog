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
        <title>Edit Data</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Edit Data</h4>
                    </div>

                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Judul</label><br>
                                <input type="text" name="judul" value="<?= $edit->judul ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label><br>
                                <textarea name="deskripsi" rows="8" cols="60" class="form-control"><?= $edit->deskripsi ?></textarea>
                            </div>

                            <input type="submit" name="editData" value="Edit" class="btn btn-primary">
                            <a href="../index.php" class="btn btn-default">Batal</a>
                        </form>
                    </div>

<?php
    if (isset($_POST['editData'])) {
      $judul = $_POST['judul'];
      $deskripsi = $_POST['deskripsi'];

      if ($judul == '' && $deskripsi == '') {
          echo 'Kolom harus diisi';
      } else if ($judul == '' || $deskripsi == '') {
          echo 'Ada yang kosong';
      } else {
          $blog = new Blog();
          $update = $blog->edit($judul, $deskripsi, $id);

          if ($update == "Sukses Edit Data") {
            header('Location: ../index.php');
          }
        }
      }
?>

                </div>
            </div>
        </div>
    </body>
</html>
