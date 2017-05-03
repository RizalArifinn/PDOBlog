<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Data</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Tambah Data</h4>
                    </div>

                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Judul</label><br>
                                <input type="text" name="judul" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label><br>
                                <textarea name="deskripsi" rows="8" cols="60" class="form-control"></textarea>
                            </div>

                            <input type="submit" name="tambahData" value="Tambah" class="btn btn-primary">
                            <a href="../index.php" class="btn btn-default">Batal</a>
                        </form>
                    </div>
<?php
    include '../Blog.php';

    if (isset($_POST['tambahData'])) {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        if ($judul == '' && $deskripsi == '') {
            echo 'Kolom harus diisi';
        } else if ($judul == '' || $deskripsi == '') {
            echo 'Ada yang kosong';
        } else {
            $blog = new Blog();
            $tambah = $blog->create($judul, $deskripsi);
            if ($tambah == "Sukses Tambah Data") {
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
